<?php

use testShop\models\Category;
use testShop\models\Product;

/**
 * Controller ProductController
 */
class ProductController
{


    /**
     * Action for Single Product page
     * @param int $id
     * @return bool
     */
    public function actionView($id){


        $categories = array();
        $categories = Category::getCategoriesList();

        $product = array();
        $product = Product::getProductById($id);

        require_once (ROOT.'/views/product/view.php');

        return true;

    }


}