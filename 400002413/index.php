<?php
    require "framework/autoloader.php";

    SessionManager::create();

    if ($_SERVER["REQUEST_METHOD"] === "GET" && $_GET == null) {
        $indexController = new IndexController();
        $indexController->run();
    }elseif (($_SERVER["REQUEST_METHOD"] === "GET" || $_SERVER["REQUEST_METHOD"] === "POST") && $_GET["controller"] == "Login") {
        if (isset($_SESSION["user"])) {
            if(SessionManager::accessible($_SESSION["user"], "login.php")){
                $loginController = new LoginController();
                $loginController->run();
            } else {
                header("Location: index.php");
            }
        }else {
            $loginController = new LoginController();
            $loginController->run();
        } 
    }elseif ($_SERVER["REQUEST_METHOD"] === "GET" && $_GET["controller"] == "Logout") {
        SessionManager::remove("user");
        SessionManager::destroy();
        header("Location: index.php");
    }elseif (($_SERVER["REQUEST_METHOD"] === "GET" || $_SERVER["REQUEST_METHOD"] === "POST") && $_GET["controller"] == "SignUp") {
        if (isset($_SESSION["user"])) {
            if(SessionManager::accessible($_SESSION["user"], "signup.php")){
                $SignUpController = new SignupController();
                $signupController->run();
            } else {
                header("Location: index.php");
            }
        }else {
            $signupController = new SignupController();
            $signupController->run();
        }
    }
?>