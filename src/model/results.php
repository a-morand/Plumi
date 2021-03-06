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
            $sql = 'SELECT a.* FROM answers AS a JOIN fills AS f ON (a.fill_id = f.id) WHERE f.user_id = :user';
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue('user', $id);
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
