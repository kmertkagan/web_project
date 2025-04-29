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

$delete_blogger = new Delete();
$blogger = new Select();

if ($bloggers = $blogger->Select_Specified_Bloggers(["id"=>$get_id])){
    // print_r($blogger_data[0]);
    if (( ($_SESSION['id'] ?? null) == $bloggers[0]['id'] || ($_SESSION["role_id"] ?? null ) == 2))  { // aksiyon gerçekten silmeye çalışan kişi mi ya da admin mi ?
        if($delete_blogger->Delete_Blogger($_GET["id"])){
            
            if ($_SESSION["role_id"] == 2) {
                echo "<br><br><h1>Kullanıcı Başarıyla Silindi.</h1>";
                echo "<script>
                setTimeout(() => {
                    window.location.href = \"../dashboard\";
                    }, 1000);
                    </script>";
            } else {
                $_SESSION = array();
                session_destroy();
                session_regenerate_id();
                echo "<br><br><h1>Hesabını Başarıyla Sildin.</h1>";
                echo "<script>
                setTimeout(() => {
                    window.location.href = \"../index\";
                    }, 1000);
                    </script>";            
                    }
        }

    }
    else {
        http_response_code(403);
        echo "<strong style=\"color:red\">Bu hesaba otentike değilsin. O yüzden bu hesabı silemezsin.</strong><br><br>";
        echo "<img src=\"../view/images/yasak-ersoy.gif\">";
    }
}

?>
</body>