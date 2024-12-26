<div class="container">
  <div class="page-wrapper">
    <div class="primary-content">
      <div class="panel">
        <div class="title">
          <h1>En Çok Okunan</h1>
          <?php 
          include_once __DIR__."/../model/Select.php";

          $q = new Select();

          $most_clicked_posts = $q->Select_Order_By_Blogs(["clicked"=>"DESC"]);
          $most_clicked = $most_clicked_posts[0];
          echo "<h2>".$most_clicked["title"]."</h2>";
          echo "</div>";
          echo "<img src='./view/images/icons8-click-50.png' width='22' height='22'>".$most_clicked["clicked"];
          echo "<div class='content'>";
          echo "<p>".substr($most_clicked["blog"], 0, 250)."..."."</p>";
          echo "</div>";          
          echo "<div class='button-link'>"."<a href='get_article.php?id=".$most_clicked["id"]."'>Oku</a></div>"
          ?>
      </div>
    </div>
    <div class="sidebar">
    </div>
  </div>
  <div class="panel-wrapper">
    <div class="panel marRight30">
    </div>
    <div class="panel marRight30">
    </div>
  </div>
  <!--- panel wrapper div end -->
</div>