<?php

namespace Controller;

use Library\Request;
use Library\Router;

class AdminCategoryController extends AdminBase
{

    public function indexAction()
    {
        // Проверка доступа
        $this->checkAdmin();
        $category = $this->container->get('repository_manager')->getRepository('News');

        $CategoriesList = $category->getCategoriesList();
        
        // Подключаем вид
        return $this->render('index.php', ['CategoriesList' => $CategoriesList]);
    }

    public function createAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();

        $categories = $this->container->get('repository_manager')->getRepository('News');

        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Получаем данные из формы
            $category_name = $request->post('category_name');
            if($categories->createCategory($category_name)){
                // Перенаправляем пользователя на страницу управлениями товарами
                Router::redirect("/admin/category");
            }
        }

        // Подключаем вид
        return $this->render('create.php');
    }

    /**
     * Action для страницы "Редактировать товар"
     */
    public function updateAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();

        $id = $request->get('id');

        $categories = $this->container->get('repository_manager')->getRepository('News');

        // Получаем данные о конкретном заказе
        $category = $categories->getCategoryById($id);


        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Получаем данные из формы

            $category_name = $request->post('tag_name');
            // Сохраняем изменения
            if ($categories->updateCategoryById($id, $category_name)) {

                // Перенаправляем пользователя на страницу управлениями товарами
                Router::redirect("/admin/category");
            }
        }

        // Подключаем вид
        return $this->render('update.php', ['category' => $category['category_name']]);
    }

    /**
     * Action для страницы "Удалить товар"
     */
    public function deleteAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();
        $categories = $this->container->get('repository_manager')->getRepository('News');

        $id = $request->get('id');

        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Удаляем товар
            $categories->deleteCategoryById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            Router::redirect("/admin/category");
        }

        // Подключаем вид
        return $this->render('delete.php', ['id' => $id]);

    }
}