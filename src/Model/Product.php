<?php

namespace Model;

use Library\EntityRepository;

class Product extends EntityRepository
{
    public function getProducts()
    {
//         Запрос к БД

        $result = $this->pdo->query('SELECT product_name, price, site, firm FROM promotion');

        // Получение и возврат результатов
        $i = 0;
        $Products = array();
        while ($row = $result->fetch()) {
            $Products[$i]['product_name'] = $row['product_name'];
            $Products[$i]['price'] = $row['price'];
            $Products[$i]['firm'] = $row['firm'];
            $Products[$i]['site'] = $row['site'];
            $i++;
        }
        return $Products;
    }
}