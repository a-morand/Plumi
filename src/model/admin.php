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

    public function signup($username, $password)
    {   
            $password=password_hash($password, PASSWORD_DEFAULT);
            $sql = 'INSERT INTO users (username, password) VALUES (:username,:password)';
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue('username', $username);
            $stmt->bindValue('password', $password);
            $stmt->execute();

            return true;
    }
}
