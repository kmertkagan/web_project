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
            <?php
                if (isset($_SERVER["HTTP_REFERER"])){
                    echo "<a href=". $_SERVER["HTTP_REFERER"].">Geri Gel</a><br><br>";
                }
            ?>
        </div>
<?php


include_once "./model/Select.php";
include_once "./model/Update.php";

$get_id = $_GET["id"];
$update_click = new Update();

$blogger = new Select();
$blog = new Select();
if ($blog_datas = $blog->Select_Specified_Blogs(["id"=>$get_id])){
    $update_click->Update_Blog_Clicked( $get_id );
    $blogger_data = $blogger->Select_Specified_Bloggers(["id"=>$blog_datas[0]["bloggerId"]]);
    // print_r($blogger_data[0]);
    foreach ($blog_datas as $blog_data) 
    {
        
        echo "<h2>Yazar: "."<strong class='blogger'>".htmlspecialchars($blogger_data[0]["username"])."</strong>"."</h2>";
        echo "<h2>Yazım Tarihi: "."<strong class='blogger'>".$blog_data["posted_on"]."</strong>"."</h2><br><div class='show_article'>";
        echo "<h1 class=\"title\">".htmlspecialchars($blog_data["title"])."</h1><br>";
        echo $blog_data["blog"]."</div>";
    }
}

?>
</div>
</div>