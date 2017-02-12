<?php


namespace Model;

use Library\EntityRepository;

class Menu extends EntityRepository
{
        public function getMenuList()
    {
        // Запрос к БД
        $result = $this->pdo->query('SELECT * FROM menu');

        // Получение и возврат результатов
        $i = 0;
        $Menu = array();
        while ($row = $result->fetch()) {
            $Menu[$i]['id'] = $row['category_id'];
            $categoryList[$i]['name'] = $row['category_name'];
            $i++;
        }
        return $categoryList;
    }
}