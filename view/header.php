<?php
session_start();
?>

<div class="menu-wrapper">
  <div class="menu">
    <ul>
      <li><a href="index" class="active">Ana Sayfa</a></li>
      <li><a href="articles">Bloglar</a></li>
      <li><a href="about">Rapor</a></li>
      <?php
        if (isset($_SESSION["role_id"]) && $_SESSION["role_id"] == 1){
          echo "<li><a href=\"profile\">Profilim</a></li>";
          echo "<li><a href=\"contact\">İletişim</a></li>";
          echo "<li><a class=\"logout\" href=\"logout\">Çıkış Yap</a></li>"; 
        }
        else if (isset($_SESSION["role_id"]) && $_SESSION["role_id"] == 2){
          echo "<li><a href=\"profile\">Profilim</a></li>";
          echo "<li><a class=\"panel\" href=\"dashboard\">Panel</a></li>";
          echo "<li><a class=\"logout\" href=\"logout\">Çıkış Yap</a></li>";
        } 
        else {
          echo "<li><a href=\"login\">Giriş Yap</a></li>";
          echo "<li><a href=\"register\">Kayıt Ol</a></li>";
          echo "<li><a href=\"contact\">İletişim</a></li>";
        }
      ?>      
      
      
      
    </ul>
  </div>
</div>

