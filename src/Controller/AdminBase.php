<?php

namespace Controller;

use Model\User;
use Library\Controller;

/**
 * Абстрактный класс AdminBase содержит общую логику для контроллеров, которые 
 * используются в панели администратора
 */
abstract class AdminBase extends Controller
{
    /**
     * Метод, который проверяет пользователя на то, является ли он администратором
     * @return boolean
     */
    
    public function checkAdmin()
    {
        $user = $this->container->get('repository_manager')->getRepository('User');
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = $user->checkLogged();

        // Получаем информацию о текущем пользователе
        $user = $user->getUserById($userId);

        // Если роль текущего пользователя "admin", пускаем его в админпанель
        if ($user['role'] == 'admin') {
            self::$layout = 'default_layout_admin.php';
            return true;
        }

        // Иначе завершаем работу с сообщением об закрытом доступе
        die('Access denied');
    }

}
