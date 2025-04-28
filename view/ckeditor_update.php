<script>

	$(document).ready(function(){
		$("#cate").mousemove(function(){
			$("#uyari2").show();
		});
		$("#cate").mouseleave(function(){
			$("#uyari2").hide();
		});
		$("#title_warn").mousemove(function(){
			$("#uyari3").show();
		});
		$("#title_warn").mouseleave(function(){
			$("#uyari3").hide();
		});
	});
</script>
<script>
$(document).ready(function() {
    $("#update_article").on("submit", function(e) {
        e.preventDefault(); // Formun kendi submitini engelle

        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            dataType: "json", // JSON olarak otomatik çözümlesin
            success: function(response) {
                if (response.success) {
                    $("#message").css("color", "#04ff00").text(response.message);
                    $("#update_article")[0].reset();
                    // yönlendirme
                    setTimeout(() => {
                        window.location.href = "index";
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

<script src="./view/js/tinymce/tinymce.min.js"></script>
<script src="./view/js/tinymce/init.js"></script>
<form method="POST" action="controller/update_article_action.php" id="update_article">
	<label id="title_warn" type="text">Blog Başlığı*
	<p id="uyari3" hidden>Zorunlu<p>
	<input class="contact-input" type="text" name="title" required value="<?php echo $blog_data["title"]?>"><br><br>
	<textarea name="blog" id="blog" class="tinymce"><?php echo $blog_data["blog"]?></textarea><br>
	<label id="cate" type="text">Blog Konusu*
	<p id="uyari2" hidden>Zorunlu<p>
	<select name="category" id="category" class="contact-input" value="<?php echo $blog_data["category"]?>">
    	<option value="Bilgisayar Bilimleri">Bilgisayar Bilimleri</option>
    	<option value="Matematik">Matematik</option>
    	<option value="Müzik">Müzik</option>
		<option value="Finans">Finans</option>
		<option value="Yemek">Yemek</option>
		<option value="Siyaset">Siyaset</option>		
		<option value="Film-Dizi">Film-Dizi</option>	
		<option value="Spor">Spor</option>
		<option value="Moda">Moda</option>	
    	<option value="Başka Bir Konu">Başka Bir Konu</option>
  	</select><br><br><br>
    <input name="id" hidden value="<?php echo htmlspecialchars($_GET["id"])?>">
	<input class="button-link" type="submit" value="Gönder">
    
</form>



<div id="message">

</div>