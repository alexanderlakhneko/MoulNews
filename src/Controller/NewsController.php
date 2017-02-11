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
            // $result = '';
            $comment = $data['comments'];

            function array_rec($comment, $level2 = 0){
                static $result;
                $level2 = 0;
                $result .= '<div class="empty_placeholder"></div>';
                foreach ( $comment as $item => $value) {
                    if ($level2 == 1) {
                        $result .= "<div class='panel panel2 panel-info' style='margin-left: 80px;'>";
                    } else {
                        $result .= "<div class='panel panel2 panel-info'>";
                    }
                    $result .= "<div class='panel-heading'>";
                    $result .= "<h3 class='panel-title'>";
                    $result .= "Name: <a>{$value['name']}</a>";
                    $result .= " Time: {$value['date_time']} </h3> </div>";
                    $result .= "<div class='panel-body'>{$value['comment']}</div>";
                    $result .= "<div class='panel-footer' style='padding: 4px 15px; overflow: hidden;'>";
                    if (Session::get('user') && $level2 == 0) {
                        $result .= "<div style='float: left'>";
                        $result .= "<a id='answer'>Ответить</a></div>";
                    }
                    $result .= "<div style='float: right'>";
                    $result .= "<input type='hidden' id='id_comment' value='{$value['id_comment']}'>";
                    $result .= "<input type='hidden' id='id_user' value='{$value['id_user']}'>";
                    $result .= "<button type='button' id='like' class='btn btn-default btn-xs'>
                        Like:<span class='glyphicon glyphicon-thumbs-up'
                             aria-hidden='true'>{$value['cnt_like']}</span>
                     </button>";
                    $result .= "<button type='button' id='dislike' class='btn btn-default btn-xs'>
                        Like:<span class='glyphicon glyphicon-thumbs-down'
                             aria-hidden='true'>{$value['cnt_dislike']}</span>
                     </button>";
                    $result .= "</div></div></div>";
                    if (isset($value['childs'])) {

//                $result.="</div>";
                        $level2++;

                        array_rec($value['childs'], $level2);

                        $level2 = 0;
                    } else {
//                $result.= "</div>";
                    }
                }
                return $result;
            }

            return array_rec($comment);

        }
        
    }
}