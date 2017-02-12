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
}