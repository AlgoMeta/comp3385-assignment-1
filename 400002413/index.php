<?php
    require "framework/autoloader.php";
    
    $indexController = new IndexController();

    if ($_SERVER["REQUEST_METHOD"] === "GET" && $_GET == null) {
        $indexController->run();
    }
?>