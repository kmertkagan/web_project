<!-- Head -->
<?php include "view/head.html" ?>
<!-- End -->
<body>    

<!-- Header -->
<?php include "view/header.php" ?>
<!-- End -->

<script src="view/js/tinymce/tinymce.min.js"></script>
<script src="view/js/tinymce/init.js"></script>


<div class="logo-wrapper">
<?php
if (isset($_SESSION["username"])){
    echo $_SESSION["username"]. ", hesabınız zaten var?";
}
else {
    include_once __DIR__."/view/register_view.php";
}   
?>
</div>

