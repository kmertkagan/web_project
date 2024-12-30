<?PHP
// write in php.ini "extension=php_gd.dll"

$image = @imagecreatetruecolor(120, 30) or die("hata oluştu");
// arkaplan rengi oluşturuyoruz
$background = imagecolorallocate($image, 0, 0, 0);
imagefill($image, 0, 0, $background);
$linecolor = imagecolorallocate($image, 150, 87, 122);
$textcolor = imagecolorallocate($image, 255, 255, 255);

// rast gele çizgiler oluşturuyoruz
for ($i = 0; $i < 6; $i++) {
    imagesetthickness($image, rand(1, 3));
    imageline($image, 0, rand(0, 30), 120, rand(0, 30), $linecolor);
}

session_start();


$nums = '';
for ($x = 15; $x <= 95; $x += 20) {
    $nums .= ($num = rand(0, 9));
    imagechar($image, rand(5, 8), $x, rand(2, 14), $num, $textcolor);
}

// sayıları session aktarıyoruz
$_SESSION['captcha'] = $nums;


// resim gösteriliyor ve sonrasında siliniyor
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>
