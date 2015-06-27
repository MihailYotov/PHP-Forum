<?php

class QuestionsModel extends BaseModel
{
    //QUESTIONS
    public function getAll()
    {
        $resultsArray = [];

        $statement = self::$db->query(
            "SELECT * FROM questions ORDER BY id DESC");
        // return $statement->fetch_all(MYSQLI_ASSOC);

        while ($row = $statement->fetch_assoc()) {
            // do what you need.
            array_push($resultsArray, $row);
        }

        return $resultsArray;
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
        $resultsArray = [];

        $statement = self::$db->query(
            "SELECT * FROM questions WHERE id = $id");
        //$result = $statement->fetch_all(MYSQLI_ASSOC);

        while ($row = $statement->fetch_assoc()) {
            // do what you need.
            array_push($resultsArray, $row);
        }

//        return $result;
        return $resultsArray;
    }


    public function tempGetQuestion($content)
    {
        $resultsArray = [];
        $statement = self::$db->query(
            "SELECT * FROM questions WHERE content LIKE '$content'");
        //$result = $statement->fetch_all(MYSQLI_ASSOC);

        //return $result;

        while ($row = $statement->fetch_assoc()) {
            array_push($resultsArray, $row);
        }

        return $resultsArray;
    }


    //ANSWERS
    public function viewQuestionAnswers($id)
    {
        $resultsArray = [];

        $statement = self::$db->query(
            "SELECT * FROM answers WHERE questionId = $id");
        //$result = $statement->fetch_all(MYSQLI_ASSOC);
        //return $result;
        while ($row = $statement->fetch_assoc()) {
            // do what you need.
            array_push($resultsArray, $row);
        }
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
        $resultsArray = [];

        $statement = self::$db->query(
            "SELECT * FROM categories ORDER BY name");
        // $result = $statement->fetch_all(MYSQLI_ASSOC);

        while ($row = $statement->fetch_assoc()) {
            // do what you need.
            array_push($resultsArray, $row);
        }

        return $resultsArray;

        // return $result;
    }

    public function getQuestionsCategory($category)
    {
        $resultsArray = [];

        $statement = self::$db->query(
            "SELECT * FROM questions WHERE category LIKE '$category' ORDER BY id DESC");
        // $result = $statement->fetch_all(MYSQLI_ASSOC);

        while ($row = $statement->fetch_assoc()) {
            // do what you need.
            array_push($resultsArray, $row);
        }

        return $resultsArray;

        // return $result;
    }


    //TAGS
    public function loadTags()
    {
        $resultsArray = [];

        $statement = self::$db->query(
            "SELECT * FROM tags ORDER BY name");
        // $result = $statement->fetch_all(MYSQLI_ASSOC);

        while ($row = $statement->fetch_assoc()) {
            array_push($resultsArray, $row);
        }

        return $resultsArray;

        // return $result;
    }


    public function addTags($tag)
    {
        if ($tag == NULL) {
            return false;
        }

        $resultsArray = [];

        $statement = self::$db->query("SELECT COUNT(id) FROM tags WHERE name LIKE '$tag'");
//        $statement->bind_param("s", $tag);
        //$statement->execute();
        //$result = $statement->get_result()->fetch_assoc();

        while ($row = $statement->fetch_assoc()) {
            array_push($resultsArray, $row);
        }

        if ($resultsArray[0]['COUNT(id)'] > 0) {
            return false;
        }

        $registerStatement = self::$db->prepare("INSERT INTO tags (name) VALUES (?)");
        $registerStatement->bind_param("s", $tag);
        $registerStatement->execute();

        return true;
    }


    public function addQuestionTags($questionId, $tagId)
    {
        $registerStatement = self::$db->prepare("INSERT INTO question_tags (questionId, tagId) VALUES (?, ?)");
        $registerStatement->bind_param("ii", $questionId, $tagId);
        $registerStatement->execute();

        return true;
    }


    public function getTagId($name)
    {
        $resultsArray = [];

        $statement = self::$db->query(
            "SELECT * FROM tags WHERE name LIKE '$name'");
        // $result = $statement->fetch_all(MYSQLI_ASSOC);

        while ($row = $statement->fetch_assoc()) {
            // do what you need.
            array_push($resultsArray, $row);
        }

        return $resultsArray;

        // return $result;
    }


    public function getQuestionsTag($tag)
    {
        $resultsArray = [];

        $statement = self::$db->query(
        //"SELECT * FROM questions WHERE id LIKE '$tag'");
        //"SELECT * FROM questions LEFT JOIN tags ON tags.questionId = questions.id WHERE tags.name LIKE '$tag'");
            "SELECT q.* FROM questions q INNER JOIN question_tags qt ON q.id = qt.questionId INNER JOIN tags t on qt.tagId = t.id WHERE t.name = '$tag' ORDER BY qt.questionId DESC");
        // $result = $statement->fetch_all(MYSQLI_ASSOC);

        while ($row = $statement->fetch_assoc()) {
            // do what you need.
            array_push($resultsArray, $row);
        }

        return $resultsArray;

        // return $result;
    }


    public function loadTagsInQuestion($questionId)
    {
        $resultsArray = [];

        $statement = self::$db->query(
            "SELECT * FROM tags t INNER JOIN question_tags qt ON t.id = qt.tagId INNER JOIN questions q on qt.questionId = q.id WHERE q.id = '$questionId'");
        // $result = $statement->fetch_all(MYSQLI_ASSOC);

        while ($row = $statement->fetch_assoc()) {
            // do what you need.
            array_push($resultsArray, $row);
        }

        return $resultsArray;

        // return $result;
    }


    //USERS
    public function getUsers()
    {
        $resultsArray = [];

        $statement = self::$db->query(
            "SELECT * FROM users");
        // return $statement->fetch_all(MYSQLI_ASSOC);

        while ($row = $statement->fetch_assoc()) {
            // do what you need.
            array_push($resultsArray, $row);
        }

        return $resultsArray;
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


    public function deleteQuestionTags($type, $id)
    {
        $statement = self::$db->prepare(
            "DELETE FROM question_tags WHERE " . $type . " = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}