<?php

namespace Model;

use Library\EntityRepository;

class Product extends EntityRepository
{
    public function getProducts()
    {
//         Запрос к БД

        $result = $this->pdo->query('SELECT id, product_name, price, site, firm FROM promotion');

        // Получение и возврат результатов
        $i = 0;
        $Products = array();
        while ($row = $result->fetch()) {
            $Products[$i]['id'] = $row['id'];
            $Products[$i]['product_name'] = $row['product_name'];
            $Products[$i]['price'] = $row['price'];
            $Products[$i]['firm'] = $row['firm'];
            $Products[$i]['site'] = $row['site'];
            $i++;
        }
        return $Products;
    }

    public function getProductsById($id)
    {
//         Запрос к БД

        $sql = 'SELECT product_name, price, site, firm, is_active FROM promotion WHERE `id` = :id';

        // Получение и возврат результатов
      
        $Products = array();
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        $result->execute();
        
        while ($row = $result->fetch()) {
            $Products['product_name'] = $row['product_name'];
            $Products['price'] = $row['price'];
            $Products['firm'] = $row['firm'];
            $Products['site'] = $row['site'];
            $Products['is_active'] = $row['is_active'];
        }
        return $Products;
    }

    public function deleteProductById($id)
    {
        // Текст запроса к БД
        $sql = 'DELETE FROM promotion WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редактирует товар с заданным id
     * @param integer $id <p>id товара</p>
     * @param array $options <p>Массив с информацей о товаре</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function updateProductById($id, $options)
    {
        // Текст запроса к БД
        $sql = "UPDATE promotion
            SET 
                product_name = :product_name, 
                price = :price, 
                firm = :firm, 
                site = :site, 
                is_active = :is_active
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        $result->bindParam(':product_name', $options['product_name'], \PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], \PDO::PARAM_STR);
        $result->bindParam(':firm', $options['firm'], \PDO::PARAM_STR);
        $result->bindParam(':site', $options['site'], \PDO::PARAM_INT);
        $result->bindParam(':is_active', $options['is_active'], \PDO::PARAM_STR);
 
        return $result->execute();
    }

    /**
     * Добавляет новый товар
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public function createProduct($options)
    {
        // Текст запроса к БД
        $sql = 'INSERT INTO promotion '
            . '(product_name, price, firm, site, is_active)'
            . 'VALUES '
            . '(:product_name, :price, :firm, :site, :is_active)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':product_name', $options['product_name'], \PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], \PDO::PARAM_STR);
        $result->bindParam(':firm', $options['firm'], \PDO::PARAM_STR);
        $result->bindParam(':site', $options['site'], \PDO::PARAM_INT);
        $result->bindParam(':is_active', $options['is_active'], \PDO::PARAM_STR);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $this->pdo->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }
}