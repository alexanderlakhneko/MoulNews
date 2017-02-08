<?php

use Library\Route;

return  array(
    // Главная страница
    'default' => new Route('/', 'Site', 'index'),
    'index' => new Route('/index.php', 'Site', 'index'),
);


