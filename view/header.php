<?php
session_start();
?>

<div class="menu-wrapper">
  <div class="menu">
    <ul>
      <li><a href="index.php" class="active">Ana Sayfa</a></li>
      <li><a href="articles.php">Blog</a></li>
      <li><a href="about.php">Rapor</a></li>
      <?php
        if (isset($_SESSION["username"])){
          echo "<li><a href=\"user_articles.php\">Bloglarım</a></li>";
          echo "<li><a href=\"contact.php\">İletişim</a></li>";
          echo "<li><a class=\"logout\" href=\"logout.php\">Çıkış Yap</a></li>";          

        }
        else {
          echo "<li><a href=\"login.php\">Giriş Yap</a></li>";
          echo "<li><a href=\"register.php\">Kayıt Ol</a></li>";
          echo "<li><a href=\"contact.php\">İletişim</a></li>";          
        }
      ?>      
      
      
      
    </ul>
  </div>
</div>

