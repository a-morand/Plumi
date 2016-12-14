<?php

namespace Model;

/**
 * Admin
 */
class Admin
{
    private $db;
    private $session;

    public function __construct($db, $session)
    {
        $this->db = $db;
        $this->session = $session;
    }

    public function signup($username, $password, $first_name, $last_name)
    {   
            $password=password_hash($password, PASSWORD_DEFAULT);
            $sql = 'INSERT INTO users (username, password, first_name, last_name) VALUES (:username,:password, :first_name, :last_name)';
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue('username', $username);
            $stmt->bindValue('password', $password);
            $stmt->bindValue('first_name', $first_name);
            $stmt->bindValue('last_name', $last_name);
            $stmt->execute();

            return true;
    }
}
