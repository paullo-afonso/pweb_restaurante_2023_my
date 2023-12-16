<?php

require_once('../app/application.php');
use Controllers\Home;
use Core\Router;

// $controller = new Home();
// $controller->index();

$url = '/';
if(isset($_GET['url'])){
    $url = $_GET['url'];
}


$router = Router::getRouterByUrl($url);

pre($router);

if($router){
    $controller = $router->getController();
    call_user_func_array(
        [
            new $controller,
            $router->getAction()
        ],
        array_values($router->getParameteres()));
}else{
    die('Page 404');
}
