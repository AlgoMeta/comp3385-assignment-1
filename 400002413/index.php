<?php
    require "framework/autoloader.php";

    if ($_SERVER["REQUEST_METHOD"] === "GET" && $_GET == null) {
        $indexController = new IndexController();
        $indexController->run();
    }elseif ($_SERVER["REQUEST_METHOD"] === "GET" && $_GET["controller"] == "Login") {
        $loginController = new LoginController();
        $loginController->run();
    }
?>