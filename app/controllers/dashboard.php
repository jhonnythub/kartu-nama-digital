<?php

class dashboard extends controller{

    public function __construct()
    {
        if( !isset($_SESSION["login"]) )
        {
            header("Location: ".base_url."/auth"); exit;
        }
    }

    public function index()
    {
        $data["title"] = "Dashboard | Kartu Nama Digital";
        $email = $_SESSION["email"];
        $data["user"] = $this->model('users_model')->getUser($email);

        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer', $data);
    }

}