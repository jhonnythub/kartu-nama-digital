<?php


class controller{

    public function view($view, $data = [])
    {
        require_once "app/views/". $view .".php";
    }

    public function model($model){
        require_once "app/models/".$model.".php";
        return new $model;
    }

    public function email($email){
        require_once "app/mail/".$email.".php";
        return new $email;
    }

}