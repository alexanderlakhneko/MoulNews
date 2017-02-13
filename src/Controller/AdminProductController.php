<?php

namespace Controller;

use Library\Request;
use Library\Router;


class AdminProductController extends AdminBase
{


    public function indexAction()
    {
        // Проверка доступа
        $this->checkAdmin();
        $product = $this->container->get('repository_manager')->getRepository('Product');

        // Получаем список товаров
        $productsList = $product->getProducts();

        // Подключаем вид
        return $this->render('index.php', ['productsList' => $productsList]);
    }

    /**
     * Action для страницы "Добавить товар"
     */
    public function createAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();

        $products = $this->container->get('repository_manager')->getRepository('Product');



        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['product_name'] = $request->post('product_name');
            $options['price'] = $request->post('price');
            $options['firm'] = $request->post('firm');
            $options['site'] = $request->post('site');
            $options['is_active'] = $request->post('is_active');

            if ($products->createProduct($options)){
                // Перенаправляем пользователя на страницу управлениями товарами
                Router::redirect("/admin/product");
            };



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
        
        $products = $this->container->get('repository_manager')->getRepository('Product');
        
        // Получаем данные о конкретном заказе
        $product = $products->getProductsById($id);
        

        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['product_name'] = $request->post('product_name');
            $options['price'] = $request->post('price');
            $options['firm'] = $request->post('firm');
            $options['site'] = $request->post('site');

            // Сохраняем изменения
            if ($products->updateProductById($id, $options)) {

                // Перенаправляем пользователя на страницу управлениями товарами
                Router::redirect("/admin/product");
            }

            
            
        }

        // Подключаем вид
        return $this->render('update.php', ['products' => $products, 'product' => $product, 'id' => $id,]);
    }

    /**
     * Action для страницы "Удалить товар"
     */
    public function deleteAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();
        $product = $this->container->get('repository_manager')->getRepository('Product');

        $id = $request->get('id');

        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Удаляем товар
            $product->deleteProductById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            Router::redirect("/admin/product");
        }

        // Подключаем вид
        return $this->render('delete.php', ['id' => $id]);

    }

}
