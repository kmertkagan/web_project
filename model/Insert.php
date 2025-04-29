<?php

include_once(__DIR__."/Connection.php");

class Insert extends Connection {

    public $con; 

    public function __construct() {

        $this->con = new Connection();
    }

    public function Insert_Bloggers_Table($username, $password, $name, $surname, $age, $gender){

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

    public function Insert_Blog_Posts_Table($bloggerId, $title, $category, $blog, $posted_on, $clicked) {

        $query = "INSERT INTO blog_posts (bloggerId, title ,category, blog, posted_on, clicked) VALUES (?,?, ?, ?, ?, ?)"; 
        if ($this->con->connect()->execute_query($query,[$bloggerId, $title, $category, $blog, $posted_on, $clicked])){
            echo "Başariyla Kaydedildi";
            $this->con->connect()->close();
            return true;
        }
        else {
            echo "Hata Oluştu.";
            $this->con->connect()->close();
        }
    }

    public function Insert_Contacts_Table($mail, $message) {

        $query = "INSERT INTO contacts (mail, message) VALUES (?, ?)";
        if ($this->con->connect()->execute_query($query, [$mail, $message])){
            echo "Başariyla Kaydedildi";
            $this->con->connect()->close();
            return true;
        }
        else {
            echo "Hata Oluştu.";
            $this->con->connect()->close();
        }
    }



    
}

?>