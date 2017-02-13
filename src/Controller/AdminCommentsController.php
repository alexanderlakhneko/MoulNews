<?php


namespace Controller;

use Library\Request;
use Library\Router;
use Library\Pagination;

class AdminCommentsController extends AdminBase
{

    public function deleteAction(Request $request)
        
    {

        $this->checkAdmin();
        $comments = $this->container->get('repository_manager')->getRepository('comment');
        
        $id = $request->get('id');

        $comments->deleteCommentById($id);
        Router::redirect('/admin/comments/list/page-1');
    }

    public function editAction(Request $request)
    {
        $this->checkAdmin();
        $comments = $this->container->get('repository_manager')->getRepository('comment');

        $data = array();
        if ($request->post('id_comment')) {
            $comments->change_comment($request->post('id_comment'),$request->post('comment'),$request->post('like'),$request->post('dislike'),$request->post('is_active'));
            Router::redirect('/admin/comments/list/page-1');

        } else {
            $id = $request->get('id');

            $data = $comments->admin_edit_comment($id);
        }

        return $this->render('edit.php', ['data' => $data]);

    }
    
    public function listAction(Request $request)
    {
        $this->checkAdmin();
        $comments = $this->container->get('repository_manager')->getRepository('comment');
        
        $total = $comments->cnt_comments();




        $page = $request->get('id');
        if ($page === NULL){
            $page = 1;
        }

        $data = $comments->admin_get_comments($page);

//        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, 10, 'page-');

        return $this->render('list.php', ['data' => $data, 'pagination' => $pagination]);
    }

}