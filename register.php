<!-- Head -->
<?php include "view/head.html" ?>
<!-- End -->
<body>    

<!-- Header -->
<?php include "view/header.php" ?>
<!-- End -->

<script src="view/js/tinymce/tinymce.min.js"></script>
<script src="view/js/tinymce/init.js"></script>
<script>
$(document).ready(function() {
    $("#register").on("submit", function(e) {
        e.preventDefault(); // Formun kendi submitini engelle

        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            dataType: "json", // JSON olarak otomatik çözümlesin
            success: function(response) {
                if (response.success) {
                    $("#message").css("color", "#04ff00").text(response.message);
                    $("#register")[0].reset(); 
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
                    <form action="controller/register_action.php" method="POST" id="register">
                        <label for="username">Kullanıcı Adı</label>
                        <input type="text" name="username" id="username" class="contact-input"><br>
                        <label for="email">E-Mail</label>
                        <input type="text" name="email" id="email" class="contact-input"><br>
                        <label>İsim</label><br>
	                    <input class="contact-input" type="text" name="name"><br>
	                    <label>Soyisim</label><br>
	                    <input class="contact-input" type="text" name="surname"><br>
                        <label for="password">Parola</label>
                        <input type="password" name="password" id="password" class="contact-input"><br>
                        <label for="confirm_password">Parola Doğrula</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="contact-input"><br><br><br>
                        <label>Yaş</label><br><br>
                        <input class="contact-input" type="number" name="age" min="18"><br>
	                    <label>Cinsiyet</label> <br><br>
	                    <input type="radio" name="gender" value="1"> Erkek 
	                    <input type="radio" name="gender" value="0"> Kadın <br><br>
                        <input class="button-link" type="submit" value="Kayıt Ol">
                    </form>
                    <div id="message">

                    </div>
                </div>

            