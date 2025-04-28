<?php
session_start();
?>
<!-- Head -->
<?php include "view/dashboard-head.html" ?>
<!-- End -->
<?php
if (!isset($_SESSION["role_id"]) || $_SESSION["role_id"] != 2){
    http_response_code(403);
    echo "<strong style=\"color:red\">Admin Paneline erişmeniz mümkün değil çünkü ADMİN DEĞİLSİNİZ!</strong><br><br>";
    echo "<img src=\"view/images/yasak-ersoy.gif\">";
}else{
    include_once __DIR__."/view/dashboard_view.php";
}
?>
   