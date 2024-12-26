

<!-- Head -->
<?php include "view/head.html" ?>
<!-- End -->
<body>    
<!-- Header -->
<?php include "view/header.php" ?>
<!-- End -->

<script src="./view/js/tinymce/tinymce.min.js"></script>
<script src="./view/js/tinymce/init.js"></script>

<div class="logo-wrapper">
    <div class="leftshadow"><img src="view/images/logo-wrap-left.jpg" /></div>
        <div class="logo"><br><br>
            <form method="POST">
                <label>E-Mail</label><br>
                <input class="contact-input" name="mail" id="mail" type="email" style="width: 200px;"><br><br>
                <label>Yazı</label><br>
                <textarea name="text" id="text" class="tinycme"></textarea><br><br>
                <input class="button-link" type="submit" style="width: 200px;"></input>
            </form>
            <?php
include __DIR__."/model/Insert.php";

if (isset($_POST["mail"]) && isset($_POST["text"])) {
    $text = $_POST["text"];
    $mail = $_POST["mail"];
    $insertion = new Insert();
    if ($insertion->Insert_Contacts_Table($mail, $text)){
        header("Location: ". "http://localhost/web_project/articles.php");
    }
    else {
        echo "mesaj gönderilemedi...";
    }
    

}

?>
        </div>
    </div>
</div>