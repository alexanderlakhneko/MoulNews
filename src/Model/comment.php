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
        LEFT JOIN users u ON u.id=c.id_user
        WHERE id_comment='{$id_comment}'");

        return $result;
    }
    public function admin_edit_comment($id){
        $sql="SELECT * FROM comments WHERE id_comment={$id}";
        $row = $this->pdo->query($sql);

        return $row->fetch();
    }

    public function get_comments($id_news)
    {
        $sql = "SELECT u.name, c.* FROM comments c
        LEFT JOIN users u ON u.id=c.id_user
        WHERE id_news='{$id_news}' AND c.is_active=1 ORDER BY id_parent,date_time DESC";
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
            $sql = "SELECT count(*) AS COUNT FROM comments";
            $count_news = $this->pdo->query($sql);
            $row = $count_news->fetch();
            $total_rows = ($row['COUNT']);

            return $total_rows;
    }

    public function top_commentators($limit = 5)
    {
        $sql = "SELECT c.*,count(*) AS cnt,u.name FROM comments c
              LEFT JOIN users u ON u.id=c.id_user
              GROUP BY c.id_user ORDER BY cnt DESC
              limit {$limit}";
        return $this->pdo->query($sql);
    }

    public function getCommentCnt($id_user)
    {
        $sql = "SELECT count(*) AS cnt FROM comments WHERE id_user={$id_user}";
        $result = $this->pdo->query($sql);
        $row = $result->fetch();
        return $row;
    }

    public function getThemes($limit = 3)
    {

        $sql = "SELECT c.*,n.title FROM (SELECT max(date_time) datet,id_news FROM comments 
GROUP BY id_news limit {$limit}) c
LEFT JOIN news n ON n.id_news=c.id_news";
        return $this->pdo->query($sql);

    }

    public function getCommentsByUser($id_user, $page = 0, $limit = 5)
    {
        // Смещение (для запроса)
        $offset = ($page - 1) * $limit;
        
        $sql = "SELECT c.*,n.title,u.name FROM comments c
              LEFT JOIN users u ON u.id=c.id_user
              LEFT JOIN news n ON n.id_news=c.id_news
              WHERE c.id_user ={$id_user} AND c.is_active=1 ORDER BY  c.date_time DESC limit {$limit} OFFSET {$offset} ";
        $result['comment'] = $this->pdo->query($sql);
        return $result;
    }

    public function admin_get_comments($page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;

        $sql="SELECT c.id_comment, c.id_parent, u.name ,n.title, cat.category_name, c.`comment`, c.date_time, c.cnt_like, c.cnt_dislike, c.is_active FROM comments c
            LEFT JOIN users u ON u.id=c.id_user
            LEFT JOIN news n ON n.id_news=c.id_news
            LEFT JOIN category cat ON cat.category_id=n.category_id ORDER BY c.date_time DESC LIMIT {$limit} OFFSET {$offset}";

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

        $sql = "SELECT v.*,u.name FROM votes_comment v
        LEFT JOIN users u on u.id=v.id_user WHERE id_comment={$id_comment} AND
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
        $sql = "SELECT n.id_news FROM news n
        WHERE n.id_news={$id_news} AND n.category_id=5 limit 1";
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
        $sql_user = "SELECT id,`name` FROM users WHERE name LIKE '%{$id_user}%'";
        $comment = htmlspecialchars($this->pdo->quote($comment));
        $result = $this->pdo->query($sql_user);
        $row = $result->fetch();
        if (isset($ror)) {
            $id_user = $row['id'];
        }

        $sql = "
            INSERT INTO comments
            SET id_user='{$id_user}',
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
        $sql = "UPDATE comments SET comment='{$comment}',
        cnt_like='{$cnt_like}',
        cnt_dislike='{$cnt_dislike}',
        is_active='{$is_active}'
        WHERE id_comment ={$id_comment}";
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
    
    public function CommentsShow($comment, $level2 = 0)
    {
        static $result;


        foreach ( $comment as $item => $value) {
            if ($level2 == 1) {
                $result .= "<div class='panel panel2 panel-info' style='margin-left: 80px;'>";
            } else {
                $result .= "<div class='panel panel2 panel-info'>";
            }
            $result .= "<div class='panel-heading'>";
            $result .= "<h3 class='panel-title'>";
            $result .= "Name: <a>{$value['name']}</a>";
            $result .= " Time: {$value['date_time']} </h3> </div>";
            $result .= "<div class='panel-body'>{$value['comment']}</div>";
            $result .= "<div class='panel-footer' style='padding: 4px 15px; overflow: hidden;'>";
            if (Session::get('user') && $level2 == 0) {
                $result .= "<div style='float: left'>";
                $result .= "<a id='answer'>Ответить</a></div>";
            }
            $result .= "<div style='float: right'>";
            $result .= "<input type='hidden' id='id_comment' value='{$value['id_comment']}'>";
            $result .= "<input type='hidden' id='id_user' value='{$value['id_user']}'>";
            $result .= "<button type='button' id='like' class='btn btn-default btn-xs'>
                        Like:<span class='glyphicon glyphicon-thumbs-up'
                             aria-hidden='true'>{$value['cnt_like']}</span>
                     </button>";
            $result .= "<button type='button' id='dislike' class='btn btn-default btn-xs'>
                        Like:<span class='glyphicon glyphicon-thumbs-down'
                             aria-hidden='true'>{$value['cnt_dislike']}</span>
                     </button>";
            $result .= "</div></div></div>";
            if (isset($value['childs'])) {

                $level2++;

                $this->CommentsShow($value['childs'], $level2);

                $level2 = 0;
            }
        }
        return $result;
    }


}