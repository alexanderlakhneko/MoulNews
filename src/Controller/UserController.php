<?php

namespace Controller;

use Library\Session;
use Library\Controller;
use Library\Request;

/**
 * Контроллер UserController
 */
class UserController extends Controller
{
    /**
     * Action для страницы "Регистрация"
     */
    public function registerAction(Request $request)
    {
        // Переменные для формы
        $name = false;
        $email = false;
        $password = false;
        $result = false;
        $errors = false;

        $user = $this->container->get('repository_manager')->getRepository('User');

        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена 
            // Получаем данные из формы
            $name = $request->post('name');
            $email = $request->post('email');
            $password = $request->post('password');


            // Валидация полей
            if (!$user->checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!$user->checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!$user->checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if ($user->checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            if ($user->checkNameExists($name)) {
                $errors[] = 'Данное имя уже занято';
            }
            
            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
                $result = $user->register($name, $email, $password);
            }
        }

        return $this->render('register.php', ['email' => $email, 'password' => $password, 'name' => $name, 'result' =>$result, 'errors' => $errors ]);
    }
    
    /**
     * Action для страницы "Вход на сайт"
     */
    public function loginAction(Request $request)
    {

        // Переменные для формы
        $email = false;
        $password = false;
        $user = $this->container->get('repository_manager')->getRepository('User');
        $errors = false;

        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Получаем данные из формы
            $email = $request->post('email');
            $password = $request->post('password');

            // Валидация полей
            if (!$user->checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!$user->checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = $user->checkUserData($email, $password);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                $user->auth($userId);

                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /cabinet");
            }
        }

        return $this->render('login.php', ['email' => $email, 'password' => $password, 'errors' => $errors]);
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function logoutAction()
    {
        // Стартуем сессию
//        Session::start();
        
        // Удаляем информацию о пользователе из сессии
        Session::remove('user');
        
        // Перенаправляем пользователя на главную страницу
        header("Location: /");
    }

}
