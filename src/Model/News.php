<?php

namespace Model;

use Library\EntityRepository;

class News extends EntityRepository
{
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
}