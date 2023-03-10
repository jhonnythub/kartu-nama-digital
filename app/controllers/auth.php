<?php

class auth extends controller{

    public function __construct()
    {
        if( isset($_SESSION["login"]) ){
            header("Location: ".base_url); exit;
        }
    }

    public function index(){
        $data["title"] = "Halaman Login";
        var_dump($_SESSION);

        $this->view('templates/header', $data);
        $this->view('auth/login', $data);
        $this->view('templates/footer', $data);
    }

    public function register()
    {
        $data["title"] = "Halaman Daftar";

        $this->view('templates/header', $data);
        $this->view('auth/register', $data);
        $this->view('templates/footer', $data);
    }

    public function forgot()
    {
        $data["title"] = "Halaman Recovery";

        $this->view('templates/header', $data);
        $this->view('auth/recovery', $data);
        $this->view('templates/footer', $data);
    }

    public function reset()
    {
        $data["title"] = "Halaman Reset kata Sandi";

        $this->view('templates/header', $data);
        $this->view('auth/reset', $data);
        $this->view('templates/footer', $data);
    }

    public function profile()
    {
        $data['title'] = "Halaman Foto Profile";

        $this->view('templates/header', $data);
        $this->view('home/fp', $data);
        $this->view('templates/footer', $data);
    }

    public function registerPost()
    {
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){
            $id_user = mt_rand(1111111, 9999999);
            $pass = $_POST["pass"];
            $_POST["pass"] = password_hash($pass, PASSWORD_DEFAULT);
            $_POST["id_user"] = $id_user;
            if( $this->model('auth_model')->getEmail($_POST) > 0 ){
                echo "<script>alert('email sudah terdaftar'); window.location.href = '".base_url."./auth/register';</script>"; exit;
            }
            $text = "Nama : ".$_POST["name"]."\nPekerjaan : ".$_POST["pekerjaan"]."\nTelepon : ".$_POST["telepon"]."\nAlamat : ".$_POST["lokasi"]."\nEmail : ".$_POST["email"];
            $temp = "dist/qr_code-img/"; $name = uniqid().".png"; $quality = "H"; $ukuran = 5; $padding = 1; $_POST["all"] = $name;
            if( !file_exists($temp) ){ mkdir($temp); }
            QRcode::png($text,$temp.$name,$quality,$ukuran,$padding);
            if( $this->model('auth_model')->insertNewUserIdentify($_POST) > 0 ){
                date_default_timezone_set('Asia/Jakarta'); $_POST["date"] = date("Y-m-d H:i:s");
                $_POST["username"] = str_replace(" ", ".", $_POST["name"]);
                if( $this->model('auth_model')->getUsername($_POST) > 0 ){
                    $_POST["username"] = $_POST["username"].".".$id_user;
                }
                if( $this->model('auth_model')->insertNewUser($_POST) > 0 ){
                    $this->email('send_mail')->index($_POST);
                    $_SESSION["email"] = $_POST["email"];
                    $_SESSION["register"] = true;
                    header("Location: ".base_url."/otp"); exit;
                }
            }else{
                echo "gagal";
            }
        }else{
            echo "<script>alert('Anda tidak diperbolehkan! silahkan untuk mendaftar'); window.location.href = '".base_url."/auth/register'</script>";
        }
    }

    public function loginPost()
    {
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){
            date_default_timezone_set('Asia/Jakarta'); $date = date('Y-m-d H:i:s');
            if( $row = $this->model('auth_model')->userLogin($_POST) ){
                $count = $this->model('auth_model')->countFiled($_POST);
                $plus = $count["login_filed"]+1;
                $hash = $row["password"]; $pass = $_POST["pass"];
                if( $count["login_filed"] > 3 ){
                    $awal = strtotime($count["last_login"]); $akhir = strtotime($date);
                    $tanggal = $akhir - $awal;
                    if($tanggal > 60){
                        if( password_verify($pass, $hash) ){
                            $this->model('auth_model')->updateFiled($_POST);
                            if( $row["verified"] == 0 ){
                                echo "Akun belum terverifikasi"; exit;
                            }else{
                                $_SESSION["login"] = true; $_SESSION["email"] = $_POST["username"];
                                header("Location: ".base_url); exit;
                            }
                        }else{
                            $this->model('auth_model')->loginFiled($_POST,$plus,$date);
                            echo "password salah";
                        }
                    }else{
                        echo "<script>alert('Terlalu banyak melakukan login');</script>";
                    }
                    exit;
                }
                if( password_verify($pass, $hash) ){
                    $this->model('auth_model')->updateFiled($_POST);
                    if( $row["verified"] == 0 ){
                        $_SESSION["email"] = $_POST["username"]; $_SESSION["verifikasi"] = true;
                        $data["title"] = "Halaman Verfikasi";

                        $this->view('templates/header', $data);
                        $this->view('auth/verifikasi', $data);
                        $this->view('templates/header', $data);
                        exit;
                    }else{
                        $_SESSION["login"] = true; $_SESSION["email"] = $_POST["username"];
                        header("Location: ".base_url); exit;
                    }
                }else{
                    $this->model('auth_model')->loginFiled($_POST,$plus,$date);
                    echo "Password Salah";
                }
            }else{
                echo "Username tidak dikenali";
            }
        }else{
            header("Location: ".base_url."/auth");
        }
    }

    public function postProfile()
    {
        $email = 'dominictorretto501@gmail.com';
        $namaFile = $_FILES["fp"]["name"];
        $ukuran = $_FILES["fp"]["size"];
        $tmp = $_FILES["fp"]["tmp_name"];
        $error = $_FILES["fp"]["error"];
        if( $error === 4 ){
            echo "<script>alert(); window.location.href = '".base_url."/auth/profile'</script>"; return false;
        }
        $ekstensiValid  = ["jpg","png","jpeg"];
        $extensi = explode(".",$namaFile);
        $extensi = strtolower(end($extensi));
        if( !in_array($extensi, $ekstensiValid) ){
            echo "<script>alert('yang diupload bukanlah Gambar'); window.location.href = '".base_url."/auth/profile';</script>"; return false;
        }
        if( $ukuran > 1000000 ){
            echo "<script>alert('Ukuran terlalu besar'); window.location.href = '".base_url."/auth/profile';</script>"; return false;
        }
        $tmp_server = "dist/profile-img/"; if( !file_exists($tmp_server) ){ mkdir($tmp_server); }
        $name = uniqid(); $name .= '.'; $name .= $extensi;
        move_uploaded_file($tmp, $tmp_server.$name);
        $this->model('users_model')->updateProfile($name, $email);
    }

    public function recovery(){
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){
            $otp = mt_rand(1111111,9999999);
            if( $this->model('auth_model')->getEmail($_POST) > 0 ){
                $this->model('auth_model')->otpUpdate($_POST,$otp);
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["recover"] = true;
                header("Location: ".base_url."/otp"); exit;
            }else{
                echo "<script>alert('email tidak ditemukan!'); window.location.href = '".base_url."/auth/forgot';</script>";
            }
        }
    }

}