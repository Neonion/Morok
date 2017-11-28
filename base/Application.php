<?php

/**
 * Created by PhpStorm.
 * User: Neonion
 * Date: 05.10.17
 * Time: 18:16
 */

class Application
{
    public function __construct()
    {
        spl_autoload_register(function ($class_name) {
            $folders = ['base', 'controllers', 'models'];
            foreach ($folders as $folder) {
                if (file_exists(realpath(dirname(__FILE__).'/../') . '/' . $folder . '/' . $class_name . '.php')) {
                    $path = realpath(dirname(__FILE__).'/../') . '/' . $folder . '/' . $class_name . '.php';
                }
            }
            require_once $path;
        });
    }

    public function start()
    {
        $uri = self::getRoute();
        $router = new Router($uri);
        $router->registerClass(array($this, 'autoload'));
        $controller = new Controller();
        $controller->construct($router);

        return true;
    }

    private static function getRoute()
    {
        return $_SERVER['REQUEST_URI'];
    }

}