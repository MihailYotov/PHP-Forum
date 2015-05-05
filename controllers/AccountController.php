<?php

class AccountController extends BaseController
{
    private $db;

    public function onInit()
    {
        $this->db = new AccountModel();
    }

    public function register()
    {
        $this->title = "Register";

        if ($this->isPost) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            if ($username == NULL || strlen($username) < 2 || $email == NULL) {
                //TODO: Error message
                $this->redirect("account", "register");
            }

            $password = $_POST['password'];
            $fName = $_POST['fName'];
            $lName = $_POST['lName'];

            $isRegistered = $this->db->register($username, $password, $fName, $lName, $email);

            if ($isRegistered) {
                $_SESSION['username'] = $username;
                //TODO: success message
                $this->redirect("questions", "index");
            } else {
                //TODO: Error message
                echo("Error register");
            }
        }

        //$this->db->register();
        $this->renderView(__FUNCTION__);
    }

    public function login()
    {
        $this->title = "Login";

        if ($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isLogedIn = $this->db->login($username, $password);

            if ($isLogedIn) {
                $_SESSION['username'] = $username;
                //TODO: Success message
                return $this->redirect("questions", "index");
            } else {
                //TODO: Error message
                $this->redirect("account", "login");
            }
        }
        $this->renderView(__FUNCTION__);
    }

    public function logout()
    {
        unset($_SESSION['username']);
        unset($_SESSION['userId']);
        //$this->isLoggedIn = false;
        //TODO: Info message
        $this->redirectToUrl("/");
    }
}