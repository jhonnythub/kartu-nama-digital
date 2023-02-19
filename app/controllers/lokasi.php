<?php


class lokasi extends controller{

    public function index()
    {
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){
            $_POST["coordinat"] = $_POST["coordinat"];
            $_POST["ipaddr"] = $this->get_client_ip();
            $_POST["browser"] = $this->get_client_browser();
            $_POST["os"] = $_SERVER["HTTP_USER_AGENT"];

            $ip = $this->get_client_ip();
            $checkip = @json_decode(file_get_contents("https://www.geoplugin.net/json.gp?ip=". $ip));
            $lokasi = $checkip->geoplugin_countryName." - ".$checkip->geoplugin_city;
            $_SESSION["ip"] = $lokasi;

            if( $this->model('visit_model')->insertVisit($_POST) > 0 ){
                $_SESSION["lokasi"] = true;
                echo "<script>alert('berhasil');</script>"; exit;
            }else{
                echo "<script>alert('gagal');</script>"; exit;
            }
        }else{
            echo "<script>alert('Tidak ada izin'); window.location.href = '".base_url."';</script>";
        }
    }

    private function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'IP tidak dikenali';
        return $ipaddress;
    }

    private function get_client_browser()
    {
        $browser = '';
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
            $browser = 'Netscape';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
            $browser = 'Firefox';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
            $browser = 'Chrome';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
            $browser = 'Opera';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
            $browser = 'Internet Explorer';
        else
            $browser = 'Other';
        return $browser;
    }

}