<?php

/**
 * Class for managing product items
 */

namespace testShop\models;


class Product
{

    /**
     * @var int Amount of the latest products to show by default
     */
    const SHOW_BY_DEFAULT = 5;

    /**
     * Returns array of products with status 1
     * @param int $count
     * @return array of products
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT) {

        $count = intval($count);


        $productList = array();

        $result = $GLOBALS['db']->query("SELECT id, name, price, is_new, category_id FROM product WHERE status = '1' ORDER BY id DESC LIMIT ".$count);

        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['category_id'] = $row['category_id'];
            $i++;
        }

        return $productList;
    }


    /**
     * Returns the array of recommended products
     * @param int $count
     * @return array
     */
    public static function getRecommendedProducts($count = self::SHOW_BY_DEFAULT) {

        $count = intval($count);
        $recommendedProductList = array();

        $result = $GLOBALS['db']->query("SELECT id, name, category_id, price, is_new, is_recommended, category_id FROM product WHERE status = '1' AND is_recommended = '1' ORDER BY id DESC LIMIT ".$count);

        $i = 0;
        while ($row = $result->fetch()) {
            $recommendedProductList[$i]['id'] = $row['id'];
            $recommendedProductList[$i]['name'] = $row['name'];
            $recommendedProductList[$i]['price'] = $row['price'];
            $recommendedProductList[$i]['is_new'] = $row['is_new'];
            $recommendedProductList[$i]['is_recommended'] = $row['is_recommended'];
            $recommendedProductList[$i]['category_id'] = $row['category_id'];
            $i++;
        }

        return $recommendedProductList;
    }


    /**
     * Returns all the info about specified product
     * @param int $id
     * @return array|bool
     */
    public static function getProductById($id){

        $id = intval($id);

        if ($id) {

            $result = $GLOBALS['db']->query("SELECT * FROM product WHERE id=".$id);
            $result->setFetchMode(\PDO::FETCH_ASSOC);

            return $result->fetch();
        }
        return false;
    }


    /**
     * Returns an array of products with specified ids
     * @param array $idsArray
     * @return array
     */
    public static function getProductsByIds($idsArray) {

        $products = array();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $GLOBALS['db']->query($sql);
        $result->setFetchMode(\PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['name'] = $row['name'];
            $i++;
        }

        return $products;
    }


    /**
     * Returns a list of products which belong to specified category (contain $categoryId)
     * @param int|bool $categoryId
     * @param int $page
     * @return array|bool
     */
    public static function getProductsListByCategoryId($categoryId = false, $page = 1) {

        // Pages for pagination

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        if ($categoryId) {

            $products = array();

            $result = $GLOBALS['db']->query("SELECT id, name, price, is_new FROM product WHERE status = '1' AND category_id = ".$categoryId." ORDER BY id ASC LIMIT ".self::SHOW_BY_DEFAULT." OFFSET ".$offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $products;
        }
        return false;
    }


    /**
     * Returns a list of all products in the database
     * @return array
     */
    public static function getProductsList() {

        $productsList = array();

        $result = $GLOBALS['db']->query("SELECT id, name, price, code FROM product ORDER BY id ASC");

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['code'] = $row['code'];
            $i++;
        }
        return $productsList;

    }


    /**
     * Counts the total amount of products in a specified category
     * @param int $categoryId
     * @return int
     */
    public static function getTotalProductsInCategory($categoryId) {

        $result = $GLOBALS['db']->query("SELECT count(id) AS count FROM product WHERE status='1' AND category_id='".$categoryId."'");

        $result->setFetchMode(\PDO::FETCH_ASSOC);

        $row = $result->fetch();

        return $row['count'];
    }

    /**
     * Removes product with $id
     * @param integer $id
     * @return bool
     */
    public static function removeProductById($id) {

        $sql = "DELETE FROM product WHERE id = :id";

        $result = $GLOBALS['db']->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Creates a new database entry in table 'product'
     * @param array $options
     * @return int
     */
    public static function createProduct($options) {

        $sql = "INSERT INTO product (name, category_id, code, price, availability, brand, description, is_new, is_recommended, status)".
                            " VALUES (:name, :category_id, :code, :price, :availability, :brand, :description, :is_new, :is_recommended, :status)";

        $result = $GLOBALS['db']->prepare($sql);
        $result->bindParam(':name',$options['name'],\PDO::PARAM_STR);
        $result->bindParam(':category_id',$options['category_id'],\PDO::PARAM_INT);
        $result->bindParam(':code',$options['code'],\PDO::PARAM_STR);
        $result->bindParam(':price',$options['price'],\PDO::PARAM_STR);
        $result->bindParam(':availability',$options['availability'],\PDO::PARAM_STR);
        $result->bindParam(':brand',$options['brand'],\PDO::PARAM_STR);
        $result->bindParam(':description',$options['description'],\PDO::PARAM_STR);
        $result->bindParam(':is_new',$options['is_new'],\PDO::PARAM_INT);
        $result->bindParam(':is_recommended',$options['is_recommended'],\PDO::PARAM_INT);
        $result->bindParam(':status',$options['status'],\PDO::PARAM_INT);

        if ($result->execute()) {

            // If the execution was successful, return id if last added product
            return $GLOBALS['db']->lastInsertId();
        }
        // Otherwise return 0
        return 0;
    }


    /**
     * Updates an existing database entry in table 'product'
     * @param int $id
     * @param array $options
     * @return bool
     */
    public static function updateProductById($id, $options) {

        $sql = "UPDATE product SET name = :name, category_id = :category_id, code = :code, price = :price,".
            " availability = :availability, brand = :brand, description = :description, is_new = :is_new,".
            " is_recommended = :is_recommended, status = :status WHERE id = :id";

        $result = $GLOBALS['db']->prepare($sql);
        $result->bindParam(':id',$id,\PDO::PARAM_INT);
        $result->bindParam(':name',$options['name'],\PDO::PARAM_STR);
        $result->bindParam(':category_id',$options['category_id'],\PDO::PARAM_INT);
        $result->bindParam(':code',$options['code'],\PDO::PARAM_STR);
        $result->bindParam(':price',$options['price'],\PDO::PARAM_STR);
        $result->bindParam(':availability',$options['availability'],\PDO::PARAM_STR);
        $result->bindParam(':brand',$options['brand'],\PDO::PARAM_STR);
        $result->bindParam(':description',$options['description'],\PDO::PARAM_STR);
        $result->bindParam(':is_new',$options['is_new'],\PDO::PARAM_INT);
        $result->bindParam(':is_recommended',$options['is_recommended'],\PDO::PARAM_INT);
        $result->bindParam(':status',$options['status'],\PDO::PARAM_INT);

        return $result->execute();
    }


    /**
     * Returns absolute path to the image of product with specified id.
     * Supports 3 image types: .jpg, .jpeg, .png.
     * If no image is present - returns path to placeholder image.
     * @param int $id
     * @return string
     */
    public static function getImage($id) {

        $noImage = 'no-image.png';

        $path = '/upload/images/products/';

        $imageFormat = [".jpg", ".jpeg", ".png"];

        foreach ($imageFormat as $format) {

            $pathToProductImage = $path. $id . $format;

            if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {

                return $pathToProductImage;

            }
        }

        return $path . $noImage;

    }

}