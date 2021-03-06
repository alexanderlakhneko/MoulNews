<?php

namespace Library;

class Router
{
    private $routes;
    private $currentRoute;
    
    public function __construct($file)
    {
        $this->routes = require $file;
    }
    
    public function getCurrentRoute()
    {
        return $this->currentRoute;
    }
    
    /**
     * @param $uri
     * @return bool
     */
    private function isAdminUri($uri)
    {
        return strpos($uri, '/admin') === 0;
    }
    
    public function match(Request $request)
    {
        $uri = $request->getUri();
        
        foreach ($this->routes as $route) {
            $pattern = $route->pattern;
            
            foreach ($route->params as $key => $value) {
                $pattern = str_replace('{' . $key . '}', "($value)", $pattern);
            }
            
            $pattern = '@^' . $pattern .     '$@'; 
            
            if (preg_match($pattern, $uri, $matches)) {
                $this->currentRoute = $route;
                array_shift($matches);
                $getParams = array_combine(array_keys($route->params), $matches);
                $request->mergeGet($getParams);
                
                break;
            }
        }
        
        if (!$this->currentRoute) {
            throw new \Exception('Page not found', 404);
        }
    }
    
    public static function redirect($to)
    {
        header('Location: ' . $to);
        die;
    }
}