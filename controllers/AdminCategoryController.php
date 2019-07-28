<?php
use \testShop\components\AdminBase;
use \testShop\models\Category;

/**
 * Controller AdminCategoryController
 */
class AdminCategoryController extends AdminBase
{
    /**
     * Action method for "Manage Categories" page in Admin panel
     */
    public function actionIndex() {

        self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();

        require_once (ROOT."/views/admin/admin_category/index.php");
        return true;

    }

    /**
     * Action method for "Create category" page in Admin panel
     */
    public function actionCreate() {

        self::checkAdmin();

        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];

            $errors = false;


            if (!isset($options['name']) or empty($options['name'])) {
                $errors[] = "Please input name";
            }


            if ($errors == false) {

                Category::createCategory($options);

                header("Location: /admin/category");
            }
        }

        if (isset($_POST['submit-next'])) {

            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];

            $errors = false;


            if (!isset($options['name']) or empty($options['name'])) {
                $errors[] = "Please input name";
            }


            if ($errors == false) {

                Category::createCategory($options);

                header("Location: /admin/category/create");
            }
        }

        require_once(ROOT . "/views/admin/admin_category/create.php");
        return true;

    }

    /**
     * Action method to update existing category
     */
    public function actionUpdate($id) {

        self::checkAdmin();

        $category = Category::getCategoryById($id);


        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];

            $errors = false;


            if (!isset($options['name']) or empty($options['name'])) {
                $errors[] = "Please input name";
            }

            if ($errors == false) {

                Category::updateCategory($id, $options);

                header("Location: /admin/category");
            }
        }

        require_once(ROOT . "/views/admin/admin_category/update.php");
        return true;

    }

    /**
     * Action method for "Delete category" tab in Admin panel
     */
    public function actionDelete($id) {

        self::checkAdmin();

        $category = Category::getCategoryById($id);

        if (isset($_POST['submit'])) {

            Category::removeCategoryById($id);

            header("Location: /admin/category");
        }

        require_once(ROOT . "/views/admin/admin_category/remove.php");
        return true;

    }
}