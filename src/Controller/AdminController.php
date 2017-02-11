<?php

namespace Controller;

/**
 * Контроллер AdminController
 * Главная страница в админпанели
 */
class AdminController extends AdminBase
{
    /**
     * Action для стартовой страницы "Панель администратора"
     */
    public function indexAction()
    {
        // Проверка доступа
        $this->checkAdmin();
        
        return $this->render('index.php');
    }

}
