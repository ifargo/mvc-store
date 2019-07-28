<?php
use \testShop\components\AdminBase;
use \testShop\models\Product;
use \testShop\models\Order;

/**
 * Controller AdminOrderController
 */
class AdminOrderController extends AdminBase
{

    /**
     * Action method for "Manage Orders" page in Admin panel
     */
    public function actionIndex() {

        self::checkAdmin();

        $ordersList = Order::getOrdersList();

        require_once (ROOT."/views/admin/admin_order/index.php");
        return true;

    }

    /**
     * Action method for "View order" page in Admin panel
     */
    public function actionView($id) {

        self::checkAdmin();

        $order = Order::getOrderById($id);

        print_r($order['products']);

        $productQuantity = json_decode($order['products'], true);

        $productIds = array_keys($productQuantity);

        $productsList = Product::getProductsByIds($productIds);

        require_once(ROOT . "/views/admin/admin_order/view.php");
        return true;

    }

    /**
     * Action method to update existing order
     *
     */
    public function actionUpdate($id) {

        self::checkAdmin();

        $order = Order::getOrderById($id);


        if (isset($_POST['submit'])) {

            $options['user_name'] = $_POST['user_name'];
            $options['user_phone'] = $_POST['user_phone'];
            $options['user_comment'] = $_POST['user_comment'];
            $options['date'] = $_POST['date'];
            $options['status'] = $_POST['status'];

            $errors = false;


            if (!isset($options['user_name']) or empty($options['user_name'])) {
                $errors[] = "Please input name";
            }

            if ($errors == false) {

                Order::updateOrderById($id, $options);

                header("Location: /admin/order");
            }
        }

        require_once(ROOT . "/views/admin/admin_order/update.php");
        return true;

    }

    /**
     * Action method for "Delete order" tab in Admin panel
     */
    public function actionDelete($id) {

        self::checkAdmin();

        $order = Order::getOrderById($id);

        if (isset($_POST['submit'])) {

            Order::removeOrderById($id);

            header("Location: /admin/order");
        }

        require_once(ROOT . "/views/admin/admin_order/remove.php");
        return true;

    }

}