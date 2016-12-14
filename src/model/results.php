<?php

namespace Model;

/**
 * Results
 */
class Results
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getFill($id)
    {   
            $sql = 'SELECT * FROM answers WHERE fill_id = :fill';
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue('fill', $id);
            $stmt->execute();
            return $stmt->fetchAll();
    }
}
