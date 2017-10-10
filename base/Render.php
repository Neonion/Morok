<?php
/**
 * Created by PhpStorm.
 * User: Neonion
 * Date: 08.10.17
 * Time: 18:25
 */

class Render
{
    protected $layout;

    public function __construct($layout)
    {
        $this->setLayout($layout);

    }

    public function render($view, $params = null, $view_folder)
    {
        $path = realpath(dirname(__FILE__).'/../') . '/views/' . $view_folder . '/' . $view  . '.php';

        $content = $this->get_include_contents($path, $params);

        $layout_view = realpath(dirname(__FILE__).'/../') . '/views/layouts/'. $this->layout .'.php';
        include $layout_view;
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function get_include_contents($filename, $params) {
        if (is_file($filename)) {
            ob_start();

            foreach ($params as $key => $value)  {
                ${$key} = $value;
            }
            unset($params);

            include $filename;
            return ob_get_clean();
        }
        return false;
    }

}
