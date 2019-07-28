<?php

/**
 * Class to manage authentication and user profile
 */
namespace testShop\models;


class User
{


    /**
     * Creates new user - a database entry into table 'user'
     * @param string $name
     * @param  string $email
     * @param  string $password
     * @return bool
     */
    public static function register($name, $email, $password){

        $sql = "INSERT INTO user (name, email, password) VALUES (:name, :email, :password)";

        $result = $GLOBALS['db']->prepare($sql);
        $result->bindParam(':name', $name, \PDO::PARAM_STR);
        $result->bindParam(':email', $email, \PDO::PARAM_STR);
        $result->bindParam(':password', $password, \PDO::PARAM_STR);

        return $result->execute();
    }


    /**
     * Checks if the $name is valid
     * @param string $name
     * @return bool
     */
    public static function checkName($name) {
        if (strlen($name) >= 2) {
            return true;
        }

        return false;
    }


    /**
     * Checks if the email is valid
     * @param string $email
     * @return bool
     */
    public static function checkEmail($email){

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }


    /**
     * Checks if the phone number is valid
     * @param string $phoneNumber
     * @return bool
     */
    public static function checkPhone($phoneNumber) {

        if (strlen($phoneNumber) == 13) {
            return true;
        }
        return false;
}


    /**
     * Checks if the password is valid
     * @param string $password
     * @return bool
     */
    public static function checkPassword($password){

        if (strlen($password) >= 6) {
            return true;
        }

        return false;
    }


    /**
     * Checks if the specified email is already in use by another user
     * @param string $email
     * @return bool
     */
    public static function checkEmailExists($email) {

        $sql = "SELECT COUNT(*) FROM user WHERE email = :email";

        $result = $GLOBALS['db']->prepare($sql);
        $result->bindParam(':email', $email, \PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;
        return false;
    }


    /**
     * Checks if user exists with given email and password
     * @param string $email
     * @param string $password
     * @return bool
     */
    public static function checkUserData($email, $password) {

        $sql = "SELECT * FROM user WHERE email = :email AND password = :password";

        $result = $GLOBALS['db']->prepare($sql);
        $result->bindParam(':email', $email, \PDO::PARAM_STR);
        $result->bindParam(':password', $password, \PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }

        return false;
    }


    /**
     * Starts user session
     * @param int $userId
     */
    public static function auth($userId) {

        $_SESSION['user'] = $userId;

    }

    /**
     * Returns user id (from $_SESSION['user']) if user is logged, otherwise returns false
     * @return array|bool
     */
    public static function checkLogged() {

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        return false;
    }


    /**
     * Returns all user info with specified id
     * @param int $id
     * @return bool
     */
    public static function getUserById($id) {
        if ($id) {
            $sql = "SELECT * FROM user WHERE id = :id";

            $result = $GLOBALS['db']->prepare($sql);
            $result->bindParam(':id', $id, \PDO::PARAM_INT);
            $result->setFetchMode(\PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }

    }


    /**
     * Updates user information
     * @param int $userId
     * @param string $name
     * @param string $password
     * @param string $email
     * @param string $phone_number
     * @param string $birth_date
     * @param string $address
     * @return bool
     */
    public static function edit($userId, $name, $password, $email, $phone_number, $birth_date, $address) {

        $sql = "UPDATE user SET name = :name, password = :password, email = :email, phone_number = :phone_number, birth_date = :birth_date,".
            "address = :address WHERE id = :id";

        $result = $GLOBALS['db']->prepare($sql);
        $result->bindParam(':name', $name, \PDO::PARAM_STR);
        $result->bindParam(':password', $password, \PDO::PARAM_STR);
        $result->bindParam(':id', $userId, \PDO::PARAM_INT);
        $result->bindParam(':email', $email, \PDO::PARAM_STR);
        $result->bindParam(':phone_number', $phone_number, \PDO::PARAM_STR);
        $result->bindParam(':birth_date', $birth_date, \PDO::PARAM_STR);
        $result->bindParam(':address', $address, \PDO::PARAM_STR);
        return $result->execute();
    }

}

