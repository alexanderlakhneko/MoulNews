<?php

namespace Model;

use Library\EntityRepository;

class News extends EntityRepository
{
    // Количество отображаемых новостей по умолчанию на главной транице
    const SHOW_BY_DEFAULT = 6;

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
    public function getRecommendedNews($page = 1)
    {
        //Отображение количества последних новостей на странице
        $limit = 3;

        // Смещение (для запроса)
        $offset = ($page - 1) * $limit;

        // Получение и возврат результатов
        $sql = 'SELECT id_news, title, img FROM news ORDER BY `date` LIMIT :limit OFFSET :offset';
        
        // Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
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
            $news[$i]['img'] = $row['img'];
            $i++;
        }

        return $news;
    }
    
}

