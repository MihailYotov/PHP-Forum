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
        $_SESSION['userEmail'] = $result['email'];
//        var_dump($result);

        if (password_verify($password, $result['password'])) {
            return true;
        }

        return false;
    }

    public function viewUser($userId){
        $statement = self::$db->query(
            "SELECT * FROM users WHERE id = $userId");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function editProfile($userId, $fName, $lName, $email){
//        $hash_pass = password_hash($password, PASSWORD_BCRYPT);
//
//        $registerStatement = self::$db->prepare("INSERT INTO users (fname, lname, email) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE fname=?, lname=?, email=? WHERE id = $userId");
//        $registerStatement->bind_param("sss", $fName, $lName, $email);
//        $registerStatement->execute();
//
//        return true;
    }
}