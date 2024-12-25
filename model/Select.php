<?php
include_once(__DIR__."/Connection.php");


class Select extends Connection {

    public $con;

     
    // Constructor: Connection nesnesini burada başlatıyoruz.
    public function __construct() {
        $this->con = new Connection();
    }


    public function Select_Blogs($id, $title, $category, $blog, $posted_on, $clicked, $limit) {
        $filter = "*"; # default

        $check = [$id, $title, $category, $blog, $posted_on, $clicked];
        foreach ($check as $key=>$value) {            
            if (empty($value)) {
                unset($check[$key]);
            }   
        }
        if (count($check) > 0) {
            $filter = join(",", $check);            
        }


        $query = "SELECT ". "$filter " ."FROM blog_posts". " LIMIT ".$limit;
        $result = mysqli_query($this->con->connect(), $query);
        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()){ # or mysqli_fetch_array($result, MYSQLI_ASSOC) or mysqli_fetch_assoc($result)
                $rows[] = $row; # burada multidimensional array yapısı var
            }
            $this->con->connect()->close();
            return $rows;
        }
        return null;
    }

    public function Select_Bloggers($id, $username, $name, $surname, $age, $gender, $limit) {
        $filter = "*"; # default

        $check = [$id, $username, $name, $surname, $age, $gender];
        foreach ($check as $key=>$value) {            
            if (empty($value)) {
                unset($check[$key]);
            }   
        }
        if (count($check) > 0) {
            $filter = join(",", $check);            
        }
        $query = "SELECT ". "$filter " ."FROM bloggers". " LIMIT ".$limit;
        $result = mysqli_query($this->con->connect(), $query);
        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()){ 
                $rows[] = $row; 
            }
            $this->con->connect()->close();
            return $rows;
        }
        return null;
    }

    public function Select_Specified_Bloggers(array $check, int $limit) {
        $filter = "1"; # default
        
        foreach ($check as $key => $value) {
            if (empty($value)) {
                unset($check[$key]);
            }
        }
        if (count($check) > 0) {
            $filter2 = []; # for use join
            foreach ($check as $key => $value) {
                $filter2[] = "$key='$value'";            
            }
            $filter = join(" AND ", $filter2);
        }       
        $query = "SELECT * FROM bloggers WHERE ".$filter." LIMIT ".$limit;

        $result = mysqli_query($this->con->connect(), $query);
        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()){ 
                $rows[] = $row; 
            }
            $this->con->connect()->close();
            return $rows;
        }
        return null;
    }

    public function Select_Specified_Blogs(array $check, int $limit) {
        $filter = "1"; # default
        
        foreach ($check as $key => $value) {
            if (empty($value)) {
                unset($check[$key]);
            }
        }
        if (count($check) > 0) {
            $filter2 = []; # for use join
            foreach ($check as $key => $value) {
                $filter2[] = "$key='$value'";            
            }
            $filter = join(" AND ", $filter2);
        }       
        $query = "SELECT * FROM blog_posts WHERE ".$filter." LIMIT ".$limit;
        $result = mysqli_query($this->con->connect(), $query);
        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()){ 
                $rows[] = $row; 
            }
            $this->con->connect()->close();
            return $rows;
        }
        else {
            return null;
        }
    }


    public function Select_Order_By_Blogs(array $check) {
        

        $query = "SELECT * FROM blog_posts ORDER BY ";

        # $check = ["id" => "ASC", "category" => "DESC"]

        # Dedicate blank or empty values and eliminate all of them
        foreach ($check as $key => $value) {
            if (empty($value)) {
                unset($check[$key]);
            }
        }
        # define a multidimensional array and loop it. eventually join all indexes with ","
        if (count($check) > 0) {
            $filter = [];
            foreach ($check as $key => $value) {
                $filter[] = "$key $value";
            }
            $filter = join(",", $filter);
        }
        
        # run query and return rows to the view 
        $query .= "$filter";
        $result = mysqli_query( $this->con->connect(), $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->con->connect()->close();
            return $rows;
        }
        return null;
    }

}

?>