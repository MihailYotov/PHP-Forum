<?php

class QuestionsModel extends BaseModel
{
    public function getAll()
    {
        $statement = self::$db->query(
            "SELECT * FROM questions ORDER BY id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getQuestionsCategory($category)
    {
        $statement = self::$db->query(
            "SELECT * FROM questions WHERE category LIKE '$category'");
        $result = $statement->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function getUsers(){
        $statement = self::$db->query(
        "SELECT * FROM users");
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

    public function loadCategories(){
        $statement = self::$db->query(
            "SELECT * FROM categories ORDER BY name");
        $result = $statement->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function createQuestion($userName, $title, $content, $category)
    {
        if ($userName == NULL || $title == NULL || $content == NULL || $category == NULL) {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO questions VALUES(NULL, ?, ?, ?, ?)");
        $statement->bind_param("ssss", $userName, $title, $content, $category);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function postAnswer($questionId, $userName, $content, $userEmail)
    {
        if ($questionId == NULL || $content == NULL) {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO answers VALUES(NULL, ?, ?, ?, ?)");
        $statement->bind_param("isss", $questionId, $userName, $content, $userEmail);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
//
//    public function deleteQuestion($id)
//    {
//        $statement = self::$db->prepare(
//            "DELETE FROM authors WHERE id = ?");
//        $statement->bind_param("i", $id);
//        $statement->execute();
//        return $statement->affected_rows > 0;
//    }
}