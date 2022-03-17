<?php
    //    error_reporting(E_ERROR);
    require_once("constants.php");
    require_once "autoload.php";
    try {
        // app object
        // ....
        // router object
        $router = new Router();
        $controller = new Controller($router->method, $router->module, $router->id);
        $controller -> processRequest();
    }catch (Exception $e){
        echo $e->getMessage();
    }
