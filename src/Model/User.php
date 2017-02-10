<?php

namespace Model;

use Library\EntityRepository;
use Library\Session;

/**
 * Класс User - модель для работы с пользователями
 */
class User extends EntityRepository
{

    /**
     * Регистрация пользователя 
     * @param string $name <p>Имя</p>
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function register($name, $email, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        // Текст запроса к БД
        $sql = 'INSERT INTO users (name, email, password) '
                . 'VALUES (:name, :email, :password)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':name', $name, \PDO::PARAM_STR);
        $result->bindParam(':email', $email, \PDO::PARAM_STR);
        $result->bindParam(':password', $password, \PDO::PARAM_STR);
        return $result->execute();
    }



    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return mixed : integer user id or false
     */
    public function checkUserData($email, $password)
    {
        // Текст запроса к БД
        $sql = 'SELECT * FROM users WHERE email = :email';

        // Получение результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':email', $email, \PDO::PARAM_INT);
        $result->execute();

        // Обращаемся к записи
        $user = $result->fetch();



        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user['id'];
            }
        }


        return false;
    }

    /**
     * Запоминаем пользователя
     * @param integer $userId <p>id пользователя</p>
     */
    public function auth($userId)
    {
        // Записываем идентификатор пользователя в сессию
        Session::set('user', $userId);
    }

    /**
     * Возвращает идентификатор пользователя, если он авторизирован.<br/>
     * Иначе перенаправляет на страницу входа
     * @return string <p>Идентификатор пользователя</p>
     */
    public function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (Session::has('user')) {
            return Session::get('user');
        }

        header("Location: /user/login");
    }

    /**
     * Проверяет является ли пользователь гостем
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function isGuest()
    {
        if (Session::has('user')) {
            return false;
        }
        return true;
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     * @param string $name <p>Имя</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }


    /**
     * Проверяет имя: не меньше, чем 6 символов
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     * @param string $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет не занят ли email другим пользователем
     * @param type $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function checkEmailExists($email)
    {
        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        // Получение результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':email', $email, \PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    public function checkNameExists($name)
    {
        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM users WHERE name = :name';

        // Получение результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':name', $name, \PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Возвращает пользователя с указанным id
     * @param integer $id <p>id пользователя</p>
     * @return array <p>Массив с информацией о пользователе</p>
     */
    public function getUserById($id)
    {
        // Текст запроса к БД
        $sql = 'SELECT * FROM users WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->pdo->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(\PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

}
