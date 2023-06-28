<?php

/* dataconn class for connecting with databases */

class DataConn
{
    private $db_Host = 'localhost';
    private $db_Name = 'enemy';
    private $db_User = 'root';
    private $db_Password = '';

    public function dataConnection()
    {
        try {
            $conn = new PDO("mysql:host=$this->db_Host;dbname=$this->db_Name;", $this->db_User, $this->db_Password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            echo 'Database connection error:: '.$e->getMessage();
        }
    }
}
