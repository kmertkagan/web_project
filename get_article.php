<!-- Head -->
<?php include "view/head.html" ?>
<!-- End -->
<body>    

<!-- Header -->
<?php include "view/header.php" ?>
<!-- End -->


<div class="logo-wrapper">
    <div class="leftshadow"><img src="view/images/logo-wrap-left.jpg" /></div>
        <div class="logo"><br><br>
        <div class="button-link" >
            <a href="articles.php">Geri Gel</a><br><br>
        </div>
<?php

$get_id = $_GET["id"];

include_once "./model/Select.php";
include_once "./model/Update.php";

$update_click = new Update();
$update_click->Update_Blog_Clicked( $get_id );
$blogger = new Select();
$blog = new Select();
if ($rows = $blogger->Select_Specified_Bloggers(["id"=>$get_id],1)){
    $blog_data = $blog->Select_Specified_Blogs(["id"=>$get_id], 1); 
    foreach ($rows as $row) 
    {
        
        echo "<h2>Yazar: "."<strong class='blogger'>".$row["username"]."</strong>"."</h2>";
        echo "<h2>Yazım Tarihi: "."<strong class='blogger'>".$blog_data[0]["posted_on"]."</strong>"."</h2><br>";
        echo "<h1>".$blog_data[0]["title"]."</h1><br>";
        echo $blog_data[0]["blog"];
    }
}

?>
</div>
</div>