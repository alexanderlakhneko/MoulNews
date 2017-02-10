<?php

namespace Controller;

use Library\Controller;
use Library\Request;
use Model\News;
use Library\Pagination;


class TagsController extends Controller
{
    public function showAction(Request $request)
    {
        $tags = $this->container->get('repository_manager')->getRepository('Tags');

        $total = $tags->getTotalNewsInTag($request->get('id'));

        $page = $request->get('st');
        if ($page === NULL){
            $page = 1;
        }

        $tag = $tags->getNewsByTag($request->get('id'), $page);

        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');

        // Подключаем вид
        return $this->render('tags.php', ['tags' => $tag, 'pagination' => $pagination ]);
    }

    public function searchAction(Request $request)
    {
        $tags = $this->container->get('repository_manager')->getRepository('Tags');

        $tag = $request->post('search');
        $result = $tags->getTagSearch($tag);
        
        include VIEW_DIR . 'Search' . DS . 'Show.php';
    }
    
}