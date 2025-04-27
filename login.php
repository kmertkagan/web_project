<!-- Head -->
<?php include "view/head.html" ?>
<!-- End -->
<body>    

<!-- Header -->
<?php include "view/header.php" ?>
<!-- End -->

<script>
function showPassword(){
    var input = document.getElementById("password");
    if (input.type === "password") {
    input.type = "text";
    } else {
    input.type = "password";
    }    
}
</script>
<script>
$(document).ready(function() {
    $("#login").on("submit", function(e) {
        e.preventDefault(); // Formun kendi submitini engelle

        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            dataType: "json", // JSON olarak otomatik çözümlesin
            success: function(response) {
                if (response.success) {
                    $("#message").css("color", "#04ff00").text(response.message);
                    $("#login")[0].reset();
                    // yönlendirme
                    setTimeout(() => {
                        window.location.href = "index.php";
                    }, 1000);
                } else {
                    $("#message").css("color", "red").text(response.message);
                }
            },
            error: function(xhr) {
                // Sunucu hata dönerse (örneğin 400 gibi)
                let response = xhr.responseJSON;
                if(response && response.message) {
                    $("#message").css("color", "red").text(response.message);
                } else {
                    $("#message").css("color", "red").text("Bilinmeyen bir hata oluştu.");
                }
            }
        });
    });
});

</script>
<div class="logo-wrapper">
    <br><br><br>
    <form method="POST" action="controller/login_action.php" id="login">
        <label>Kullanıcı Adı</label>
        <input class="contact-input" type="text" name="username" id="username">
        <label>Şifre</label>
        <input class="contact-input" type="password" name="password" id="password"><br>
        <input class="" type="checkbox" onclick="showPassword()"> Parolayı göster <br>
        <input class="button-link" type="submit" value="Giriş Yap">
    </form>
    <div id="message">

    </div>
</div>