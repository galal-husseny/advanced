<?php

class connection {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "advanced";
    protected $con;
    public function connection()
    {
        try {
            $this->con = new PDO("mysql:host=$this->host;dbname=$this->database",$this->username,$this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex){
            die("PDO EXCEPTION : ". $ex->getMessage());
        }
    }

}
