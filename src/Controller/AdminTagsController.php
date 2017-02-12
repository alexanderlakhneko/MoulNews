<?php

namespace Controller;

use Library\Request;
use Library\Router;


class AdminTagsController extends AdminBase
{
    /**
     * Action для страницы "Управление тегами"
     */
    public function indexAction()
    {
        // Проверка доступа
        $this->checkAdmin();
        $tags = $this->container->get('repository_manager')->getRepository('Tags');

        // Получаем список товаров
        $tagsList = $tags->getTagsList();

        // Подключаем вид
        return $this->render('index.php', ['tagsList' => $tagsList]);
    }

    /**
     * Action для страницы "Добавить товар"
     */
    public function createAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();

        $tags = $this->container->get('repository_manager')->getRepository('Tags');

        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Получаем данные из формы
            $tag_name = $request->post('tag_name');
            if($tags->createTag($tag_name)){
                // Перенаправляем пользователя на страницу управлениями товарами
                Router::redirect("/admin/tags");
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

        $tags = $this->container->get('repository_manager')->getRepository('Tags');

        // Получаем данные о конкретном заказе
        $tag = $tags->getTagById($id);


        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Получаем данные из формы

            $tag_name = $request->post('tag_name');
            // Сохраняем изменения
            if ($tags->updateTagById($id, $tag_name)) {

                // Перенаправляем пользователя на страницу управлениями товарами
                Router::redirect("/admin/tags");
            }
        }

        // Подключаем вид
        return $this->render('update.php', ['tag' => $tag['tag_name']]);
    }

    /**
     * Action для страницы "Удалить товар"
     */
    public function deleteAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();
        $tags = $this->container->get('repository_manager')->getRepository('Tags');

        $id = $request->get('id');

        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Удаляем товар
            $tags->deleteTagById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            Router::redirect("/admin/tags");
        }

        // Подключаем вид
        return $this->render('delete.php', ['id' => $id]);

    }
}