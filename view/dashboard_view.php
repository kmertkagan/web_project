<body class="dashboard">

<script>
function get_blogs() {
  document.getElementById("myTable").innerHTML = "";
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "controller/admin_controller/get_blogs.php", true);
  xmlhttp.send();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4) {
      if (this.status == 200) {
        document.getElementById("myTable").innerHTML = this.responseText;
      } 
    }
  };
}
function get_bloggers() {
document.getElementById("myTable").innerHTML = "";
var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "controller/admin_controller/get_bloggers.php", true);
xmlhttp.send();

xmlhttp.onreadystatechange = function () {
  if (this.readyState == 4) {
    if (this.status == 200) {
      document.getElementById("myTable").innerHTML = this.responseText;
    } 
  }
};
}
</script>

<div class="panel-wrapper">
    <div class="button-link" >
      <a href="index">Ana Sayfa</a>
      <br>
    </div>
    <div class="title">
        <h1>Hoşgeldiniz, <?php echo $_SESSION["username"]?>. Admin işlemlerini aşağıdan yapabilirsiniz.</h1>
    </div>
    <div class="content">
        <table id="myTable" class="table-dark" style="width:100%">
        
        </table>
    <script src="view/js/table.js"></script> <!--it must be after the myTable-->
    <div class="adminmenu">
        <div class="adminmenu-wrapper">
            <ul>
                <li>

                    <input class="btn-class-name" type="submit" value="Kullanıcıları Gör" onclick="get_bloggers()">

                </li>
                <li>
                    <input class="btn-class-name" type="submit" value="Blogları Gör" onclick="get_blogs()">
                </li>
            </ul>
        </div>
    </div>

    </div>

</div>

</body>