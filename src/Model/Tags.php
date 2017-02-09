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

    public function getNewsByTag($id)
    {
        $sql = "SELECT news.id_news, news.title FROM news JOIN tag_news ON tag_news.id_news = news.id_news WHERE tag_news.id_tag = :id";

        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);

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
}