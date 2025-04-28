<?php
session_start();

include __DIR__."/../../model/Select.php";

if (isset($_SESSION["role_id"]) && $_SESSION["role_id"] == 2){
    $blog_obj = new Select();
    if ($bloggers = $blog_obj->Select_Specified_Bloggers([])){ // $check: [] -> where 1
        echo "<thead><tr>";
        echo "<th>ID</th>";
        echo "<th>Kullanıcı Adı</th>";
        echo "<th>İsim</th>";
        echo "<th>Soyisim</th>";
        echo "<th>Yaş</th>";
        echo "<th>Cinsiyet</th>";
        echo "<th>Blog Sayısı</th>";
        echo "<th>İşlem</th>";
        echo "</tr></thead><tbody>";
        
        foreach ($bloggers as $blogger){
            $blog = $blog_obj->Select_Specified_Blogs(["bloggerId" => $blogger["id"]]);

            if ($blog == null || $blog == [null] || $blog == false){
                $blog = [];
            }

            if ($blogger["gender"] == 0){
                $gender = "Kadın";
            } else{
                $gender = "Erkek";
            }
            echo "<tr><td>".htmlspecialchars($blogger["id"])."</td>";
            echo "<td>".htmlspecialchars($blogger["username"])."</td>";
            echo "<td>".htmlspecialchars($blogger["name"])."</td>";
            echo "<td>".htmlspecialchars($blogger["surname"])."</td>";
            echo "<td>".htmlspecialchars($blogger["age"])."</td>";
            echo "<td>".htmlspecialchars($gender)."</td>";
            echo "<td>".count($blog)."</td>";
            echo "<td><a onclick=\"return confirm('Silmek istediğinize emin misiniz?')\" href=\"controller/delete_user_action.php?id=".$blogger["id"]."\""." style=\"color:red\">Sil</a></td></tr>";
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