<?php

use testShop\models\Category;
use testShop\models\Product;
use testShop\models\User;

/**
 * Controller SiteController
 */
class SiteController
{


    /**
     * Action for the Home page
     * @return bool
     */
    public function actionIndex(){

        $categories = array();
        $categories = Category::getCategoriesList();

        $product = array();
        $product = Product::getLatestProducts(12);

        $recommendedProducts = array();
        $recommendedProducts = Product::getRecommendedProducts(12);

        require_once (ROOT.'/views/site/index.php');

        return true;
    }


    /**
     * Action for the Contacts page
     * @return bool
     */
    public function actionContact() {

        $categories = array();
        $categories = Category::getCategoriesList();

        $product = array();
        $product = Product::getLatestProducts(12);

        $userEmail = '';
        $userText = '';
        $userName = '';
        $userPhone = '';
        $result = false;



        if (isset($_POST['submit'])) {

            $userName = $_POST['userName'];
            $userEmail = $_POST['userEmail'];
            $userPhone = $_POST['userPhone'];
            $userText = $_POST['userText'];

            $errors = false;

            if (!User::checkEmail($userEmail)) {
                $errors[] = "Invalid E-mail.";
            }

            if ($errors == false) {

                $adminEmail = 'danieldomesticcarrier@gmail.com';
                $subject = 'Subject';
                $message = "Message: {$userText}. From {$userName} {$userEmail}. Phone {$userPhone} ";
                $result = mail($adminEmail,$subject,$message);
                $result = true;
            }
        }

        require_once (ROOT.'/views/site/contact.php');

        return true;
    }
}