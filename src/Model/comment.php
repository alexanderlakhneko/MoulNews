<?php

namespace Model;

use Library\EntityRepository;
use Library\Request;
use Library\Session;

class Comment extends EntityRepository
{

    public function getCommentById($id_comment)
    {
        $result = $this->pdo->query("SELECT u.name, c.* FROM comments c
        left join users u on u.id=c.id_user
        where id_comment='{$id_comment}'");

        return $result;
    }
    public function admin_edit_comment($id){
        $sql="select * from comments where id_comment={$id}";
        $row = $this->pdo->query($sql);

        return $row->fetch();
    }

    public function get_comments($id_news)
    {
        $sql = "SELECT u.name, c.* FROM comments c
        left join users u on u.id=c.id_user
        where id_news='{$id_news}' and c.is_active=1 order by id_parent,date_time desc";
        $result = $this->pdo->query($sql);
        $i = 0;
        foreach ($result as $key => $value) {
            if ($value['id_parent'] == 0) {
                $results[$value['id_comment']] = $value;
            } else {
                $results[$value['id_parent']]['childs'][] = $value;
            }
            $i++;
        }

        $results['count'] = $i;
        return $results;
    }
    
    public function cnt_comments(){
            $sql = "select count(*) as COUNT from comments";
            $count_news = $this->pdo->query($sql);
            $row = $count_news->fetch();
            $total_rows = ($row['COUNT']);

            return $total_rows;
    }

    public function top_commentators($limit = 5)
    {
        $sql = "select c.*,count(*) as cnt,u.name from comments c
              left join users u on u.id=c.id_user
              group by c.id_user order by cnt desc
              limit {$limit}";
        return $this->pdo->query($sql);
    }

    public function getCommentCnt($id_user)
    {
        $sql = "select count(*) as cnt from comments where id_user={$id_user}";
        $result = $this->pdo->query($sql);
        $row = $result->fetch();
        return $row;
    }

    public function getThemes($limit = 3)
    {

        $sql = "select c.*,n.title from (select max(date_time) datet,id_news from comments 
group by id_news limit {$limit}) c
left join news n on n.id_news=c.id_news";
        return $this->pdo->query($sql);

    }

    public function getCommentsByUser($id_user, $page = 0, $limit = 5)
    {
        // Смещение (для запроса)
        $offset = ($page - 1) * $limit;
        
        $sql = "select c.*,n.title,u.name from comments c
              left join users u on u.id=c.id_user
              left join news n on n.id_news=c.id_news
              where c.id_user ={$id_user} AND c.is_active=1 order by  c.date_time desc limit {$limit} OFFSET {$offset} ";
        $result['comment'] = $this->pdo->query($sql);
        return $result;
    }

    public function admin_get_comments($page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;



        $sql="select c.id_comment, c.id_parent, u.name ,n.title, cat.category_name, c.`comment`, c.date_time, c.cnt_like, c.cnt_dislike, c.is_active from comments c
            left join users u on u.id=c.id_user
            left join news n on n.id_news=c.id_news
            left join category cat on cat.category_id=n.category_id order by c.date_time desc limit {$limit} OFFSET {$offset}";

        $result = $this->pdo->query($sql);
        $res = array();
        $i = 0;
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)){
            $res[$i] = $row;
            $i++;
        }

        return $res;
    }

    public function vote($id_comment, $type)
    {
        if (!Session::get('user')) {
            echo json_encode(array('result' => 'Login please'));
            exit;
        }
        $user = Session::get('user');

        $sql = "Select v.*,u.name from votes_comment v
        left join users u on u.id=v.id_user where id_comment={$id_comment} and
         u.id = '{$user}'";
        $result = $this->pdo->query($sql);
        $i = 0;
        while ($row = $result->fetch()){
            $i++;
        }
//        $get_user = $this->pdo->query("select id from users where `name` like'%$user%'");
        if ($i == 0) {
            $sql = "INSERT INTO votes_comment (id_comment,id_user)
             VALUES ({$id_comment},{$user})";
            $this->pdo->query($sql);
            $this->cnt_like($id_comment, $type);
        } else {
            header('Content-Type: text/json; charset=utf-8');
            echo json_encode(array('result' => 'you are voted this news'));
            exit;
        }
    }


    public function cnt_like($id_comment, $type)
    {
        $type = 'cnt_' . $type;
        $sql = ("UPDATE comments SET {$type}=({$type}+1) WHERE id_comment='{$id_comment}'");
        $result = $this->pdo->query($sql);
        header('Content-Type: text/json; charset=utf-8');
        echo json_encode(array('result' => 'success'));
        exit;
    }

    public function check_comment($id_news)
    {
        $sql = "select n.id_news from news n
        where n.id_news={$id_news} and n.category_id=5 limit 1";
        $result = $this->pdo->query($sql);
        $row = $result->fetch();
        if (empty($row)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function add_comment($id_user, $id_news, $comment, $id_parent)
    {
        if($id_parent == ''){
            $id_parent = 0;
        }
        $is_active = $this->check_comment($id_news);
        $sql_user = "select id,`name` from users where name like '%{$id_user}%'";
        $comment = htmlspecialchars($this->pdo->quote($comment));
        $result = $this->pdo->query($sql_user);
        $row = $result->fetch();
        if (isset($ror)) {
            $id_user = $row['id'];
        }

        $sql = "
            insert into comments
            set id_user='{$id_user}',
                id_news='{$id_news}',
                comment={$comment},
                id_parent='{$id_parent}',
                is_active='{$is_active}'
            ";

        $this->pdo->query($sql);

        $result = $this->get_comments($id_news);
       
        return $result;
    }

    public function change_comment($id_comment, $comment,$cnt_like,$cnt_dislike,$is_active)
    {
        $is_active = $is_active ? 1 : 0;
        $sql = "update comments set comment='{$comment}',
        cnt_like='{$cnt_like}',
        cnt_dislike='{$cnt_dislike}',
        is_active='{$is_active}'
        where id_comment ={$id_comment}";
                $this->pdo->query($sql);
    }

    public function deleteCommentById($id_comment)
    {
        // Текст запроса к БД
        $sql = 'DELETE FROM comments WHERE id_comment = :id_comment';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id_comment', $id_comment, \PDO::PARAM_INT);
        return $result->execute();
    }


    public function updateCommentsById($comment, $is_active)
    {
        // Текст запроса к БД

        $sql = "UPDATE comment SET comment = :comment WHERE is_active = :is_active";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':comment', $comment, \PDO::PARAM_INT);
        $result->bindParam(':is_active', $is_active, \PDO::PARAM_INT);

        return $result->execute();
    }

    public function getActiveComment()
    {
        $result = $this->pdo->query("SELECT u.name, c.* FROM comments c
        left join users u on u.id=c.id_user WHERE c.is_active=1");

        return $result;
    }

    public function getNotActiveComment()
    {
        $result = $this->pdo->query("SELECT u.name, c.* FROM comments c
        left join users u on u.id=c.id_user WHERE c.is_active=0");

        return $result;
    }


}