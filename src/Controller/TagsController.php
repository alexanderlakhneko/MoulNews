<?php

namespace Controller;

use Library\Controller;
use Library\Request;


class TagsController extends Controller
{
    public function showAction(Request $request)
    {
//        $news = $this->container->get('repository_manager')->getRepository('News');
        $tags = $this->container->get('repository_manager')->getRepository('Tags');
        
        $tag = $tags->getNewsByTag($request->get('id'));

        // Подключаем вид
        return $this->render('tags.php', ['tags' => $tag]);
    }

    public function searchAction(Request $request)
    {
        $tags = $this->container->get('repository_manager')->getRepository('Tags');

        $tag = $request->post('search');
        $result = $tags->getTagSearch($tag);
        
        include VIEW_DIR . 'Search' . DS . 'Show.php';
    }
}