<?php

class logout{

    public function index(){
        $_SESSION = [];
        session_destroy();
        session_unset();
        header("Location: ".base_url); exit;
    }

}