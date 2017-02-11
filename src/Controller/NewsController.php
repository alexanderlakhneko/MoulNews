<?php


namespace Controller;

use Library\Controller;
use Library\Request;
use Library\Session;
use Library\Router;


/**
 * Контроллер NewsController
 */
class NewsController extends Controller
{
    /**
     * Action для страницы просмотра новости
     * @param integer $productId <p>id товара</p>
     */
    public function showAction(Request $request)
    {

        $news = $this->container->get('repository_manager')->getRepository('News');
        $tags = $this->container->get('repository_manager')->getRepository('Tags');
        $comment = $this->container->get('repository_manager')->getRepository('comment');
        
        // Получаем инфомрацию о новости
        $id = $request->get('id');
        $new = $news->getNewById($id);

        $tag = $tags->getTag($id);

        $data['comments'] = $comment->get_comments($request->get('id'));
//            if(isset($_POST['submit'])&& isset($_POST['comment']) && !empty($_POST['comment'])){
        if($request->isPost('comment')){

            $data['comments'] = $comment->add_comment(Session::get('user'),$request->get('id'),$request->post('comment'),$request->post('id_parent'));
            Router::redirect("/news/$id");
        }

        return $this->render('view.php', ['new' => $new, 'tags' => $tag, 'data' => $data]);
    }

    public function listlickesAction(Request $request){

        $comment = $this->container->get('repository_manager')->getRepository('comment');

        if ($request->post('id_comment') && $request->post('type')) {
            $id_comment = $request->post('id_comment');
            $type = $request->post('type');
            $comment->vote($id_comment, $type);
        }

        if( $request->post('comment')) {
            $id_news = $request->post('id_news');
            $id_parent = $request->post('id_parent') ? $request->post('id_parent') : 0;
            $data['comments'] = $comment->add_comment(Session::get('user'), $id_news, $request->post('comment'), $id_parent);
            return VIEW_DIR . 'News' . DIRECTORY_SEPARATOR .  'view.php';
        }


    }
}