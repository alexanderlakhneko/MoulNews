<?php

namespace Controller;


use Library\Controller;
use Library\Request;

class SiteController extends Controller
{
    public function indexAction(Request $request)
    {
        $News = $this->container->get('repository_manager')->getRepository('News');
        
        return $this->render('index.php', ['News' => $News]);
    }
}