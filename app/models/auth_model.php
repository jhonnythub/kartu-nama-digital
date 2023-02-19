<?php

class auth_model{

    private $table1 = 'users';
    private $table2 = 'user_identify';
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }

    public function insertNewUserIdentify($data){
        date_default_timezone_set('Asia/Jakarta'); $expired = date('Y-m-d', strtotime('+7 month', strtotime( date("Y-m-d H:i:s") )));
        $query = "INSERT INTO user_identify VALUES(:id,:id_user,:nama_lengkap,:telepon,:lokasi,:pekerjaan,:email,:fp,:expired,:qr_code)";
        $this->db->query($query);
        $this->db->bind('id', htmlspecialchars(""));
        $this->db->bind('id_user', htmlspecialchars($data["id_user"]));
        $this->db->bind('nama_lengkap', htmlspecialchars($data["name"]));
        $this->db->bind('telepon', htmlspecialchars($data["telepon"]));
        $this->db->bind('lokasi', htmlspecialchars($data["lokasi"]));
        $this->db->bind('pekerjaan', htmlspecialchars($data["pekerjaan"]));
        $this->db->bind('email', htmlspecialchars($data["email"]));
        $this->db->bind('fp', htmlspecialchars("-"));
        $this->db->bind('expired', htmlspecialchars($expired));
        $this->db->bind('qr_code', $data["all"]);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function insertNewUser($data){
        $query = "INSERT INTO users VALUES(:id,:id_user,:username,:email,:password,:login_filed,:last_login,:otp,:verified)";
        $this->db->query($query);
        $this->db->bind('id', htmlspecialchars(""));
        $this->db->bind('id_user', htmlspecialchars($data["id_user"]));
        $this->db->bind('username', htmlspecialchars($data["username"]));
        $this->db->bind('email', htmlspecialchars($data["email"]));
        $this->db->bind('password', htmlspecialchars($data["pass"]));
        $this->db->bind('login_filed', htmlspecialchars(0));
        $this->db->bind('last_login', htmlspecialchars($data["date"]));
        $this->db->bind('otp', htmlspecialchars($data["id_user"]));
        $this->db->bind('verified', false);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getUsername($username){
        $this->db->query("SELECT username FROM users WHERE username = :email");
        $this->db->bind('email', $username["username"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getEmail($email){
        $query = "SELECT email FROM users WHERE email = :email";

        $this->db->query($query);
        $this->db->bind('email', $email["email"]);
        $this->db->execute();

        return $this->db->single();
    }

    public function otp($otp,$email){
        $query = "SELECT otp FROM users WHERE email = :email";

        $this->db->query($query);
        $this->db->bind('email', $email);
        $this->db->execute();

        return $this->db->single();
    }

    public function otpVerified($email){
        $query = "UPDATE users SET verified = :true WHERE email = :email";

        $this->db->query($query);
        $this->db->bind('true', true);
        $this->db->bind("email", $email);
        $this->db->execute();

        return $this->db->single();
    }

    public function otpUpdate($email, $otp){
        $this->db->query("UPDATE users SET otp = :otp WHERE email = :email");
        $this->db->bind('otp', $otp);
        $this->db->bind('email', $email["email"]);
        $this->db->execute();
    }

    public function userLogin($user)
    {
        $query = "SELECT * FROM users WHERE username = :user OR email = :email";

        $this->db->query($query);
        $this->db->bind('user', $user["username"]);
        $this->db->bind('email', $user["username"]);
        $this->db->execute();

        return $this->db->single();
    }

    public function countFiled($count){
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind('email', $count["username"]);
        $this->db->execute();
        return $this->db->single();
    }

    public function loginFiled($email,$plus,$date){
        $this->db->query("UPDATE users SET login_filed = :fil, last_login = :date WHERE email = :email OR username = :user");
        $this->db->bind('date', $date);
        $this->db->bind('email', $email["username"]);
        $this->db->bind('user', $email["username"]);
        $this->db->bind('fil', $plus);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateFiled($c){
        $this->db->query("UPDATE users SET login_filed = :log WHERE email = :email OR username = :user");
        $this->db->bind('log', 0);
        $this->db->bind('email', $c["username"]);
        $this->db->bind('user', $c["username"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

}