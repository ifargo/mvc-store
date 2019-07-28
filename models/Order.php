<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 04.07.19
 * Time: 19:25
 */

namespace testShop\models;


class Order
{

    public static function save($userName, $userPhone, $userComment, $userId, $productsInCart) {

        $sql = "INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)";

        $products = json_encode($productsInCart);

        $result = $GLOBALS['db']->prepare($sql);
        $result->bindParam(":user_name",$userName,\PDO::PARAM_STR);
        $result->bindParam(":user_phone",$userPhone,\PDO::PARAM_STR);
        $result->bindParam(":user_comment",$userComment,\PDO::PARAM_STR);
        $result->bindParam(":user_id",$userId,\PDO::PARAM_INT);
        $result->bindParam(":products",$products,\PDO::PARAM_STR);

        return $result->execute();

    }


    public static function getOrdersList() {

        $result = $GLOBALS['db']->query("SELECT id, user_name, user_phone, date, status FROM product_order ORDER BY id DESC");

        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['user_name'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;

    }


    public static function getOrderById($id) {

        $sql = "SELECT * FROM product_order WHERE id = :id";

        $result = $GLOBALS['db']->prepare($sql);
        $result->bindParam(":id",$id,\PDO::PARAM_INT);

        $result->setFetchMode(\PDO::FETCH_ASSOC);

        $result->execute();
        return $result->fetch();

    }

    public static function updateOrderById($id, $options) {

        $sql = "UPDATE product_order SET user_name = :user_name, user_phone = :user_phone,".
            " user_comment = :user_comment, date = :date, status = :status WHERE id = :id";

        $result = $GLOBALS['db']->prepare($sql);
        $result->bindParam(':id',$id,\PDO::PARAM_STR);
        $result->bindParam(':user_name',$options['user_name'],\PDO::PARAM_STR);
        $result->bindParam(':user_phone',$options['user_phone'],\PDO::PARAM_STR);
        $result->bindParam(':user_comment',$options['user_comment'],\PDO::PARAM_STR);
        $result->bindParam(':date',$options['date'],\PDO::PARAM_STR);
        $result->bindParam(':status',$options['status'],\PDO::PARAM_INT);

        return $result->execute();

    }


    public static function removeOrderById($id) {

        $sql = "DELETE FROM product_order WHERE id = :id";

        $result = $GLOBALS['db']->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        return $result->execute();

    }


    public static function getStatusText($status){
        switch ($status) {
            case 1:
                echo "New Order";
                break;
            case 2:
                echo "Processing";
                break;
            case 3:
                echo "Packed and rolling";
                break;
            case 4:
                echo "Delivered";
        }
    }
}