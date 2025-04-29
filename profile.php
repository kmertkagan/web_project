<!-- Head -->
<?php include "view/head.html" ?>
<!-- End --> 

<!-- Header -->
<?php include "view/header.php" ?>
<!-- End -->

<div class="logo-wrapper">
<div class="leftshadow"><img src="view/images/logo-wrap-left.jpg" /></div>
<div class="rightshadow"><img src="view/images/logo-wrap-right.jpg" /></div>
<?php

include __DIR__."/model/Select.php";
include __DIR__."/model/Update.php";

if (isset($_SESSION["id"])){
    $blogs = new Select();
    echo "<br><br><a onclick=\"return confirm('Silmek istediğinize emin misiniz?')\" href=\"controller/delete_user_action.php?id=".$_SESSION["id"]."\""." style=\"color:red\">Hesabı Sil</a><br><br>";
    echo "<h1>Yazdıklarım:</h1><br><br><br><br>";
    if ($specifed_blogs = $blogs->Select_Specified_Blogs(["bloggerId" => $_SESSION["id"]])){
        foreach ($specifed_blogs as $each_blog){
            echo "Yazar: "."<strong class='blogger'>".htmlspecialchars($_SESSION["username"])."</strong>";
            echo "<a class='blog' href='get_article?id=".htmlspecialchars(strval($each_blog["id"]))."'>"."<h3>".htmlspecialchars($each_blog["title"]). "</h3></a>";
            echo "<br>";
            echo "Kategori: ".htmlspecialchars($each_blog["category"])."<p>".$each_blog["posted_on"]."</p>";
            echo "<img src='./view/images/icons8-click-50.png' width='30' height='30'> ".$each_blog["clicked"]."<br>";
            echo "<a href=\"update_article?id=".htmlspecialchars($each_blog["id"])."\"" ." style=\"color:#04ff00\">Düzenle</p> <a onclick=\"return confirm('Silmek istediğinize emin misiniz?')\" href=\"controller/delete_article_action.php?id=".htmlspecialchars($each_blog["id"])."\""." style=\"color:red\">Sil</a>";
            echo "<hr>";

        }
    }
}
else {
    http_response_code(403);
    echo "<strong style=\"color:red\">Giriş Yapmalısınız!</strong><br><br>";
    echo "<img src=\"view/images/yasak-ersoy.gif\">";
}
?>
</div>