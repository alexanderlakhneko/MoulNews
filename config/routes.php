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
    'tags_page' => new Route('/tags/{id}', 'Tags', 'show', array('id' => '[0-9]+') ),

    'Search' => new Route('/search', 'Tags', 'search' ),
);


