<?php

namespace Library;

abstract class Controller
{
    protected $container;

    protected static $layout = 'default_layout.php';
    
    protected function render($view, array $args = array())
    {
        extract($args);
        $classname = str_replace(['Controller', '\\'], ['', '', DS], get_class($this));

        $classname = trim($classname, DS);

        $file = VIEW_DIR . $classname . DS . $view;
        if (!file_exists($file)) {
            throw new \Exception("Template {$file} not found");
        }
        ob_start();
        require VIEW_DIR . $classname . DS . $view;
        $content = ob_get_clean();

        $product = $this->container->get('repository_manager')->getRepository('Product');
        $products = $product->getProducts();
        $Admin = $this->container->get('repository_manager')->getRepository('Admin');
        $color = $Admin->admin_color();

        $comments = $this->container->get('repository_manager')->getRepository('comment');
        $products = $product->getProducts();

        $menu = $this->container->get('repository_manager')->getRepository('Menu');
        $Menus = $menu->getMenuList();
        
        $data['commentator']=$comments->top_commentators(5);
        $data['themes']=$comments->getThemes(3);
        
        ob_start();
        require VIEW_DIR . self::$layout;
        
        return ob_get_clean();
    }

    public function setContainer(Container $container)
    {
        $this->container = $container;

        return $this;
    }
}