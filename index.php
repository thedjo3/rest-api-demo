<?php
    header('Access-Control-Allow-Origin: *'); // allows access from everywhere to the resource
    header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS"); // allowed methods
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization"); // allowed headers
    header('Content-Type: application/json'); // the allowed request body format

    require_once "init.php";
