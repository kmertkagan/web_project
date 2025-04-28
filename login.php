<!-- Head -->
<?php include "view/head.html" ?>
<!-- End --> 

<!-- Header -->
<?php include "view/header.php" ?>
<!-- End -->

<div class="logo-wrapper">

    <?php
    if (isset($_SESSION["username"])){
        echo $_SESSION["username"]. ", giriş yaptınız zaten?";
    }
    else {
        include_once __DIR__."/view/login_view.php";
    }
    ?>

</div>
