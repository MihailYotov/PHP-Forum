<?php

class QuestionsModel extends BaseModel
{
    public function getAll()
    {
        $statement = self::$db->query(
            "SELECT * FROM questions ORDER BY id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function viewQuestion($id)
    {
        $statement = self::$db->query(
            "SELECT * FROM questions WHERE id = $id");
        $result = $statement->fetch_all(MYSQLI_ASSOC);

        return $result;

    }

    public function viewQuestionAnswers($id)
    {
        $statement = self::$db->query(
            "SELECT * FROM answers WHERE questionId = $id");
        $result = $statement->fetch_all(MYSQLI_ASSOC);

        return $result;

    }

    public function createQuestion($userId, $title, $content)
    {
        if ($userId == NULL || $title == NULL || $content == NULL) {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO questions VALUES(NULL, ?, ?, ?)");
        $statement->bind_param("iss", $userId, $title, $content);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function createAnswer($questionId, $userId, $content)
    {
        if ($questionId == NULL || $content == NULL) {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO answers VALUES(NULL, ?, ?, ?)");
        $statement->bind_param("iis", $questionId, $userId, $content);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
//
//    public function deleteAuthor($id)
//    {
//        $statement = self::$db->prepare(
//            "DELETE FROM authors WHERE id = ?");
//        $statement->bind_param("i", $id);
//        $statement->execute();
//        return $statement->affected_rows > 0;
//    }
}