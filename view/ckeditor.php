<script>

	$(document).ready(function(){
		$("#uname").mousemove(function(){
			$("#uyari1").show();
		});
		$("#uname").mouseleave(function(){
			$("#uyari1").hide();
		});
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

<script src="./view/js/tinymce/tinymce.min.js"></script>
<script src="./view/js/tinymce/init.js"></script>
<form method="POST">
	<label id="title_warn" type="text">Blog Başlığı*
	<p id="uyari3" hidden>Zorunlu<p>
	<input class="contact-input" type="text" name="title" required><br><br>
	<textarea name="blog" id="blog" class="tinymce"></textarea><br>
	<label id="cate" type="text">Blog Konusu*
	<p id="uyari2" hidden>Zorunlu<p>
	<select name="category" id="category" class="contact-input">
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
	<img src="controller/captcha.php" id="capt" onclick="return false;">
    <input type=button style="background: #2c3847;color: #ffffff" onClick=reload(); value='Tekrar Yükle'><br><br>
	<input type="text" id="cap_value" name="cap_value" required><br><br>
	<input class="button-link" type="submit" value="Gönder">
</form>


<script type="text/javascript">
    function reload() {
        img = document.getElementById("capt");
        img.src = "controller/captcha.php"
    }
</script>