<?php

/**
 * Created by PhpStorm.
 * User: Neonion
 * Date: 10.10.17
 * Time: 19:01
 */
class Controller extends Application
{
    public $layout = "main";
    public static $view_folder;

    public function construct($router)
    {
        if (!isset($router->routing['function'])) {
            $router->routing['function'] = 'index';
        }

        $class = $router->routing['class'];
        $function = $router->routing['function'];
        
        self::$view_folder = $class;
        $controller = new $class($class);
        $controller->$function();
    }

    public function render($view, $params = null)
    {
        $view_folder = self::$view_folder;
        $render = new Render($this->layout);
        $render->render($view, $params, $view_folder);
    }

}