<?php

include_once __DIR__."/Connection.php";



class Update extends Connection {

    public $con;

    public function __construct() {
        $this->con = new Connection();
    }


    public function Update_Blog_Clicked($id){

        $blog = new Select();
        if ($row = $blog->Select_Specified_Blogs(["id"=>$id])){
            $new_clicked = $row[0]["clicked"] + 1;            
            $query = "UPDATE blog_posts SET clicked = $new_clicked WHERE id=?";
            if ($this->con->connect()->execute_query($query, [$id])) {
                $this->con->connect()->close();
            }
        }
        else {
            header("HTTP/1.1 404 Not Found");
            echo "böyle bir blog yok";

        }
    }

}


?>