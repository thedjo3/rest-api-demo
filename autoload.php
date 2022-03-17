<?php
    spl_autoload_register(function($className) {
        $file = APPLICATION_PATH . "classes/" .$className . '.php';
        if (file_exists($file)) {
            require $file;
        }
    });
