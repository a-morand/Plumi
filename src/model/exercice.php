<?php

namespace Model;

/**
 * Home page, that matchs webroot
 */
class Exercice
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function get($type, $id)
    {
        $type = (int) $type;
        $id = (int) $id;

        if ($type === 0 or $id === 0) {
            return null;
        }

        $table = 'exercises_' . $type;
        $limit = 10;
        $offset = ($id - 1) * 10;

        $sql = 'SELECT * FROM ' . $table . ' LIMIT :limit OFFSET :offset';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue('offset', $offset, \PDO::PARAM_INT);

        if ($stmt->execute()) {
            $data = $stmt->fetchAll();
            foreach ($data as $key => &$value) {
                $value->type = $type;
            }
            return $data;
        }

        return null;
    }

    public function insert($user_id, $answers)
    {
        $sql = 'INSERT INTO fills (user_id) VALUES (:user_id)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('user_id', $user_id, \PDO::PARAM_INT);
        $stmt->execute();

        $fill_id = $this->db->lastInsertId();

        foreach ($answers as $answer) {
            $sql = 'INSERT INTO answers(fill_id, answer, type_id, question_id, success)'
                 . ' VALUES (:fill_id, :answer, :type_id, :question_id, :success)';

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue('fill_id', $fill_id);
            $stmt->bindValue('answer', $answer['answer']);
            $stmt->bindValue('type_id', $answer['type_id']);
            $stmt->bindValue('question_id', $answer['question_id']);
            $stmt->bindValue('success', $answer['success']);
            $stmt->execute();
        }
    }
}
