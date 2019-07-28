<?php
/**
 * Database connection
 */

namespace testShop\components;

class Db {

    /**
     * Connects to database using the parameters in /config/db_params.php
     * @return \PDO
     */
    public static function getConnection() {
        $params = require_once (ROOT.'/config/db_params.php');

        $db = new \PDO("mysql:host={$params['host']};dbname={$params['dbname']}",$params['user'], $params['password']);
        $db->query("SET NAMES utf8");
        return $db;
    }
}