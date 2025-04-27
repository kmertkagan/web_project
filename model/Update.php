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
    public function Update_Blogger_Data($id, $username, $name, $surname, $age, $gender) {
        $isExist = new Select();
        if ($isExist->Select_Specified_Bloggers(["username" => $username])){
            return false;
        }
        else {            
            $query = "UPDATE bloggers SET username = ?, name = ?, surname = ?, age = ?, gender = ? WHERE id = ?";
            if ($this->con->connect()->execute_query($query, [$username, $name, $surname, $age, $gender, $id])){
                return true;
            }
            else {
                return false;
            }
        }
    }

    public function Update_BloggerPassword($id, $old_password, $new_password){
        $user = new Select();

        if($user_data = $user->Select_Specified_Bloggers(["id"=>$id])){
            if ($user_data[0]["password"] == $old_password){
                $query = "UPDATE bloggers SET password = ? where id = ?";
                if ($this->con->connect()->execute_query($query, [$new_password, $id])) {  // set properly parameters in $params
                    return true;
                }
                else {
                    return false;
                }
            }
        }
        else
        {
            return false;
        } 
    }
}


?>