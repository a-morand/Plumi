<?php

namespace Model;

/**
 * User
 */
class User
{
    private $db;
    private $session;

    public function __construct($db, $session)
    {
        $this->db = $db;
        $this->session = $session;
    }

    public function login($username, $password)
    {
        $sql = 'SELECT * FROM users WHERE username=:username';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('username', $username);
        $stmt->execute();

        $user = $stmt->fetch();

        if ($user) {
            if (password_verify($password, $user->password)) {
                $this->session->set('user', $user);
                return true;
            }
        }

        return false;
    }
}
