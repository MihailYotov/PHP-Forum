<?php

class QuestionsModel extends BaseModel
{
    //QUESTIONS
    public function getAll()
    {
        $statement = self::$db->query(
            "SELECT * FROM questions ORDER BY id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }


    public function createQuestion($userName, $title, $content, $category, $visits)
    {
        if ($userName == NULL || $title == NULL || $content == NULL || $category == NULL) {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO questions VALUES(NULL, ?, ?, ?, ?, ?)");
        $statement->bind_param("ssssi", $userName, $title, $content, $category, $visits);
        $statement->execute();
        return $statement->affected_rows > 0;
    }


    public function viewQuestion($id)
    {
        $statement = self::$db->query(
            "SELECT * FROM questions WHERE id = $id");
        $result = $statement->fetch_all(MYSQLI_ASSOC);

        return $result;
    }


    public function tempGetQuestion($content)
    {
        $statement = self::$db->query(
            "SELECT * FROM questions WHERE content LIKE '$content'");
        $result = $statement->fetch_all(MYSQLI_ASSOC);

        return $result;
    }


    //ANSWERS
    public function viewQuestionAnswers($id)
    {
        $statement = self::$db->query(
            "SELECT * FROM answers WHERE questionId = $id");
        $result = $statement->fetch_all(MYSQLI_ASSOC);

        return $result;

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


    //CATEGORIES
    public function loadCategories()
    {
        $statement = self::$db->query(
            "SELECT * FROM categories ORDER BY name");
        $result = $statement->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function getQuestionsCategory($category)
    {
        $statement = self::$db->query(
            "SELECT * FROM questions WHERE category LIKE '$category'");
        $result = $statement->fetch_all(MYSQLI_ASSOC);

        return $result;
    }


    //TAGS
    public function loadTags()
    {
        $statement = self::$db->query(
            "SELECT * FROM tags ORDER BY name");
        $result = $statement->fetch_all(MYSQLI_ASSOC);

        return $result;
    }


    public function addQuestionTags($tag, $questionId)
    {
        if ($tag == NULL) {
            return false;
        }

        $statement = self::$db->prepare("SELECT COUNT(id) FROM tags WHERE name LIKE '$tag'");
//        $statement->bind_param("s", $tag);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        if ($result['COUNT(id)'] > 0) {
            return false;
        }

        $registerStatement = self::$db->prepare("INSERT INTO tags (name, questionId) VALUES (?, ?)");
        $registerStatement->bind_param("si", $tag, $questionId);
        $registerStatement->execute();

        return true;
    }


    public function getQuestionsTag($tag)
    {
        $statement = self::$db->query(
        //"SELECT * FROM questions WHERE id LIKE '$tag'");
            "SELECT * FROM questions LEFT JOIN tags ON tags.questionId = questions.id WHERE tags.name LIKE '$tag'");
        $result = $statement->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    //USERS
    public function getUsers()
    {
        $statement = self::$db->query(
            "SELECT * FROM users");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    //VISITS
    public function increaseVisit($id, $visitCounter)
    {
        $Statement = self::$db->prepare("INSERT INTO questions (id, visits) VALUES ($id, $visitCounter) ON DUPLICATE KEY UPDATE visits = $visitCounter");
        $Statement->execute();
        return true;
    }


    //ADMIN FUNCTIONS

    public function deleteQuestion($id)
    {
        $statement = self::$db->prepare(
            "DELETE FROM answers WHERE questionId = ?");
        $statement->bind_param("i", $id);
        $statement->execute();

        $statement = self::$db->prepare(
            "DELETE FROM questions WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }


    public function deleteAnswer($id)
    {
        $statement = self::$db->prepare(
            "DELETE FROM answers WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }


    public function addCategory($category)
    {
        if ($category == NULL) {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO categories VALUES(NULL, ?)");
        $statement->bind_param("s", $category);
        $statement->execute();
        return $statement->affected_rows > 0;
    }


    public function deleteCategory($id)
    {
        $statement = self::$db->prepare(
            "DELETE FROM categories WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }


    public function deleteTag($id)
    {
        $statement = self::$db->prepare(
            "DELETE FROM tags WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}