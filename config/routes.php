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
    'comments_user' => new Route('/comments/{id}/page-{st}', 'Comments', 'index', array('id' => '[0-9]+', 'st' => '[0-9]+') ),

    'licks' => new Route('/ajax/list', 'News', 'listlickes'),
    // Админпанель:
    'admin' => new Route('/admin/index', 'Admin', 'index'),
    'default_admin' => new Route('/admin', 'Admin', 'index'),
    'admin_oolor' => new Route('/admin/color', 'AdminColor', 'index'),
    // Управление товарами:
    'admin_product' => new Route('/admin/product', 'AdminProduct', 'index'),
    'admin_product_delete' => new Route('/admin/product/delete/{id}', 'AdminProduct', 'delete', array('id' => '[0-9]+')),
    'admin_product_update' => new Route('/admin/product/update/{id}', 'AdminProduct', 'update', array('id' => '[0-9]+')),
    'admin_product_create' => new Route('/admin/product/create', 'AdminProduct', 'create'),
    // Управление тегами:
    'admin_tags' => new Route('/admin/tags', 'AdminTags', 'index'),
    'admin_tags_delete' => new Route('/admin/tags/delete/{id}', 'AdminTags', 'delete', array('id' => '[0-9]+')),
    'admin_tags_update' => new Route('/admin/tags/update/{id}', 'AdminTags', 'update', array('id' => '[0-9]+')),
    'admin_tags_create' => new Route('/admin/tags/create', 'AdminTags', 'create'),
    // Управление тегами:
    'admin_category' => new Route('/admin/category', 'AdminCategory', 'index'),
    'admin_category_delete' => new Route('/admin/category/delete/{id}', 'AdminCategory', 'delete', array('id' => '[0-9]+')),
    'admin_category_update' => new Route('/admin/category/update/{id}', 'AdminCategory', 'update', array('id' => '[0-9]+')),
    'admin_category_create' => new Route('/admin/category/create', 'AdminCategory', 'create'),
    // Управление новостями:
    'admin_news' => new Route('/admin/news', 'AdminNews', 'index'),
    'admin_news ' => new Route('/admin/news/page-{id}', 'AdminNews', 'index', array('id' => '[0-9]+')),
    'admin_news_delete' => new Route('/admin/news/delete/{id}', 'AdminNews', 'delete', array('id' => '[0-9]+')),
    'admin_news_update' => new Route('/admin/news/update/{id}', 'AdminNews', 'update', array('id' => '[0-9]+')),
    'admin_news_create' => new Route('/admin/news/create', 'AdminNews', 'create'),
    'admin_tags_del_from_news' => new Route('/tagsdel/{id}/{st}', 'AdminNews', 'tagsdel', array('id' => '[0-9]+', 'st' => '[0-9]+')),

    'admin_comments_list' => new Route('/admin/comments/list/page-{id}', 'AdminComments', 'list', array('id' => '[0-9]+')),
    'admin_comments_edit' => new Route('/admin/comments/edit/{id}', 'AdminComments', 'edit', array('id' => '[0-9]+')),
    'admin_comments_del' => new Route('/admin/comments/delete/{id}', 'AdminComments', 'delete', array('id' => '[0-9]+')),


);


