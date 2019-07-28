<?php
use testShop\models\Category;
use testShop\models\User;

/**
 * Controller UserController
 */
class UserController
{


    /**
     * Action for Register page
     * @return bool
     */
    public function actionRegister() {

        $categories = array();
        $categories = Category::getCategoriesList();

        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Name should be at least 2 characters.';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Invalid email.';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Password should be at least 6 characters.';
            }

            if (User::checkEmailExists($email)){
                $errors[] = 'This E-mail already exists.';
            }

            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }
        }

        require_once (ROOT.'/views/user/register.php');

        return true;

    }


    /**
     * Action for Login page
     * @return bool
     */
    public function actionLogin() {
        $categories = array();
        $categories = Category::getCategoriesList();

        $email = '';
        $password = '';


        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Invalid email.';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Password should be at least 6 characters.';
            }

            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = 'User with such email and password does not exist. Please check your login details.';
            } else {
                User::auth($userId);

                header("Location: /profile/");
            }
        }

        require_once (ROOT.'/views/user/login.php');

        return true;
    }


    /**
     * Action for Logout procedure
     * Terminates the user session
     */
    public static function actionLogout() {
        unset($_SESSION['user']);
        header("Location: /");
    }


}