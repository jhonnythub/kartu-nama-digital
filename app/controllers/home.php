<?php

class home extends controller{

    public function __construct()
    {
        if( !isset($_SESSION["login"]) )
        {
            header("Location: ".base_url."/auth"); exit;
        }
    }

    public function index()
    {
        $data["title"] = "Kartu Nama Digital";
        $email = $_SESSION["email"];
        $data["data"] = $this->model('users_model')->getAllUsers($email);

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer', $data);
    }

    public function start()
    {
        $email = str_replace('home/start/','',$_GET["url"]);
        if( !isset($_SESSION["login"]) ){
            header("location: ".base_url);
        }else{
            $from = $_SESSION["email"];
            $this->model('users_model')->like($email, $from);
            header("Location: ".base_url);
        }
    }

}