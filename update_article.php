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
    if (($_SESSION['id'] ?? null) == $blogger_data[0]['id']) { // yazar gerçekten blogu yazan kişi mi? eğer id'si yoksa null döner bu da zaten sağlanmaz

        foreach ($blog_datas as $blog_data) 
        {
            include_once __DIR__."/view/ckeditor_update.php";
        }
    }
    else {
        http_response_code(403);
        echo "<strong style=\"color:red\">Blog sahibi değilsiniz, o yüzden blog'u düzenleyemezsiniz!  </strong><br><br>";
        echo "<img src=\"view/images/rock-bald-head.gif\">";
    }
}

?>
</div>
</div>

