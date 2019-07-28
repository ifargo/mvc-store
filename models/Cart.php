<?php
/**
 * Class for managing cart items
 */
namespace testShop\models;


class Cart
{

    /**
     * Adds cart product into the 'products' session
     * and returns the total number of products in cart
     * @param int $id
     * @return int
     */
    public static function addProduct($id) {

        $id = intval($id);

        // Products array
        $productsInCart = array();

        if (isset($_SESSION['products'])) {
            // Filling it up with products
            $productsInCart = $_SESSION['products'];

        }

        // If such products is already in the cart, raise it's quantity by 1
        if (array_key_exists($id, $productsInCart)) {

            $productsInCart[$id] ++;

        } else {
            // Adding new product to the cart
            $productsInCart[$id] = 1;

        }

        // Refreshing session with new product
        $_SESSION['products'] = $productsInCart;

        return self::countItems();
    }

    /**
     * Deletes the specified product from cart
     * @param int $id
     */
    public static function removeProduct($id) {

        $id = intval($id);

        if (isset($_SESSION['products'])) {

            $productsInCart = $_SESSION['products'];

            if (array_key_exists($id, $productsInCart)) {
                unset($productsInCart[$id]);
                $_SESSION['products'] = $productsInCart;
            }
        }
    }

    /**
     * Counts the total amount of items in cart
     * @return int
     */
    public static function countItems() {

        if (isset($_SESSION['products'])) {

            $count = 0;

            foreach ($_SESSION['products'] as $id => $quantity) {

                $count = $count + $quantity;

            }
            return $count;

        } else {

            return 0;

        }

    }

    /**
     * Returns the array of products in cart with the following pattern:
     * $productId => $quantity
     * @return bool|mixed
     */
    public static function getProducts() {

        if (isset($_SESSION['products'])) {

            return $_SESSION['products'];
        }

        return false;

    }

    /**
     * Returns total price of items in cart
     * @return float|int
     */
    public static function getTotalPrice() {

        $productsInCart = false;

        // Getting the products array with format $productId => $quantity
        $productsInCart = self::getProducts();

        $total = 0;

        if ($productsInCart) {

            // Getting product ids
            $productsIds = array_keys($productsInCart);

            // Getting product objects with id and price
            $products = Product::getProductsByIds($productsIds);

            foreach ($products as $item) {
                // $totalPrice = $totalPrice + ($price * $quantity)
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    /**
     * Deletes all products from cart
     */
    public static function clear() {

        if (isset($_SESSION['products'])) {

            unset($_SESSION['products']);

        }
    }
}