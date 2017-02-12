<?php

namespace Controller;


use Library\Controller;
use Library\Request;

class SiteController extends Controller
{
    public function indexAction(Request $request)
    {
        $News = $this->container->get('repository_manager')->getRepository('News');

        $comments = $this->container->get('repository_manager')->getRepository('comment');


        $data['commentator']=$comments->top_commentators(5);
        $data['themes']=$comments->getThemes(3);
        
        return $this->render('index.php', ['News' => $News, 'data' => $data]);
    }
}