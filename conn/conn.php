<?php

class DB
{
    public $conn;
    public function __construct()
    {
        header('Content-Type:text/html;charset=utf-8');
        $this->conn = mysqli_connect('120.79.184.17','root','root', 'wxdevelopment',3306);
        mysqli_query($this->conn,'set names utf8');
    }

    public function insertLog($msg) {
        $time = time();
        $sql = "INSERT INTO `logs` VALUES (null,'{$msg}','{$time}')";
        mysqli_query($this->conn, $sql);
    }
}