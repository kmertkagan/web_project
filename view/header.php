<?php
session_start();
setcookie("username", "*",time()+60*60*24*15, "/", "", true, true);
?>

<div class="menu-wrapper">
  <div class="menu">
    <ul>      
      <li><a href="index.php" class="active">Ana Sayfa</a></li>
      <li><a href="articles.php">Blog</a></li>
      <li><a href="about.php">Rapor</a></li>
      <li><a href="contact.php">İletişim</a></li>
      <li><a href="login.php">Giriş Yap</a></li>
      <li><a href="register.php">Kayıt Ol</a></li>
    </ul>
  </div>
</div>

