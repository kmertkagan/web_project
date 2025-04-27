<?php
include_once(__DIR__."/Connection.php");


class Select extends Connection {

    public $con;

     
    // Constructor: Connection nesnesini burada başlatıyoruz.
    public function __construct() {
        $this->con = new Connection();
    }


    public function Select_Blogs($id, $title, $category, $blog, $posted_on, $clicked) {
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


        $query = "SELECT ". "$filter " ."FROM blog_posts";
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

    public function Select_Bloggers($id, $username, $name, $surname, $age, $gender) {
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
        $query = "SELECT ". "$filter " ."FROM bloggers";
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

    public function Select_Specified_Bloggers(array $check) {
        $filter = "1"; # default
        
        // check inputs and set the query
        foreach ($check as $key => $value) {
            if (empty($value)) {
                unset($check[$key]);
            }
        }
        if (count($check) > 0) {
            $filter2 = []; # for use join
            foreach ($check as $key => $value) {
                $value = mysqli_escape_string($this->con->connect(),$value); # for prevent sqli
                $filter2[] = "$key='$value'"; // basically adding a new element to arraylist, https://www.php.net/manual/en/language.types.array.php look at the example 10 (f*ck the php)
                            
            }
            $filter = join(" AND ", $filter2);
        } 

        // execute query and return the $rows  
        $query = "SELECT * FROM bloggers WHERE ".$filter;
        $result = mysqli_query($this->con->connect(), $query);
        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()){ 
                $rows[] = $row; 
            }
            if (count($rows) > 0) {
                return $rows;
            } else { 
                return null;
            }
        }
        else{
            return null;
        }
    }

    public function Select_Specified_Blogs(array $check) {
        $filter = "1"; # default
        
        foreach ($check as $key => $value) {
            if (empty($value)) {
                unset($check[$key]);
            }
        }
        if (count($check) > 0) {
            $filter2 = []; # for use join
            foreach ($check as $key => $value) {
                $value = mysqli_escape_string($this->con->connect(),$value); # for prevent sqli
                $filter2[] = "$key='$value'"; // basically adding a new element to arraylist, https://www.php.net/manual/en/language.types.array.php look at the example 10 (f*ck the php)          
            }
            $filter = join(" AND ", $filter2);
        }       
        $query = "SELECT * FROM blog_posts WHERE ".$filter;
        $result = mysqli_query($this->con->connect(), $query);
        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()){ 
                $rows[] = $row; 
            }
            $this->con->connect()->close();
            if (count($rows) > 0) {
                return $rows;
            } else { return null;}
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