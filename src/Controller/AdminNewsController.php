<?php

namespace Controller;

use Library\Request;
use Library\Router;
use Library\Pagination;
use Model\News;


class AdminNewsController extends AdminBase
{

    public function indexAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();
        $news = $this->container->get('repository_manager')->getRepository('News');



        $page = $request->get('id');
        if ($page === NULL){
            $page = 1;
        }

        $NewsList = $news->getNewsList($page);

        $total = $news->getTotalNews();
        

        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');

        // Подключаем вид
        return $this->render('index.php', ['NewsList' => $NewsList, 'pagination' => $pagination]);
    }

    public function createAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();
        $news = $this->container->get('repository_manager')->getRepository('News');

        // Получаем список категорий для выпадающего списка
        $categoriesList = $news->getCategoriesList();

        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['title'] = $request->post('title');
            $options['content'] = $request->post('content');
            $options['is_analitic'] = $request->post('is_analitic');
            $options['category_id'] = $request->post('category_id');

            if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                // Если загружалось, переместим его в нужную папке, дадим новое имя
                $file_name = explode(".", $_FILES["image"]["name"]);
                $options['img'] = $file_name[0];
                move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/webroot/images/News/{$file_name[0]}.jpg");

            }



            $id = $news->createNews($options);


            // Если запись добавлена
            if ($id) {
                header("Location: /admin/news/page-1");
            };

        }

        // Подключаем вид
        return $this->render('create.php', ['categoriesList' => $categoriesList]);
    }

    /**
     * Action для страницы "Редактировать товар"
     */
    public function updateAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();

        $id = $request->get('id');

        $news = $this->container->get('repository_manager')->getRepository('News');

        // Получаем список категорий для выпадающего списка
        $NewsList = $news->getCategoriesList();

        // Получаем данные о конкретном заказе
        $new = $news->getNewById($id);

        // Обработка формы
        if ($request->post('title')) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['title'] = $request->post('title');
            $options['content'] = $request->post('content');
            $options['is_analitic'] = $request->post('is_analitic');
            $options['category_id'] = $request->post('category_id');
            $options['img'] = $request->post('img');
            var_dump($_POST);

            if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                // Если загружалось, переместим его в нужную папке, дадим новое имя
                $file_name = explode(".", $_FILES["image"]["name"]);
                $options['img'] = $file_name[0];
                move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/webroot/images/News/{$file_name[0]}.jpg");

            }

            $id = $news->updateNewsById($id, $options);

            header("Location: /admin/news/page-1");

        }

        if ($request->post('add')) {
            $id_tag = $request->post('id_tag');
            $news->AddTegToNew($id, $id_tag);

            header("Location: /admin/news/update/$id");
        
        }


        $tags = $this->container->get('repository_manager')->getRepository('Tags');
        $tag = $tags->getTag($id);
        $tagslist = $tags->getTagsList();

        // Подключаем вид
        return $this->render('update.php', ['new' => $new, 'NewsList' => $NewsList, 'tags' => $tag, 'tagslist' => $tagslist]);
    }


    public function deleteAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();
        $news = $this->container->get('repository_manager')->getRepository('News');

        $id = $request->get('id');

        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Удаляем товар
            $news->deleteNewsById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/news/page-1");
        }

        // Подключаем вид
        return $this->render('delete.php', ['id' => $id]);

    }

    public function tagsdelAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();
        $news = $this->container->get('repository_manager')->getRepository('News');

        $id = $request->get('id');

        $st = $request->get('st');
        
        $news->deleteTegFromNews($st, $id);

            header("Location: /admin/news/update/$st");

    }

}