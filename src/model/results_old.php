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

            $data = $stmt->fetchAll();
            foreach ($data as &$row) {
                $type_id = $row->type_id;
                $question_id = $row->question_id;

                $sql = 'SELECT * FROM exercises_' . $type_id . ' WHERE id = :id';
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue('id', $question_id);
                $stmt->execute();

                $row->question = $stmt->fetch();

            }

            return $data;
    }
}
