<?php
/**
 * Created by PhpStorm.
 * User: Neonion
 * Date: 03.10.17
 * Time: 19:48
 */


class User extends Controller {

    public function index()
    {
        $model = "index_first";
        $form  = "index_second";

        $this->render('index', [
            "param1" => $model,
            "param2" => $form,
        ]);
    }

    public function settings()
    {
        $model = "first";
        $form  = "second";

        $this->render('settings', [
            "param1" => $model,
            "param2" => $form,
        ]);
    }

}