<?php

use testShop\models\Category;
use testShop\models\Cart;
use testShop\models\Product;
use testShop\models\User;
use testShop\models\Order;

/**
 * Controller CartController
 */
class CartController {


    /**
     * Action for Cart page
     * @return bool
     */
    public function actionIndex() {

        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = false;

        $productsInCart = Cart::getProducts();

        if ($productsInCart) {

            $productsIds = array_keys($productsInCart);

            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice();

        }

        require_once (ROOT.'/views/cart/index.php');

        return true;

    }


    /**
     * Prints total cart price
     */
    public function actionGetTotalPrice() {

        echo Cart::getTotalPrice();
    }


    /**
     * Adds a specified product to the cart
     * @param int $id
     */
    public function actionAdd($id) {

        $categories = array();
        $categories = Category::getCategoriesList();

        $product = array();
        $product = Product::getProductById($id);

        Cart::addProduct($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");

    }


    /**
     * Asynchronous method adding specified product to the cart
     * @param int $id
     * @return bool
     */
    public function actionAddAjax($id) {

        echo Cart::addProduct($id);
        return true;

    }


    /**
     * Action for the Checkout page
     * @return bool
     */
    public function actionCheckout() {


        $categories = array();
        $categories = Category::getCategoriesList();



        // Статус успешного оформления заказа
        $result = false;


        $userName = '';
        $userPhoneNumber = "";
        $userEmail = "";
        $userAddress = "";
        $userComment = "";

        if (isset($_POST['submit'])) {

            $userName = $_POST['userName'];
            $userPhoneNumber = $_POST['userPhoneNumber'];
            $userEmail = $_POST['userEmail'];
            $userAddress = $_POST['userAddress'];
            $userComment = $_POST['userComment'];

            $errors = false;

            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Invalid Email';
            }

            if (!User::checkName($userName)) {
                $errors[] = 'Your name should be at least 2 characters.';
            }

            if (!User::checkPhone($userPhoneNumber)) {
                $errors[] = 'Your phone number should consist of 12 dights and look like +380998672345.';
            }

            if ($errors == false) {

                $productsInCart = Cart::getProducts();

                $userId = User::checkLogged();

                $result = Order::save($userName,$userPhoneNumber,$userComment,$userId,$productsInCart);

                if ($result) {

                    $adminEmail = "danmaly95@gmail.com";
                    $message = "192.168.1.24/admin/order";
                    $subject = "You have a new order";
                    mail($adminEmail, $subject, $message);

                    Cart::clear();

                    require_once (ROOT.'/views/cart/checkout.php');
                }

            } else {

                $productsInCart = false;

                $productsInCart = Cart::getProducts();

                if ($productsInCart) {
                    $productsIds = array_keys($productsInCart);

                    $products = Product::getProductsByIds($productsIds);

                    $totalPrice = Cart::getTotalPrice();
                }

                require_once (ROOT.'/views/cart/checkout.php');

            }

        } else {

            $productsInCart = false;

            $productsInCart = Cart::getProducts();

            if ($productsInCart) {
                $productsIds = array_keys($productsInCart);

                $products = Product::getProductsByIds($productsIds);

                $totalPrice = Cart::getTotalPrice();

                if (User::checkLogged()) {

                    $user = User::getUserById($_SESSION['user']);

                    $userName = $user['name'];
                    $userPhoneNumber = $user['phone_number'];
                    $userEmail = $user['email'];
                    $userAddress = $user['address'];

                    require_once (ROOT.'/views/cart/checkout.php');

                } else {

                    require_once (ROOT.'/views/cart/checkout.php');
                    return true;
                }

            } else {

                header('Location: /catalog/');

            }

        }
        return false;
    }


    /**
     * Removes specified product from cart
     * @param int $id
     */
    public function actionRemove($id) {

        Cart::removeProduct($id);

        header('Location: /cart/');

    }

}