<?php

use testShop\models\Category;
use testShop\models\User;

/**
 * Controller ProfileController
 */
class ProfileController
{


    /**
     * Action for the user Profile page
     * @return bool
     */
    public function actionIndex() {
        $categories = array();
        $categories = Category::getCategoriesList();

        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        require_once (ROOT.'/views/profile/index.php');

        return true;

    }


    /**
     * Action for Edit profile page
     * @return bool
     */
    public static function actionEdit() {
        $categories = array();
        $categories = Category::getCategoriesList();

        $userId = User::checkLogged();

        if ($userId == false) {
            header('Location: /user/login/');
        }

        $user = User::getUserById($userId);

        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $birth_date = $_POST['birth_date'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Name should be at least 2 characters';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Password should be at least 6 characters.';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Invalid email.';
            }

            if (!User::checkPhone($phone_number)) {
                $errors[] = 'Phone number should consist of 13 characters. Example: +123456789123';
            }

            if ($errors == false) {
                $result = User::edit($userId, $name, $password, $email, $phone_number, $birth_date, $address);
            }

        }

        require_once (ROOT.'/views/profile/edit.php');

        return true;
    }
}