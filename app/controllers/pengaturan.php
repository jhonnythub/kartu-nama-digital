<?php

class pengaturan extends controller{

    public function index()
    {
        $data["title"] = "Pengaturan";

        $this->view('templates/header', $data);
        $this->view('pengaturan/index', $data);
        $this->view('templates/footer', $data);
    }

}