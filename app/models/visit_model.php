<?php

class visit_model{

    private $table = 'visits';
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }

    public function insertVisit($visit)
    {
        $query = "INSERT INTO visits (ipaddr,os,browser,coordinat) VALUES(:ipaddr,:os,:browser,:coor)";

        $this->db->query($query);
        $this->db->bind('ipaddr', $visit["ipaddr"]);
        $this->db->bind('os', $visit["os"]);
        $this->db->bind('browser', $visit["browser"]);
        $this->db->bind('coor', $visit["coordinat"]);
        $this->db->execute();

        return $this->db->rowCount();
    }

}