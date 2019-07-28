<?php

use testShop\models\Category;
use testShop\models\Product;
use testShop\components\Pagination;

/**
 * Controller CatalogController
 */
class CatalogController
{


    /**
     * Action for Catalog page
     * @return bool
     */
    public function actionIndex(){

        $categories = array();
        $categories = Category::getCategoriesList();

        $product = array();
        $product = Product::getLatestProducts(15);

        require_once (ROOT.'/views/catalog/index.php');


        return true;
    }


    /**
     * Action for Category page
     * @param int $categoryId
     * @param int $page
     * @return bool
     */
    public function actionCategory($categoryId, $page = 1) {

        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategoryId($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);
        // Pagination object
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT,'page-');

        require_once (ROOT.'/views/catalog/category.php');

        return true;
    }

}