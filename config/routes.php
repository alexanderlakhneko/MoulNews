<?php

use Library\Route;

return  array(
    // Главная страница
    'default' => new Route('/', 'Site', 'index'),
    'index' => new Route('/index.php', 'Site', 'index'),
    //Категории новостей
    'category_page' => new Route('/category/{id}/page-{st}', 'Catalog', 'category', array('id' => '[0-9]+', 'st' => '[0-9]+')),
    'category' => new Route('/category/{id}', 'Catalog', 'category', array('id' => '[0-9]+')),
    //Страница новости
    'news_page' => new Route('/news/{id}', 'News', 'show', array('id' => '[0-9]+') ),
    //Страница новости по тегам
    'tags_page' => new Route('/tags/{id}/page-{st}', 'Tags', 'show', array('id' => '[0-9]+', 'st' => '[0-9]+') ),

    'Search' => new Route('/search', 'Tags', 'search' ),
    'SearchNews' => new Route('/searchNews', 'Search', 'searchNews' ),
    // Пользователь:
    'user_reg' => new Route('/user/register', 'User', 'register'),
    'user_login' => new Route('/user/login', 'User', 'login'),
    'user_logout' => new Route('/user/logout', 'User', 'logout'),
    'cabinet' => new Route('/cabinet', 'Cabinet', 'index'),

    'licks' => new Route('/ajax/list', 'News', 'listlickes'),
    // Админпанель:
    'admin' => new Route('/admin/index', 'Admin', 'index'),
    'default_admin' => new Route('/admin', 'Admin', 'index'),
    
);


