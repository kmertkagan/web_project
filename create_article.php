<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!-- Head -->
<?php include "view/head.html" ?>
<!-- End -->
<body>    

<!-- Header -->
<?php include "view/header.php" ?>
<!-- End -->

<?php

include "./model/Insert.php";


if (isset($_POST["title"]) && isset($_POST["category"]) && isset($_POST["blog"]) && isset($_POST["username"]))
{ 
    $title = $_POST["title"];
    $category = $_POST["category"];
    $blog = $_POST["blog"];
    $username = $_POST["username"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];

    $q1 = new Insert();
    $q2 = new Insert();

    date_default_timezone_set('Europe/Istanbul');
    $date = date("Y-m-d H:i");
    if ($q1->Insert_Bloggers_Table($username, $name, $surname, $age, $gender) && $q2->Insert_Blog_Posts_Table($title ,$category, $blog, $date, 0))
    {
        header("Location: ". "http://localhost/web_project/articles.php");

    }
    
}    
?>



                <div class="logo-wrapper">
    
                    <div class="leftshadow"><img src="view/images/logo-wrap-left.jpg" /></div>
                    <br><br><br>
                    <?php include "view/ckeditor.php" ?>
                    <div class="rightshadow"><img src="view/images/logo-wrap-right.jpg" /></div>
    
                </div>


