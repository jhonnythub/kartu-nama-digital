<?php

class otp extends controller{

    public function __construct()
    {
        if( !isset($_SESSION["register"]) && !isset($_SESSION["recover"]) ){
            echo "<script>alert('tidak diizinkan!'); window.location.href = '".base_url."/auth';</script>"; exit;
        }
    }

    public function index()
    {
        $data["title"] = "Halaman Daftar";

        $this->view('templates/header', $data);
        $this->view('auth/otp', $data);
        $this->view('templates/footer', $data);
    }

    public function otp()
    {
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){
            $email = $_SESSION["email"];
            if( $this->model('auth_model')->otp($_POST,$email) > 0 ){
                if( $_SESSION["register"] ){
                    $this->model('auth_model')->otpVerified($email);
                    $_SESSION["login"] = true;
                    unset($_SESSION["register"]);
                    header("Location: ".base_url); exit;
                }else if( $_SESSION["recover"] ){
                    header("Location: ".base_url."/auth/reset"); exit;
                }
            }else{
                echo "Kode salah";
            }
        }
    }

}