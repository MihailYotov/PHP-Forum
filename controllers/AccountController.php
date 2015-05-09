<?php

class AccountController extends BaseController
{
    private $db;

    public function onInit()
    {
        $this->db = new AccountModel();
    }

    //REGISTRATION
    public function register()
    {
        if (!isset($_SESSION['username'])) {
            $this->title = "Register";

            if ($this->isPost) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                if ($username == NULL || strlen($username) < 2 || $email == NULL) {
                    $this->addErrorMessage("Failed to register.");
                    $this->redirect("account", "register");
                }

                $password = $_POST['password'];
                $fName = $_POST['fName'];
                $lName = $_POST['lName'];

                $isRegistered = $this->db->register($username, $password, $fName, $lName, $email);

                if ($isRegistered) {

                    $this->user = $this->db->getUserData($username);
                    foreach ($this->user as $userData) {
                        $_SESSION['userId'] = $userData['id'];
                        $_SESSION['isAdmin'] = $userData['isAdmin'];
                    }

                    $_SESSION['username'] = $username;
                    $this->addSuccessMessage("Registration successful!");
                    $this->redirect("questions");
                } else {
                    $this->addErrorMessage("Failed to register.");
                }
            }

            //$this->db->register();
            $this->renderView(__FUNCTION__);
        } else {
            $this->redirectToUrl("/");
        }
    }


    //LOGIN
    public function login()
    {
        if (!isset($_SESSION['username'])) {
            $this->title = "Login";

            if ($this->isPost) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $isLogedIn = $this->db->login($username, $password);

                if ($isLogedIn) {
                    $_SESSION['username'] = $username;

                    $this->user = $this->db->getUserData($username);
                    foreach ($this->user as $userData) {
                        $_SESSION['userId'] = $userData['id'];
                        $_SESSION['isAdmin'] = $userData['isAdmin'];
                    }

                    $this->addSuccessMessage("Login successful!");
                    return $this->redirect("questions");
                } else {
                    $this->addErrorMessage("Failed to login!");
                    $this->redirect("account", "login");
                }
            }
            $this->renderView(__FUNCTION__);
        } else {
            $this->redirectToUrl("/");
        }

    }


    //LOGOUT
    public function logout()
    {
        unset($_SESSION['username']);
        unset($_SESSION['userId']);
        $_SESSION['isAdmin'] = 0;
        //$this->isLoggedIn = false;
        $this->addInfoMessage("You have logged out!");
        $this->redirectToUrl("/");
    }


    //PROFILE INFO
    public function profile($userId)
    {
        if ($_SESSION['userId'] == $userId || $_SESSION['isAdmin'] > 0) {
            $this->title = "Profile";
            $this->users = $this->db->viewUser($userId);
        } else {
            $this->redirectToUrl('/');
        }

    }

    public function editProfile()
    {
        $this->title = "Edit profile";
//        $userId = $_SESSION['userId'];
//        $this->users = $this->db->viewUser($userId);
//
//        if ($this->isPost) {
//            //$username = $_POST['username'];
//            $email = $_POST['email'];
////            if ($username == NULL || strlen($username) < 2 || $email == NULL) {
////                //TODO: Error message
////                $this->redirect("account", "register");
////            }
//
//            //$password = $_POST['password'];
//            $fName = $_POST['fName'];
//            $lName = $_POST['lName'];
////            $username, $password,
//            $isRegistered = $this->db->editProfile($userId, $fName, $lName, $email);
//
////            if ($isRegistered) {
////                $_SESSION['username'] = $username;
////                //TODO: success message
////                $this->redirect("questions");
////            } else {
////                //TODO: Error message
////                echo("Error register");
////            }
//        }
    }


    //ADMIN FUNCTIONS
    public function allUsers()
    {
        if ($_SESSION['isAdmin'] > 0) {
            $this->title = "All users";
            $this->users = $this->db->getAllUsers();
        } else {
            $this->redirectToUrl('/');


        }
    }


    public function deleteUser($id)
    {
        if ($_SESSION['isAdmin'] > 0) {
            $this->db->deleteUser($id);
            $this->addSuccessMessage('User deleted');
            $this->redirectToUrl('/account/allUsers');
        }
    }


    public function promoteAdmin($id)
    {
        if ($_SESSION['isAdmin'] > 0) {
            $this->db->promoteAdmin($id);
            $this->addSuccessMessage('User promoted to admin.');
            $this->redirectToUrl('/account/profile/' . $id);
        }
    }


    public function downgradeAdmin($id)
    {
        if ($_SESSION['isAdmin'] > 0) {
            $this->db->downgradeAdmin($id);
            $this->addSuccessMessage('User downgraded to normal.');
            $this->redirectToUrl('/account/profile/' . $id);
        }
    }
}