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
        $model = new UserModel();
        //$users = $model->getAllUsers();
        //$create_user = $model->createUser();
        //$update_user = $model->updateUser();
        $delete_user = $model->deleteUser();
        
        $form  = "index_second";

        $this->render('index', [
            "param1" => $model,
            "param2" => $form,
            //"users" => $users,
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