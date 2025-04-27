<?php
session_start();
include __DIR__."/../model/Select.php";

$username = $_POST["username"];
$password = $_POST["password"];
$user_check = new Select();

header("Content-Type: application/json;charset=UTF-8");
if (isset($username) && isset($password) && strlen($password) > 0){
    $hashed_password = hash("sha256", $password);
    if ($rows = $user_check->Select_Specified_Bloggers(["username" => $username, "password" => $hashed_password])){
        /*
        $rows = (
        [0] => Array
            (
                [id] => 31
                [username] => selam123
                [password] => ff7a1eb9ffd6349a0e8d4d2f9efd885317cfdaf31ec35384940ab3ebdfa978d1
                [name] => selam
                [surname] => selam
                [age] => 44
                [gender] => 0
            )   
        )
        şeklinde bir dönüşü olur. örnek olarak bu kullanıcının id'sine erişmek istersek $rows[0]["id"] yazmalıyız çünkü
        bu metod birden fazla kullanıcının da ihtiyaç durumda veritabanından çekilmesine olanak tanır.
        
        Mesela, yaşı 44 olan 2 kullanıcı varsa $rows[0]["id"] ve $rows[1]["id"] şeklinde ikisinin de id'sine erişmemiz mümkün.
        */
        http_response_code(200);
        /* Yeni session türetme ve session'a değerleri yükleme */
        session_regenerate_id();
        $_SESSION["id"] = $rows[0]["id"];
        $_SESSION["username"] = $rows[0]["username"];
        $_SESSION["name"] = $rows[0]["name"];
        $_SESSION["surname"] = $rows[0]["surname"];
        $_SESSION["age"] = $rows[0]["age"];
        $_SESSION["gender"] = $rows[0]["gender"];
        echo(json_encode(["success" => true, "message" => "Giris basarili."]));
    }
    else {
        http_response_code(404);
        echo(json_encode(["success" => false, "message" => "Parola veya kullanici adi yanlis."]));
    }
}
else {
    http_response_code(400);
    echo(json_encode(["success" => false, "message" => "Lutfen degerleri duzgun giriniz."]));
}

?>