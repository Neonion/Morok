<?php

/**
 * Created by PhpStorm.
 * User: Neonion
 * Date: 05.10.17
 * Time: 18:16
 */

class Router {

    public $routing = [
        "class" => '',
        "function" => '',
    ];

    public function __construct($uri)
    {
        $uri = explode('/', $uri);
        array_shift($uri);
        $uri_elements = count($uri);

        for ($i = $uri_elements; $i != 0; $i--) {
            if (!isset($uri[$i]) || empty($uri[$i])) {
                unset($uri[$i]);
            }
        }

        $this->mapper($uri);
        $this->registerClass();
    }

    protected function mapper($uri)
    {
        $uri_count = count($uri);

        if ($uri_count == 1) {
            $this->routing = [
                "class" => ucfirst($uri[0]),
            ];

        } elseif ($uri_count == 2) {
            $this->routing = [
                "class" => ucfirst($uri[0]),
                "function" => $uri[1],
            ];
        }

        return true;
    }

    public function registerClass()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    public function autoload()
    {
        $path = realpath(dirname(__FILE__).'/../') . '/controllers/' . $this->routing['class'] . '.php';

        if (require_once $path) {
            return true;
        } else {
            return false;
        }

    }

}
