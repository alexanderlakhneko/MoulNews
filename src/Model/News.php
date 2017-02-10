<?php

namespace Model;

use Library\EntityRepository;
use Model\User;

class News extends EntityRepository
{
    // Количество отображаемых новостей по умолчанию на главной транице
    const SHOW_BY_DEFAULT = 5;
    const SHOW_LATE_NEWS = 6;

    /**
     * Возвращает массив категорий для списка на сайте
     * @return array <p>Массив с категориями</p>
     */

    public function getCategoriesList()
    {
        // Запрос к БД
        $result = $this->pdo->query('SELECT category_id, category_name FROM category ORDER BY category_name ASC');
        
        // Получение и возврат результатов
        $i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['category_id'];
            $categoryList[$i]['name'] = $row['category_name'];
            $i++;
        }
        return $categoryList;
    }

    /**
     * Возвращает список товаров
     * @return array <p>Массив с товарами</p>
     */
    public function getNewsListByCategory($categoryId, $page = 1, $limit = News::SHOW_BY_DEFAULT)
    {
        // Смещение (для запроса)
        $offset = ($page - 1) * $limit;
        
        // Текст запроса к БД
        $sql = 'SELECT id_news, title FROM news '
            . 'WHERE category_id = :category_id '
            . 'ORDER BY id_news ASC LIMIT :limit OFFSET :offset';

        // Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':category_id', $categoryId, \PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, \PDO::PARAM_INT);

        

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $news = array();

        while ($row = $result->fetch()) {

            $news[$i]['id_news'] = $row['id_news'];
            $news[$i]['title'] = $row['title'];
            $i++;
        }

        return $news;
    }

    /**
     * Возвращает список последних новостей
     * @return array <p>Массив с товарами</p>
     */
    public function getRecommendedNews()
    {
        //Отображение количества последних новостей на странице
        $limit = self::SHOW_LATE_NEWS;

        // Получение и возврат результатов
        $sql = 'SELECT id_news, title, img FROM news ORDER BY `date` LIMIT :limit';
        
        // Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':limit', $limit, \PDO::PARAM_INT);
        
        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $news = array();

        while ($row = $result->fetch()) {

            $news[$i]['id_news'] = $row['id_news'];
            $news[$i]['title'] = $row['title'];
            $news[$i]['img'] = $row['img'];
            $i++;
        }

        return $news;
    }

    public function getTotalNewsInCategory($categoryId)
    {
        // Текст запроса к БД

        $sql = 'SELECT count(id_news) AS `count` FROM news WHERE category_id = :category_id';

        // Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':category_id', $categoryId, \PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();


        // Возвращаем значение count - количество
        $row = $result->fetch();

        return $row['count'];
    }

    /**
     * Возвращает категорию с указанным id
     * @param integer $id <p>id категории</p>
     * @return array <p>Массив с информацией о категории</p>
     */
    public function getCategoryById($id)
    {
        // Текст запроса к БД
        $sql = 'SELECT * FROM category WHERE category_id = :id';

        // Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(\PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }

    public function getNewById($id)
    {
        // Текст запроса к БД
        $sql = 'SELECT * FROM news WHERE id_news = :id';

        $readers = rand(0, 5);

        // Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(\PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $res = $result->fetch();
        $res['readers'] = $readers;

        $readers += $res['visit'];

        $sql = 'UPDATE `news` SET `visit` = :readers  WHERE `id_news` = :id;';

        $result = $this->pdo->prepare($sql);
        $result->bindParam(':readers', $readers, \PDO::PARAM_INT);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        $result->execute();

        if (User::isGuest() && $res['is_analitic'] == 1) {
            $res['content'] = $this->isanalitic($res['content'], 5);
        }

        return $res;
    }

    public function getNewsByFilter($post)
    {
        $sql = "SELECT distinct news.`id_news`, news.`title` FROM `news`
                left join tag_news on tag_news.id_news=news.id_news
                WHERE";


        if ($post['date_1'] != 0 && $post['date_2'] == 0) {
            $date_1 = $post['date_1'];
            $sql .= " news.`date` >= '{$date_1}'";
        }

        if ($post['date_2'] != 0 && $post['date_1'] == 0) {
            $date_2 = $post['date_2'];
            $sql .= " news.`date` <= '{$date_2}'";
        }

        if ($post['date_2'] != 0 && $post['date_1'] != 0) {
            $date_1 = $post['date_1'];
            $date_2 = $post['date_2'];
            $sql .= " news.`date` BETWEEN '{$date_1}' AND '{$date_2}'";
        }

        if (isset($post['tags'])) {
            if ($post['date_2'] != 0 or $post['date_1'] != 0) {
                $sql .= " and";
            }

            $tags = implode(", ", $post['tags']);
            $sql .= " tag_news.id_tag in(:tags)";
        }

        if (isset($post['category'])) {
            if ($post['date_2'] != 0 or $post['date_1'] != 0 or isset($post['tags'])) {
                $sql .= " and";
            }

            $category = implode(", ", $post['category']);
            $sql .= " news.`category_id` in(:category)";
        }

        $result = $this->pdo->prepare($sql);


//        if ($post['date_1'] != 0 && $post['date_2'] == 0) {
//            $result->bindParam(':date_1', $post['date_1'], \PDO::PARAM_INT);
//        }
//
//        if ($post['date_2'] != 0 && $post['date_1'] == 0) {
//            $result->bindParam(':date_2', $post['date_2'], \PDO::PARAM_INT);
//        }
//
//        if ($post['date_2'] != 0 && $post['date_1'] != 0) {
//            $result->bindParam(':date_1', $post['date_1'], \PDO::PARAM_INT);
//            $result->bindParam(':date_2', $post['date_2'], \PDO::PARAM_INT);
//
//        }

        if (isset($post['tags'])) {
            $result->bindParam(':tags', $tags, \PDO::PARAM_INT);
        }

        if (isset($post['category'])) {
            $result->bindParam(':category', $category, \PDO::PARAM_INT);
        }

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(\PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        $res = array();

        while ($row = $result->fetch()) {
            $res[] = $row;
        }
        return $res;


    }

    public function isanalitic($content, $row = 5)
    {
        $sentences = explode('.', $content);
        $content = '';
        for ($i = 0; $i < $row; $i++) {
            if (!isset($sentences[$i])) {
                return $content;
            }
            $content .= $sentences[$i] . '.';
        }

        $content .= ' <a href="/user/register">Регистрация...</a>';
        
        return $content;
    }
}
