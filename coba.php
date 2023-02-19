<?php

include "phpqrcode/qrlib.php";

$tmp = "qrcode-img/";
if(!file_exists($tmp)){
    mkdir($tmp);
}
$text = "Nama : Jhonny Iskandar\nPekerjaan : Teknisi\n";
$name = "qrcodeJhonny.png";
$quality = "H";
$ukuran = 5;
$padding = 1;

QRCode::png($text,$tmp.$name,$quality,$ukuran,$padding);