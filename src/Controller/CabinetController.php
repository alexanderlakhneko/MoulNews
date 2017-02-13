<?php

namespace Controller;


use Library\Controller;


class CabinetController extends Controller
{

    /**
     * Action для страницы "Кабинет пользователя"
     */
    public function indexAction()
    {
        $user = $this->container->get('repository_manager')->getRepository('User');
        // Получаем идентификатор пользователя из сессии
        $userId = $user->checkLogged();

        // Получаем информацию о пользователе из БД
        $user = $user->getUserById($userId);

        // Подключаем вид
        return $this->render('index.php', ['userId' => $userId, 'user' => $user]);
    }
    
}
