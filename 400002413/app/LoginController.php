<?php
    class LoginController extends Controller{
        public function run():void{
            if ($_SERVER["REQUEST_METHOD"] === "GET"){
                $this->setView(new View());
                $this->getView()->setTemplate("tpl/login.tpl.php");
                $this->getView()->display();
            } elseif ($_SERVER["REQUEST_METHOD"] === "POST"){
                $this->setModel(new UserModel());
                $this->setView(new View());
                $this->getView()->setTemplate("tpl/login.tpl.php");
                $userInfo = $this->getModel()->getRecord($_POST["email"]);
                
                if ($userInfo == array()) {
                    $this->getView()->addVar("loginError", "Invalid email/password");
                    $this->getView()->display();
                } elseif (!password_verify($_POST["password"], $userInfo["password"])){
                    $this->getView()->addVar("loginError", "Invalid email/password");
                    $this->getView()->display();
                } else {
                    SessionManager::create();
                    SessionManager::add("user", $userInfo["email"]);
                    header("Location: index.php?controller=Profile");
                }
            }
        }
    }
?>