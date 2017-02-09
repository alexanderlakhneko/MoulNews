<?php


namespace Controller;

use Library\Controller;
use Library\Request;


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
        
        // Получаем инфомрацию о новости
        $new = $news->getNewById($request->get('id'));
        
        $tag = $tags->getTag($request->get('id'));

        // Подключаем вид
        return $this->render('view.php', ['new' => $new, 'tags' => $tag]);
    }
}