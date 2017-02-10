<?php

namespace Controller;


use Library\Controller;

/**
 * Контроллер CabinetController
 * Кабинет пользователя
 */
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

    /**
     * Action для страницы "Редактирование данных пользователя"
     */
    public function editAction()
    {
        $user = $this->container->get('repository_manager')->getRepository('User');
        // Получаем идентификатор пользователя из сессии
        $userId = $user->checkLogged();

        // Получаем информацию о пользователе из БД
        $user = $user->getUserById($userId);

        // Заполняем переменные для полей формы
        $name = $user['name'];
        $password = $user['password'];

        // Флаг результата
        $result = false;

        // Флаг ошибок
        $errors = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования
            $name = $_POST['name'];
            $password = $_POST['password'];

            // Валидируем значения
            if (!$user->checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!$user->checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if ($errors == false) {
                // Если ошибок нет, сохраняет изменения профиля
                $result = $user->edit($userId, $name, $password);
            }
        }

        // Подключаем вид
        return $this->render('edit.php', ['result' => $result, 'errors' => $errors, 'name' => $name, 'password' => $password]);
    }

}
