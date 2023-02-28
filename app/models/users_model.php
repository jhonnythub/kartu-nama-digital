<?php


class users_model{

    private $tabel = "user_identify";
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }

    public function getAllUsers($email){
        $this->db->query("SELECT * FROM user_identify WHERE NOT email = :email");
        $this->db->bind('email', $email);
        $this->db->execute();
        return $this->db->resultSet();
    }
    
    public function getUser($email){
        $this->db->query("SELECT * FROM user_identify WHERE email = :email");
        $this->db->bind('email', $email);
        $this->db->execute();
        return $this->db->single();
    }

    public function updateProfile($name, $email){
        $this->db->query("UPDATE FROM user_identify SET fp = :fp WHERE email = :email");
        $this->db->bind('fp', $name);
        $this->db->bind('email', $email);
        return $this->db->single();
    }

    public function like($email,$from){
        $date = date('Y-m-d H:i:s');
        $this->db->query("INSERT INTO notifikasi VALUES(:id,:email,:from,:type,:value,:date)");
        $this->db->bind('id', '');
        $this->db->bind('email', $email);
        $this->db->bind('from', $from);
        $this->db->bind('type', 'start');
        $this->db->bind('value', '1');
        $this->db->bind('date', $date);
        $this->db->execute();
    }

    public function getStartUser($from, $email){
        $this->db->query("SELECT * FROM notifikasi WHERE email = :email AND from_user = :from");
        $this->db->bind('email', $email);
        $this->db->bind('from', $from);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getNotifikasi($email){
        $this->db->query("SELECT * FROM notifikasi WHERE email = :email");
        $this->db->bind('email', $email);
        $this->db->execute();
        return $this->db->resultSet();
    }

}