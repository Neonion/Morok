<?php

/**
 * Created by PhpStorm.
 * User: Neonion
 * Date: 10.10.17
 * Time: 21:07
 */
class UserModel extends Model
{
    public function __construct()
    {

    }
    
    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $result = $this->execute($query);

        return $result;
    }

    public function createUser()
    {
        $query = "INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES (NULL, 'Four', 'poiu', '4')";
        $result = $this->execute($query);

        return $result;
    }

    public function updateUser()
    {
        $query = "UPDATE `users` SET `username` = 'Five', `password` = 'sdfsdfsd', `status` = '5' WHERE `users`.`id` = 5";
        $result = $this->execute($query);

        return $result;
    }

    public function deleteUser()
    {
        $query = "DELETE FROM `users` WHERE id = 3";
        $result = $this->execute($query);

        return $result;
    }
}