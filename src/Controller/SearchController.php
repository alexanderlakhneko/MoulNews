<?php

namespace Controller;

use Library\Controller;
use Library\Request;
use Library\Pagination;


class SearchController extends Controller
{
    public function searchNewsAction(Request $request)
    {
        $tags = $this->container->get('repository_manager')->getRepository('Tags');
        $news = $this->container->get('repository_manager')->getRepository('News');

        $tag = $tags->getTagsList();
        $category = $news->getCategoriesList();
        $result = array();
        
        if($request->isPost()){
            $post = array();
            
            $post['date_1'] = $request->post('date_1');
            $post['date_2'] = $request->post('date_2');
            $post['tags'] = $request->post('tags');
            $post['category'] = $request->post('category');


            
            if($post['date_1'] != 0 && $post['date_2'] != 0 && $post['date_1'] > $post['date_2']){
                $result['error'] = 'Не верно укзан промежуток времени';
            } else{
                $result = $news->getNewsByFilter($post);
            }
            

        }

        return $this->render('Search.php', ['tags' => $tag, 'categories' => $category, 'result' => $result]);
        
    }
}