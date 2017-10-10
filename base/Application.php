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
        require_once (__DIR__ . '/Router.php');
        require_once (__DIR__ . '/Render.php');
        require_once (__DIR__ . '/Controller.php');
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

    private static function getRoute(){
        return $_SERVER['REQUEST_URI'];
    }

}