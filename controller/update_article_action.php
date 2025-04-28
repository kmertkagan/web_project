<?php
session_start();
include __DIR__."/../model/Update.php";
include __DIR__."/../model/Select.php";


header("Content-Type: application/json;charset=UTF-8");
# do they really exist? 
if(isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["blog"]) && isset($_POST["category"]) && strlen($_POST["title"]) > 0 && strlen($_POST["blog"]) > 0 && strlen($_POST["category"]) > 0){
    $blogs = new Select();
    $blog = $blogs->Select_Specified_Blogs(["id" => $_POST["id"]]);
    if ($_SESSION["id"] == $blog[0]["bloggerId"]){ // aynı id'ler mi_
        $update_obj = new Update();
        if ($update_obj->Update_Blog($_POST["id"], $_POST["title"], $_POST["category"], $_POST["blog"])){
            http_response_code(200);
            echo(json_encode(["success"=>true, "message"=> "Islem basarili."]));
        }
        else {
            http_response_code(400);
            echo(json_encode(["success"=>false, "message"=> "Bir hata olustu. Lutfen iletisime geciniz."]));
        }
    }
    else {
        http_response_code(403);
        echo(json_encode(["success"=>false, "message"=> "Yasak islem."]));
    }
}
else {
    http_response_code(400);
    echo(json_encode(["success"=>false, "message"=> "Lutfen degerleri tam ve uygun sekilde giriniz."]));
}

?>