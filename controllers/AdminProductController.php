<?php
use \testShop\components\AdminBase;
use \testShop\models\Product;
use \testShop\models\Category;

/**
 * Controller AdminProductController
 */
class AdminProductController extends AdminBase
{
    /**
     * Action method for "Manage Products" page in Admin panel
     */
    public function actionIndex() {

        self::checkAdmin();

        $productsList = Product::getProductsList();

        require_once (ROOT."/views/admin/admin_product/index.php");
        return true;

    }

    /**
     * Action method for "Create product" page in Admin panel
     */
    public function actionCreate() {

        self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();

        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            $errors = false;


            if (!isset($options['name']) or empty($options['name'])) {
                $errors[] = "Please input name";
            }


            if ($errors == false) {

                $id = Product::createProduct($options);

                if ($id) {

                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpg");
                    }

                }

                header("Location: /admin/product");
            }
        }

        if (isset($_POST['submit-next'])) {

            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            $errors = false;


            if (!isset($options['name']) or empty($options['name'])) {
                $errors[] = "Please input name";
            }


            if ($errors == false) {

                $id = Product::createProduct($options);

                if ($id) {

                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        if (preg_match("~.jpg~",$_FILES["image"]["name"])) {
                            move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpg");

                        } elseif (preg_match("~.jpeg~",$_FILES["image"]["name"])) {
                            move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpeg");

                        } elseif (preg_match("~.png~",$_FILES["image"]["name"])) {
                            move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.png");
                        }
                    }

                }

                header("Location: /admin/product/create");
            }
        }

        require_once(ROOT . "/views/admin/admin_product/create.php");
        return true;

    }

    /**
     * Action method to update existing product
     */
    public function actionUpdate($id) {

        self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();

        $product = Product::getProductById($id);

        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];


            if (Product::updateProductById($id, $options)) {

                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // If the image with name $id already exists on server - delete it and upload new one to avoid duplication

                    $imageFormat = [".jpg", ".jpeg", ".png"];

                    $path = '/upload/images/products/';

                    foreach ($imageFormat as $format) {

                        $pathToProductImage = $_SERVER['DOCUMENT_ROOT'].$path. $id . $format;

                        if (file_exists($pathToProductImage)) {

                            unlink($pathToProductImage);

                        }
                    }


                    if (preg_match("~.jpg~",$_FILES["image"]["name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpg");

                    } elseif (preg_match("~.jpeg~",$_FILES["image"]["name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpeg");

                    } elseif (preg_match("~.png~",$_FILES["image"]["name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.png");

                    }
                }

            }

//                header("Location: /admin/product");
        }

        require_once(ROOT . "/views/admin/admin_product/update.php");
        return true;

    }

    /**
     * Action method for "Delete product" tab in Admin panel
     */
    public function actionDelete($id) {

        self::checkAdmin();

        if (isset($_POST['submit'])) {

            Product::removeProductById($id);

         header("Location: /admin/product");
        }

        require_once(ROOT . "/views/admin/admin_product/remove.php");
        return true;

    }
}