<?php
session_start();
include __DIR__."/../model/Bloggers.php";
include __DIR__."/../model/Select.php";

header("Content-Type: application/json;charset=UTF-8");
# are they really exist? 
if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confirm_password"]) && isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["age"]) && isset($_POST["gender"])){

    if(($_POST["password"] == $_POST["confirm_password"])){
        $check_user = new Select();
        
        if ($check_user->Select_Specified_Bloggers(["username" => $_POST["username"]]))
        {
            # eğer kullanıcı mevcutsa
            http_response_code(400);
            echo(json_encode(["success"=>false, "message"=> "Kullanici adi sistemde mevcut. Lutfen baska bir kullanci adiyla kayit olunuz."]));
        }
        else {
            $username = $_POST["username"];
            $password = hash("sha256",$_POST["password"]);
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $age = $_POST["age"];
            $gender = $_POST["gender"];
            
            $save_user = new Bloggers();
            if ($save_user->Insert_BloggerUser($username, $password, $name, $surname, $age, $gender)){
                http_response_code(200);
                echo(json_encode(["success"=>true, "message"=>"Basariyla kayit oldunuz. Giris yapabilirsiniz."]));
            }
            else{
                http_response_code(400);
                echo(json_encode(["success"=>false, "message"=> "Bir hata olustu. Lutfen iletisime geciniz."]));
            }

        }
    }
    else {
        http_response_code(400);
        echo(json_encode(["success"=>false, "message"=> "Parolalar uyusmuyor."]));
        
    }

}
else {
    http_response_code(400);
    echo(json_encode(["success"=>false, "message"=> "Lutfen degerleri tam ve uygun sekilde giriniz."]));
}

?>