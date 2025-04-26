<?php

include_once(__DIR__."/Connection.php");
class Bloggers extends Connection{

    public $con;


    public function __construct(){
        $this->con = new Connection();
    }

    public function Insert_BloggerUser($username, $password, $name, $surname, $age, $gender){

        $query = "INSERT INTO bloggers (username, password, name, surname, age, gender) VALUES (?, ?, ?, ?, ?, ?)";

        if ($this->con->connect()->execute_query($query, [$username, $password, $name, $surname, $age, $gender])){
            $this->con->connect()->close();
            return true;
        }
        else {
            $this->con->connect()->close();
            return false;
        }
    }


}





?>