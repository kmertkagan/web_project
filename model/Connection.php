<?php

class Connection {

    private $host;
    private $user;
    private $password;
    private $dbname;


    public function connect() {
        $this->host = "127.0.0.1";
        $this->user = "root";
        $this->password = "qazwsxedc";
        $this->dbname = "blog_app";
        
        $connect = mysqli_connect($this->host, $this->user, $this->password, $this->dbname);

        if (!$connect) {
            die("Error!". mysqli_connect_error());
        }
        else{
            return $connect;       
        }
    }

}

?>