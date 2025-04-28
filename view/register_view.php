    
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
    <label for="password">Parola(Minimum 8 karakterli, en az 1 harf ve en az 1 sayı içermeli.)</label>
    <input type="password" name="password" id="password" class="contact-input" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"><br>
    <label for="confirm_password">Parola Doğrula</label>
    <input type="password" name="confirm_password" id="confirm_password" class="contact-input" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"><br><br><br>
    <label>Yaş</label><br><br>
    <input class="contact-input" type="number" name="age" min="18"><br>
    <label>Cinsiyet</label> <br><br>
    <input type="radio" name="gender" value="1"> Erkek 
    <input type="radio" name="gender" value="0"> Kadın <br><br>
    <input class="button-link" type="submit" value="Kayıt Ol">
</form>
<div id="message">
    
</div>