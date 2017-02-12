<?php


namespace Model;

use Library\EntityRepository;

class Tags extends EntityRepository
{
    public function getTag($id)
    {
        $sql = "SELECT tags.tag_name, tags.id_tag FROM tags JOIN tag_news ON tags.id_tag = tag_news.id_tag WHERE tag_news.id_news = :id";

        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(\PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        $tags = array();
        $i = 0;

        while ($row = $result->fetch()) {
            $tags[$i]['tag_name'] = $row['tag_name'];
            $tags[$i]['id_tag'] = $row['id_tag'];
            
            $i++;
        }

        return $tags;
    }

    public function getTagSearch($tagname)
    {
        $sql = "SELECT tag_name, id_tag FROM tags WHERE tag_name LIKE ?";

        $result = $this->pdo->prepare($sql);


        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(\PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute(array("%$tagname%"));

        $tags = array();
        $i = 0;

        while ($row = $result->fetch()) {
            $tags[$i]['tag_name'] = $row['tag_name'];
            $tags[$i]['id_tag'] = $row['id_tag'];

            $i++;
        }

        return $tags;
    }

    public function getNewsByTag($id , $page = 1, $limit = News::SHOW_BY_DEFAULT)
    {
        // Смещение (для запроса)
        $offset = ($page - 1) * $limit;
        
        $sql = "SELECT news.id_news, news.title FROM news JOIN tag_news ON tag_news.id_news = news.id_news WHERE tag_news.id_tag = :id 
                LIMIT :limit OFFSET :offset";

        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, \PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(\PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();
        
        $news = array();
        $i = 0;

        while ($row = $result->fetch()) {
            $news[$i]['title'] = $row['title'];
            $news[$i]['id_news'] = $row['id_news'];

            $i++;
        }

        return $news;
    }

    public function getTotalNewsInTag($id)
    {
        // Текст запроса к БД
        $sql = "SELECT count(news.id_news) AS `count` FROM news JOIN tag_news ON tag_news.id_news = news.id_news WHERE tag_news.id_tag = :id";
        
        // Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();


        // Возвращаем значение count - количество
        $row = $result->fetch();

        return $row['count'];
    }

    public function getTagsList()
    {
        // Запрос к БД
        $result = $this->pdo->query('SELECT tag_name, id_tag FROM tags');

        $tags = array();
        $i = 0;

        while ($row = $result->fetch()) {
            $tags[$i]['tag_name'] = $row['tag_name'];
            $tags[$i]['id_tag'] = $row['id_tag'];

            $i++;
        }

        return $tags;
    }

    public function deleteTagById($id_tag)
    {
        // Текст запроса к БД
        $sql = 'DELETE FROM tags WHERE id_tag = :id_tag';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id_tag', $id_tag, \PDO::PARAM_INT);
        return $result->execute();
    }


    public function updateTagById($id_tag, $tag_name)
    {
        // Текст запроса к БД
        
        $sql = "UPDATE tags SET tag_name = :tag_name WHERE id_tag = :id_tag";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id_tag', $id_tag, \PDO::PARAM_INT);
        $result->bindParam(':tag_name', $tag_name, \PDO::PARAM_INT);

        return $result->execute();
    }


    public function createTag($tag_name)
    {
        // Текст запроса к БД
        $sql = 'INSERT INTO tags (tag_name) VALUES (:tag_name)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':tag_name', $tag_name, \PDO::PARAM_INT);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $this->pdo->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    public function getTagById($id_tag)
    {
//         Запрос к БД

        $sql = 'SELECT tag_name FROM tags  WHERE id_tag = :id_tag';

        // Получение и возврат результатов

        $Products = array();
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id_tag', $id_tag, \PDO::PARAM_INT);
        $result->execute();

        $row = $result->fetch(); 
       
        return $row;
    }
}