<?php

include_once(__DIR__."/Connection.php");
class Delete extends Connection {

    public $con;

    public function __construct(){
        $this->con = new Connection();
    }

    public function Delete_Blogger($id){
        // cascade olarak ayarlandığından tüm blog_posts verileri silinecek.
        $query = "DELETE bloggers FROM bloggers WHERE id = ?"; 
        if ($this->con->connect()->execute_query($query, [$id])){
            return true;
        }
        else {
            return false;
        }

    }
    public function Delete_Blog($id){
        $query = "DELETE FROM blog_posts WHERE id = ?";
        if($this->con->connect()->execute_query($query, [$id])){
            return true;
        }
        else {
            return false;
        }
    }

    public function Delete_Contact($id){

    }

}

















?>