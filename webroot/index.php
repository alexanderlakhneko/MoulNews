<?php

use Library\Session;
use Library\Config;
use Library\Request;
use Library\DbConnection;
use Library\RepositoryManager;
use Library\Router;


ini_set('display_errors',1);
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS . '..' . DS );
define('SRC_DIR', ROOT . 'src' . DS);
define('VIEW_DIR', SRC_DIR . 'View' . DS);
define('LIB_DIR', SRC_DIR . 'Library' . DS);
define('CONFIG_DIR', ROOT . 'config' . DS);
define('VENDOR_DIR', ROOT . 'vendor' . DS);

require (VENDOR_DIR . 'autoload.php');

try{
    
    Session::start();
    $config = new Config();

    $request = new Request();

    $pdo = (new DbConnection($config))->getPDO();
    $repositoryManager = (new RepositoryManager())->setPDO($pdo);

    $router = new Router(CONFIG_DIR . 'routes.php');
    
    $router->match($request);
    $route = $router->getCurrentRoute();

    $controller = 'Controller\\' . ucfirst($route->controller) . 'Controller';
    $action = $route->action . 'Action';

    $controller = new $controller();
    
    if (!method_exists($controller, $action)) {
        throw new \Exception('Page not found', 404);
    }

    $content = $controller->$action($request);

} catch (\Exception $e) {
    $controller = new ErrorController();
    $controller->setContainer($container);
    $content = $controller->errorAction($request, $e);
}

echo $content;

