<?php

namespace testShop\components;

use testShop\models\User;

/**
 * Class AdminBase
 * @package testShop\components
 */
abstract class AdminBase {

    /**
     * Checks if the logged user is admin
     * @return bool
     */

    public static function checkAdmin() {

         $userId = User::checkLogged();

        if ($userId) {

             $user = User::getUserById($userId);

         } else {
             header("Location: /user/login");
         }

        if ($user['role'] == 'admin') {
            return true;
        }

        die("<h2>Access denied.</h2>");

    }
}