<?php



class Connection { 

    public $host = "127.0.0.1";
    public $user = "root";
    public $password = "";
    public $database = "blog_app";

    public function __construct($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        self::connect();
        
    }
    public function connect() {
        $connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if (!$connection) {
            throw new Exception("Bir Hata Oluştu". mysqli_connect_error());
        }
        else{
            return $connection;
        }
    }

}

?>