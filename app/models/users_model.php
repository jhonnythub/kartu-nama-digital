<?php


class users_model{

    private $tabel = "user_identify";
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }

    public function getAllUsers(){
        $this->db->query("SELECT * FROM user_identify");
        $this->db->execute();
        return $this->db->resultSet();
    }
    
    public function getUser($email){
        $this->db->query("SELECT * FROM user_identify WHERE email = :email");
        $this->db->bind('email', $email);
        $this->db->execute();
        return $this->db->single();
    }

}