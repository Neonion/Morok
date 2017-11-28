<?php

/**
 * Created by PhpStorm.
 * User: Neonion
 * Date: 10.10.17
 * Time: 22:13
 */
class Model
{
    protected $db;

    public function construct()
    {
        $this->db = mysqli_connect('localhost', '***', '***', '***')
            or die('Error ' . mysqli_error($this->db));

    }

    protected function execute($query)
    {
        $this->construct();
        $result = mysqli_query($this->db, $query) or die ('Error' . mysqli_error($this->db));

        if (strpos($query, 'SELECT') !== false) {
            while($row = $result->fetch_array())
            {
                $rows[] = $row;
            }
            return $rows;
        } elseif (
            strpos($query, 'INSERT') !== false ||
            strpos($query, 'UPDATE') !== false ||
            strpos($query, 'DELETE')) {

            return $result;
        }
    }
}