<?php
/**
 * Front Controller
 */
namespace testShop;

use testShop\components\Router;
use testShop\components\Db;

// Autoload

spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = 'testShop\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/';

    // does the class use the namespace prefix?

        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            // no, move to the next registered autoloader
            return;
        }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }

});

// Error reporting

ini_set('display_errors',1);
error_reporting(E_ALL);


/**
 * Document root
 * @var string
 */
define('ROOT', dirname(__FILE__));


/**
 * Database connection accessible globally
 * @var Db
 */
global $db;
$db = Db::getConnection();


// Starting session for the cart

session_start();


// Running URI router

$router = new Router();
$router->run();


