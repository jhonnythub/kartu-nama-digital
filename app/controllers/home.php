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
        $data["data"] = $this->model('users_model')->getAllUsers();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer', $data);
    }

}