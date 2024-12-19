<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!-- Head -->
<?php include "view/head.html" ?>
<!-- End -->
<body>    

<!-- Header -->
<?php include "view/header.php" ?>
<!-- End -->


<?php
require "./model/Insert.php"

$insert = new Insert();
if ($_POST["blog"])
    $insert->Insert_Blog_Posts_Table("");
?>

<div class="logo-wrapper">
    
    <div class="leftshadow"><img src="view/images/logo-wrap-left.jpg" /></div>
    <br><br><br><br><br>
    <?php include "view/ckeditor.php" ?>
    <div class="rightshadow"><img src="view/images/logo-wrap-right.jpg" /></div>
    
</div>



