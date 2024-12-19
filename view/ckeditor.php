<script>

	$(document).ready(function(){
		$("#uname").mousemove(function(){
			$("#uyari").show();
		});
		$("#uname").mouseleave(function(){
			$("#uyari").hide();
		});
	});
</script>

<script src="./view/js/tinymce/tinymce.min.js"></script>
<script src="./view/js/tinymce/init.js"></script>
<form method="POST">
	<textarea name="blog" id="blog" class="tinymce"></textarea><br>
	<label id="uname">Kullancı Adı*</label><br>
	<p id="uyari" hidden>Zorunlu<p>
	<input class="contact-input" type="text" name="username" required min="12"><br>
	<label>İsim</label><br>
	<input class="contact-input" type="text" name="name"><br>
	<label>Soyisim</label><br>
	<input class="contact-input" type="text" name="surname"><br>
	<label>Yaş</label><br>
	<input class="contact-input" type="number" name="age" min="18"><br>
	<label>Cinsiyet</label> <br><br>
	<input type="radio" name="gender" value="male"> Erkek 
	<input type="radio" name="gender" value="female"> Kadın <br><br>
	<input class="button-link" type="submit" name="send" value="Gönder">
</form>