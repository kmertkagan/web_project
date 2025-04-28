<?php
session_start();

include __DIR__."/../../model/Select.php";

if (isset($_SESSION["role_id"]) && $_SESSION["role_id"] == 2){
    $blog_obj = new Select();
    if ($blogs = $blog_obj->Select_Specified_Blogs([])){ // $check: [] -> where 1
        echo "<thead><tr>";
        echo "<th>ID</th>";
        echo "<th>Yazar</th>";
        echo "<th>Başlık</th>";
        echo "<th>Kategori</th>";
        echo "<th>Yazıldığı Tarih</th>";
        echo "<th>Tıklanma Sayısı</th>";
        echo "</tr></thead><tbody>";
        
        foreach ($blogs as $blog){
            $blogger = $blog_obj->Select_Specified_Bloggers(["id" => $blog["bloggerId"]]);
            echo "<tr><td>".$blog["id"]."</td>";
            echo "<td>".$blogger[0]["username"]."</td>";
            echo "<td>".$blog["title"]."</td>";
            echo "<td>".$blog["category"]."</td>";
            echo "<td>".$blog["posted_on"]."</td>";
            echo "<td>".$blog["clicked"]."</td>";
            echo "<td><a onclick=\"return confirm('Silmek istediğinize emin misiniz?')\" href=\"controller/delete_article_action.php?id=".$blog["id"]."\""." style=\"color:red\">Sil</a></td></tr>";
        }
        echo "</tbody>";
    }
} 
else {
    http_response_code(403);
    echo "<strong style=\"color:red\">Blog sahibi değilsiniz, o yüzden blog'u düzenleyemezsiniz!  </strong><br><br>";
    echo "<img src=\"view/images/yasak-ersoy.gif\">";
}




?>