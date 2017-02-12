<?php
namespace Controller;


use Library\Request;
use Library\Controller;
use Library\Pagination;
use Model\News;

class CommentsController extends Controller
{
    public function indexAction(Request $request)
    {
        $comments = $this->container->get('repository_manager')->getRepository('comment');
        
        $id = $request->get('id');

        $total = $comments->getCommentCnt($id);
        
        $page = $request->get('st');
        if ($page === NULL){
            $page = 1;
        }

        $data = $comments->getCommentsByUser($id, $page);

//        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total['cnt'], $page, News::SHOW_BY_DEFAULT, 'page-');

        return $this->render('index.php', ['data' => $data, 'pagination' => $pagination]);
        
    }
}