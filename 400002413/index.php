<?php
    require "framework/autoloader.php";

    SessionManager::create();

    if ($_SERVER["REQUEST_METHOD"] === "GET" && $_GET == null) {
        $indexController = new IndexController();
        $indexController->run();
    }elseif (($_SERVER["REQUEST_METHOD"] === "GET" || $_SERVER["REQUEST_METHOD"] === "POST") && $_GET["controller"] == "Login") {
        if (isset($_SESSION["user"])) {
            if(SessionManager::accessible($_SESSION["user"], "login")){
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
            if(SessionManager::accessible($_SESSION["user"], "signup")){
                $SignUpController = new SignupController();
                $signupController->run();
            } else {
                header("Location: index.php");
            }
        }else {
            $signupController = new SignupController();
            $signupController->run();
        }
    }elseif ($_SERVER["REQUEST_METHOD"] === "GET" && $_GET["controller"] == "Courses") {
        if (isset($_SESSION["user"])) {
            if(SessionManager::accessible($_SESSION["user"], "courses")){
                $coursesController = new CoursesController();
                $coursesController->run();
            } else {
                header("Location: index.php");
            }
        }else {
            header("Location: index.php");
        }
    }elseif ($_SERVER["REQUEST_METHOD"] === "GET" && $_GET["controller"] == "Profile") {
        if (isset($_SESSION["user"])) {
            if(SessionManager::accessible($_SESSION["user"], "profile")){
                $profileController = new ProfileController();
                $profileController->run();
            } else {
                header("Location: index.php");
            }
        }else {
            header("Location: index.php");
        }
    }
?>