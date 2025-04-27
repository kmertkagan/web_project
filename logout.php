<!-- Head -->
<?php include "view/head.html" ?>
<!-- End -->
<body>    
<script>
setTimeout(() => {
    window.location.href = "index";
}, 1000);
</script>
<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<h1>Başarıyla Çıkış Yaptınız...<h1>