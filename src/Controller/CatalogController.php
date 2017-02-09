<?php

namespace Controller;

use Library\Request;
use Library\Controller;
use Model\News;
use Library\Pagination;

/**
 * Контроллер CatalogController
 * Каталог товаров
 */
class CatalogController extends Controller
{

    /**
     * Action для страницы "Категория новостей"
     */
    public function categoryAction(Request $request)
    {
        $News = $this->container->get('repository_manager')->getRepository('News');
        
        $categoryId = $request->get('id');

        $categoryName = $News->getCategoryById($categoryId);
            
        $total = $News->getTotalNewsInCategory($categoryId);

        $page = $request->get('st');
        if ($page === NULL){
            $page = 1;
        }
        
        $categoryNews = $News->getNewsListByCategory($categoryId, $page);

//        // Создаем объект Pagination - постраничная навигация
         $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');

        return $this->render('category.php', ['pagination' => $pagination, 'categoryNews' => $categoryNews, 'categoryName' => $categoryName['category_name']]);
    }

}
