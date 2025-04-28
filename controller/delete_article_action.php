<!-- Head -->
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Blog Web Application</title>
    <link href="../view/css/styles.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./view/js/tinymce/skins/content/dark/content.min.css">
    <script src="../view/js/jquery-3.7.1.min.js"></script>
    <style> 
        input[type=submit] {
          background-color: #576679;
          border: none;
          color: white;
          padding: 16px 32px;
          text-decoration: none;
          margin: 4px 2px;
          cursor: pointer;
        }
    </style> 
</head>
<!-- End -->
<body>


<?php
session_start();
include_once __DIR__."/../model/Select.php";
include_once __DIR__."/../model/Delete.php";

$get_id = $_GET["id"];

$delete_blog = new Delete();
$blogger = new Select();
$blog = new Select();
if ($blog_datas = $blog->Select_Specified_Blogs(["id"=>$get_id])){
    $blogger_data = $blogger->Select_Specified_Bloggers(["id"=>$blog_datas[0]["bloggerId"]]);
    // print_r($blogger_data[0]);
    if (($_SESSION['id'] ?? null) == $blogger_data[0]['id'] || $_SESSION["role_id"] == 2) { // yazar gerçekten blogu yazan kişi mi ya da admin mi? eğer id'si yoksa null döner bu da zaten sağlanmaz
        
        if($delete_blog->Delete_Blog($_GET["id"])){
            if ($_SESSION["role_id"] == 2){
                echo "<br><br><h1>Blog Başarıyla Silindi.</h1>"; 
            echo "<script>
            setTimeout(() => {
                        window.location.href = \"../dashboard\";
                    }, 10000);
                    </script>"; 
            } 
            else {
                echo "<br><br><h1>Blogunuzu Başarıyla Sildiniz.</h1>"; 
            echo "<script>
            setTimeout(() => {
                        window.location.href = \"../index\";
                    }, 10000);
                    </script>"; 
            }
                       
        }

    }
    else {
        http_response_code(403);
        echo "<strong style=\"color:red\">Blog sahibi değilsiniz, o yüzden blog'u silemezsiniz!  </strong><br><br>";
        echo "<img src=\"../view/images/yasak-ersoy.gif\">";
    }
}

?>
</body>