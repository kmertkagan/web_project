<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Head -->
<?php include "view/head.html" ?>
<!-- End -->
<body>    

<!-- Header -->
<?php include "view/header.php" ?>
<!-- End -->


    
<script>
function showCategory(str) {
  if (str.trim() === "") {
    document.getElementById("main").style.visibility = 'visible';
    return;
  }

  var xmlhttp = new XMLHttpRequest();
  var category = document.getElementById("category").value;
  var data = "category=" + category;

  // console.log("Gönderilen veri: ", data);

  xmlhttp.open("POST", "controller/show_articles.php", true);
  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlhttp.send(data);

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4) {
      if (this.status == 200) {
        // console.log("Yanıt: ", this.responseText);
        document.getElementById("main").innerHTML = this.responseText;
      } 
    }
  };
}
</script>

<div class="logo-wrapper">
    <div class="leftshadow"><img src="view/images/logo-wrap-left.jpg" /></div>
        <div class="logo">
            <h1>Bloglar</h1>
            <hr><br>

            
            <form method="POST">
              <ul>
                <li>
                  <h4>Kategori</h4>
                  <select onchange="showCategory(this.value)" id="category" class="contact-input" style="width: 200px;">
                    <option value="All">Hepsi</option>
                    <option value="Bilgisayar+Bilimleri">Bilgisayar Bilimleri</option>
                    <option value="Matematik">Matematik</option>
                    <option value="Müzik">Müzik</option>
                    <option value="Finans">Finans</option>
                    <option value="Yemek">Yemek</option>
                    <option value="Siyaset">Siyaset</option>		
                    <option value="Film-Dizi">Film-Dizi</option>
                    <option value="Spor">Spor</option>
                    <option value="Moda">Moda</option>	
                    <option value="Başka Bir Konu">Başka Bir Konu</option>
                  </select>
                  <a class="button" href="create_article">Blog Oluştur</a>       
                </li>
              </ul>
            </form>
            <br>

            
            <div id="main">

            <?php
            include __DIR__."/controller/show_articles.php"             
            ?>
            </div>
            <br><br>
            <form method="POST">
              
            </form>
    </div>
        
    <div class="rightshadow"><img src="view/images/logo-wrap-right.jpg" /></div>
    
    
</div>

</body>
</html>