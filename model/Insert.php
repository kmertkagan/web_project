<?php

class Insert extends Connection {

    public $con = new Connection=>connection();


    public function Insert_Bloggers_Table($username, $name, $surname, $age, $gender) {
        
        $query = "INSERT INTO bloggers (username, name, surname, age, gender) VALUES ($username, $name, $surname, $age, $gender)";
        return $query;        
    }

    public function Insert_Blog_Posts_Table($category, $blog, $posted_on, $clicked) {
        
        $query = "INSERT INTO blog_posts (category, blog, posted_on, clicked) VALUES ($category, $blog, $posted_on, $clicked)";
        return $query;
    }

    public function Insert_Contacts_Table($mail, $message) {

        $query = "INSERT INTO contacts (mail, message) VALUES ($mail, $message)"
        return $query;
    }

}

?>