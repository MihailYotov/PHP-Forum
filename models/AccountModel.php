<?php

class AccountModel extends BaseModel
{
    public function register($username, $password, $fName, $lName, $email)
    {
        $statement = self::$db->prepare("SELECT COUNT(id) FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        //var_dump($result['COUNT(Id)']);
        if ($result['COUNT(Id)']) {
            return false;
        }

        $hash_pass = password_hash($password, PASSWORD_BCRYPT);

        $registerStatement = self::$db->prepare("INSERT INTO users (username, password, fname, lname, email) VALUES (?, ?, ?, ?, ?)");
        $registerStatement->bind_param("sssss", $username, $hash_pass, $fName, $lName, $email);
        $registerStatement->execute();

        return true;

    }

    public function login($username, $password)
    {
        $statement = self::$db->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        $_SESSION['userId'] = $result['id'];
//        var_dump($result);

        if (password_verify($password, $result['password'])) {
            return true;
        }

        return false;
    }
}