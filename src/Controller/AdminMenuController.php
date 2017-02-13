<?php

namespace Controller;

use Library\Request;
use Library\Router;


class AdminMenuController extends AdminBase
{
    public function indexAction()
    {
        // Проверка доступа
        $this->checkAdmin();


        $menus = $this->container->get('repository_manager')->getRepository('Menu');

        $data = $menus->getMenuAdmin();

        return $this->render('index.php', ['menus' => $data]);
    }

    public function deleteAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();
        $menus = $this->container->get('repository_manager')->getRepository('Menu');

        $id = $request->get('id');

        $menus->deleteMenuById($id);

        header("Location: /admin/menu");
    }

    public function createAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();

        $menus = $this->container->get('repository_manager')->getRepository('Menu');
        $menusAll = $menus->getMenuAdmin();
        
        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $request->post('name');
            $options['parent_id'] = $request->post('parent_id');
            $options['href'] = $request->post('href');
            
            if ($menus->createMenu($options)){
                // Перенаправляем пользователя на страницу управлениями товарами
                Router::redirect("/admin/menu");
            };

        }

        // Подключаем вид
        return $this->render('create.php' , ['menusAll' => $menusAll]);
    }

    /**
     * Action для страницы "Редактировать товар"
     */
    public function updateAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();

        $id = $request->get('id');

        $menus = $this->container->get('repository_manager')->getRepository('Menu');

        // Получаем данные о конкретном заказе
        $menu = $menus->getMenuByAdmin($id);
        
        $menusAll = $menus->getMenuAdmin();


        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $request->post('name');
            $options['parent_id'] = $request->post('parent_id');
            $options['href'] = $request->post('href');

            // Сохраняем изменения
            if ($menus->updateMenuById($id, $options)) {

                // Перенаправляем пользователя на страницу управлениями товарами
                Router::redirect("/admin/menu");
            }

        }

        // Подключаем вид
        return $this->render('update.php', ['menu' => $menu, 'menusAll' => $menusAll]);
    }

}