<?php



class Connection { 

    protected $host = "127.0.0.1";
    protected $user = "";
    protected $password = "";
    protected $database = "blog_app";

    function __construct($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        
    }


}

?>