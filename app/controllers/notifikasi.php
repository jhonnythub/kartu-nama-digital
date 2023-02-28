<?php

class notifikasi extends controller{

    public function __construct()
    {
        if( !isset($_SESSION["login"]) )
        {
            header("Location: ".base_url."/auth/auth"); exit;
        }
    }

    public function index()
    {
        $data["notifikasi"] = $this->model('users_model')->getNotifikasi($_SESSION["email"]);
        $data["title"] = "Halaman Notifikasi";

        $this->view('templates/header', $data);
        $this->view('notifikasi/index', $data);
        $this->view('templates/footer', $data);
    }

}