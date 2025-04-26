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

if (isset($_SESSION["username"])) {
    
    echo "<div class=\"logo-wrapper\">";
    echo "<div class=\"leftshadow\"><img src=\"view/images/logo-wrap-left.jpg\" /></div>";
    echo "<br><br><br>";
    include "view/ckeditor.php";
    echo "<div class=\"rightshadow\"><img src=\"view/images/logo-wrap-right.jpg\" /></div>";
    echo "</div>";
    if (isset($_POST["cap_value"]) && isset($_POST["title"]) && isset($_POST["category"]) && isset($_POST["blog"]) && isset($_POST["username"]))
    { 
        $title = $_POST["title"];
        $category = $_POST["category"];
        $blog = $_POST["blog"];
        
        $bloggerId = $_SESSION["id"];
        $username = $_SESSION["username"];
        $name = $_SESSION["name"];
        $surname = $_SESSION["surname"];
        $age = $_SESSION["age"];
        $gender = $_SESSION["gender"];
        
        $q1 = new Insert();
        
        
        date_default_timezone_set('Europe/Istanbul');
        $date = date("Y-m-d H:i");
        if ($_POST["cap_value"] == $_SESSION["captcha"]){
            
            if ($q1->Insert_Blog_Posts_Table($bloggerId,$title ,$category, $blog, $date, 0))
            {   
                header("Location: ". "articles.php");            
            }
        }
        else {
            echo "<div class='logo-wrapper'>";
            echo "<strong style='color: red'>Doğrulamayı Yanlış!</strong></div>";
        }       
    }    
}
else {
    http_response_code(403);echo "<div class=\"logo-wrapper\">";
    echo "<div class=\"leftshadow\"><img src=\"view/images/logo-wrap-left.jpg\" /></div>";
    echo "<br><br><br>";
    echo "Bu işlemi yapmak için yetkiniz yok. Lütfen kayıt olup tekrar deneyin";
    echo "<div class=\"rightshadow\"><img src=\"view/images/logo-wrap-right.jpg\" /></div>";
    echo "</div>";
}
?>



