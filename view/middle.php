<div class="border-bottom"></div>
<div class="logo-wrapper">
  <div class="leftshadow"><img src="view/images/logo-wrap-left.jpg" /></div>
  <div class="logo">
    <h1>Blog Sitesi</h1>
  </div>
  <div class="rightshadow"><img src="view/images/logo-wrap-right.jpg" /></div>
</div>
<div class="clearing"></div>
<div class="banner-wrapper">
  <div class="bannerlef"><img src="view/images/banner-wrap-left.jpg" /></div>
  <div class="banner-container">
    <div class="banner">
      <div class="banner-content">
        <?php
        if(isset($_SESSION["username"])){
          echo "<h2>Hoşgeldiniz ".$_SESSION["username"]."</h2>";
          echo "<br>";
          echo "<h2>Blogları incelemek veya blog yazmak için</h2>";
          echo "<a href=\"./articles.php\">Tıklayınız</a> </div>";
        }
        ?>
    </div>
  </div>
  <div class="bannerright"><img src="view/images/banner-wrap-right.jpg"/></div>
</div>