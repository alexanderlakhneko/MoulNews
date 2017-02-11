<?php

namespace Model;

use Library\EntityRepository;
use Model\User;



class Admin extends EntityRepository
{
    public function admin_color(){
        $sql="select * from setting";
        $result = $this->pdo->query($sql);
        $color = array();
        while ($row = $result->fetch()) {
            $color[$row['config']] = $row['value'];
        }
        return $color;
    }

    public function save_color($config,$color){

        $sql="update setting set `value`='{$color}' where config='{$config}'";
        
        $this->pdo->query($sql);
    }
}