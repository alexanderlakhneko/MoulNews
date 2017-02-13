<?php

namespace Controller;


use Library\Request;

class AdminColorController extends AdminBase
{
    public function indexAction(Request $request)
    {
        $this->checkAdmin();
        
        $Admin = $this->container->get('repository_manager')->getRepository('Admin');

        if ($request->Post('head')){
           $Admin->save_color('head',$request->Post('head'));
        }
        if ($request->Post('body')){
            $Admin->save_color('body',$request->Post('body'));
        }

        $color = $Admin->admin_color();

        return $this->render('index.php', ['color' => $color]);
    }
}