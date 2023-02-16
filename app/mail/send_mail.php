<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

class send_mail{

    public function index($otp)
    {
        $email_pengirim = 'apoygeboy368@gmail.com'; 
        $nama_pengirim = 'Kartu Nama Digital';
        $email = $otp["email"];
        $to = [$email];
        $subjek = "Jumlah Pengunjung";
        $judul = "Kode OTP";
        $pesan = "Hallo, pengguna Kartu Nama Digital? kode OTP anda adalah :";
        $otp = $otp["id_user"];
        foreach( $to as $penerima ){
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Username = $email_pengirim; 
            $mail->Password = 'lqpkqnsdmptktiem'; 
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            
            $mail->setFrom($email_pengirim, $nama_pengirim);
            $mail->addAddress($penerima, 'Admin Kartu Nama Digital');
            $mail->isHTML(true);
            ob_start();
            include "content.php";
            $content = ob_get_contents();
            ob_end_clean();
            $mail->Subject = $subjek;
            $mail->Body = $content;
            $mail->AddEmbeddedImage('image/logo.png', 'logo_mynotescode', 'logo.png');
            $mail->send();
        }
    }
}
?>