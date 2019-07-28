<?php
use \testShop\components\AdminBase;

/**
 * Controller AdminController
 */
class AdminController extends AdminBase
{

    /**
     * Action for the main admin page
     */

    public function actionIndex() {

        self::checkAdmin();

        require_once (ROOT."/views/admin/index.php");
        return true;

    }

}