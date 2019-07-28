<?php
namespace testShop\components;

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = require_once(ROOT . '/config/routes.php'); // мб надо юзать include хз почему
    }

    private function getURI(){
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }



    public function run()
        /**
         * Отвечает за выбор правильного контроллера
         * для формирования ответа пользователю
         */
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~^$uriPattern$~", $uri)){ // был ~$uriPattern~

                // Определение имени контроллера и имени метода (action) для последующего вызова

                $internalRoute = preg_replace("~$uriPattern~",$path,$uri); // В uri меняем все совпадения с указ. паттерном из path


                $segments = explode('/',$internalRoute); // Массив с элементами uri без '/'


                $controllerName = ucfirst(array_shift($segments)).'Controller';

                $actionName = 'action'.ucfirst(array_shift($segments));


                // Загрузка файлов


                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if (file_exists($controllerFile)){
                    require_once ($controllerFile);
                }


                // Создание объекта класса и вызов необх. методов из него


                $controllerObject = new $controllerName;


                $result = call_user_func_array(array($controllerObject, $actionName), $segments);

                if ($result != null){
                    break;
                }


            }

        }

    }
}