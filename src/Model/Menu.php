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
        
        $Menu = array();
            while($row = $result->fetch(\PDO::FETCH_ASSOC)){
                $Menu_ID[$row['id']][] = $row;
               
                $Menu[$row['parent_id']][$row['id']] =  $row;
            }

        function build_tree($menus,$parent_id,$only_parent = false){
            if(is_array($menus) and isset($menus[$parent_id])){
                $tree = '<ul>';
                if($only_parent==false){
                    foreach($menus[$parent_id] as $menu){
                        $tree .= "<li><a href=/{$menu['href']}>".$menu['name'] . '</a>';
                        $tree .=  build_tree($menus,$menu['id']) ;
                        $tree .= '</li>';
                    }
                }elseif(is_numeric($only_parent)){
                    $menu = $menus[$parent_id][$only_parent];
                    $tree .= '<li>'.$menu['name'].' #'.$menu['id'];
                    $tree .=  build_tree($menus,$menu['id']);
                    $tree .= '</li>';
                }
                $tree .= '</ul>';
            }
            else return null;
            return $tree;
        }

        return build_tree($Menu, 0);

    }

    public function getMenuByAdmin($id)
    {
        // Запрос к БД
        $sql = 'SELECT * FROM menu WHERE id = :id';

        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch(\PDO::FETCH_ASSOC);


        return $row;
    }

    public function getMenuAdmin()
    {
        // Запрос к БД
        $result = $this->pdo->query('SELECT * FROM menu');

        $Menu = array();
        $i = 0;
        while($row = $result->fetch(\PDO::FETCH_ASSOC)){
            $Menu[$i] = $row;
            $i++;
        };
        return $Menu;
    }

    public function deleteMenuById($id)
    {
        // Текст запроса к БД
        $sql = 'DELETE FROM menu WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        return $result->execute();
    }

    public function updateMenuById($id, $options)
    {
        $name = $options['name'];
        $parent_id = $options['parent_id'];
        $href = $options['href'];
        $sql = "UPDATE `menu` SET `name` = '{$name}', parent_id = '{$parent_id}', href = '{$href}' WHERE `menu`.`id` = '{$id}';";
        var_dump($sql);
        $result = $this->pdo->query($sql);

//
//        // Текст запроса к БД
//        $sql = "UPDATE menu
//            SET
//                `name` = ':name',
//                parent_id = ':parent_id',
//                href = ':href',
//            WHERE id = :id";
//
//
//        // Получение и возврат результатов. Используется подготовленный запрос
//        $result = $this->pdo->prepare($sql);
//        $result->bindParam(':id', $id, \PDO::PARAM_INT);
//        $result->bindParam(':name', $options['name'], \PDO::PARAM_STR);
//        $result->bindParam(':parent_id', $options['parent_id'], \PDO::PARAM_STR);
//        $result->bindParam(':href', $options['href'], \PDO::PARAM_STR);

        return $result->execute();
    }


    public function createMenu($options)
    {
        // Текст запроса к БД
        $sql = 'INSERT INTO menu '
            . '(`name`, parent_id, href)'
            . 'VALUES '
            . '(:name, :parent_id, :href)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':name', $options['name'], \PDO::PARAM_STR);
        $result->bindParam(':parent_id', $options['parent_id'], \PDO::PARAM_STR);
        $result->bindParam(':href', $options['href'], \PDO::PARAM_STR);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $this->pdo->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }
}