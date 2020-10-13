<?php
    spl_autoload_register(function ($class) {
        $absolutePath = dirname(dirname(realpath(__FILE__)));
        $requiredClass = array(
            "app"=>$absolutePath ."/". "app/" . $class . ".php", 
            "framework"=>$absolutePath ."/". "framework/" . $class . ".php", 
            "tpl"=>$absolutePath ."/". "tpl/" . $class . ".php",
            "data"=>$absolutePath ."/". "data/" . $class . ".php"
        );

        foreach ($requiredClass as $name => $class) {
            if (file_exists($class)) {
                require $class;
            }
        }
    });
?>