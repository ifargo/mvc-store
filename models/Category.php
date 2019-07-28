<?php

/**
 * Class for managing categories
 */

namespace testShop\models;

class Category
{

    /**
     * Returns an array of categories with status = 1
     * @returns array of categories
     */
    public static function getCategoriesList() {

        $categoryList = array();

        // Forming an SQL query with $pdoObject->query()

        $result = $GLOBALS['db']->query("SELECT id, name FROM category WHERE status = 1 ORDER BY sort_order ASC");

        // Forming data into an array with fetch() function

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }

        return $categoryList;
    }


    /**
     * Returns an array of categories with any status
     * @return array of categories
     */
    public static function getCategoriesListAdmin() {

        $categoryList = array();

        $result = $GLOBALS['db']->query("SELECT id, name, status FROM category ORDER BY sort_order ASC");

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }

        return $categoryList;
    }


    /**
     * Returns an array containing all the data of a specified category
     * @param int $id
     * @return array
     */
    public static function getCategoryById($id) {

        $id = intval($id);

        $sql = "SELECT * FROM category WHERE id = :id";

        if ($id) {

            $result = $GLOBALS['db']->prepare($sql);
            $result->bindParam(':id', $id, \PDO::PARAM_INT);

            // Get result with array type
            $result->setFetchMode(\PDO::FETCH_ASSOC);

            $result->execute();

            return $result->fetch();
        }
    }


    /**
     * Creates a new database entry in 'category' table
     * @param array $options
     * @return bool
     */
    public static function createCategory($options) {

        $sql = "INSERT INTO category (name, sort_order, status) VALUES (:name, :sort_order, :status)";

        $result = $GLOBALS['db']->prepare($sql);
        $result->bindParam(':name',$options['name'],\PDO::PARAM_STR);
        $result->bindParam(':sort_order',$options['sort_order'],\PDO::PARAM_INT);
        $result->bindParam(':status',$options['status'],\PDO::PARAM_INT);

        return $result->execute();

    }


    /**
     * Updates an existing database entry in 'category' table
     * @param int $id
     * @param array $options
     * @return bool
     */
    public static function updateCategory($id, $options) {

        $sql = "UPDATE category SET name = :name, sort_order = :sort_order, status = :status WHERE id = :id";

        $result = $GLOBALS['db']->prepare($sql);
        $result->bindParam(':id',$id,\PDO::PARAM_STR);
        $result->bindParam(':name',$options['name'],\PDO::PARAM_STR);
        $result->bindParam(':sort_order',$options['sort_order'],\PDO::PARAM_INT);
        $result->bindParam(':status',$options['status'],\PDO::PARAM_INT);

        return $result->execute();

    }


    /**
     * Deletes a database entry from table 'category' with specified $id
     * @param int $id
     * @return bool
     */
    public static function removeCategoryById($id) {

        $sql = "DELETE FROM category WHERE id = :id";

        $result = $GLOBALS['db']->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        return $result->execute();

    }
}