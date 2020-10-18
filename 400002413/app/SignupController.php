<?php
    class SignupController extends Controller{
        public function run():void{
            if ($_SERVER["REQUEST_METHOD"] === "GET"){
                $this->setView(new View());
                $this->getView()->setTemplate("tpl/signup.tpl.php");
                $this->getView()->display();
            } elseif ($_SERVER["REQUEST_METHOD"] === "POST"){
                $this->setModel(new UserModel());
                $this->setView(new View());
                $this->getView()->setTemplate("tpl/signup.tpl.php");
                $errorArray = array();

                if (!Validator::emailIsValid($_POST["email"])) {
                    array_push($errorArray, "Email is invalid");
                }
                if (!Validator::passwordsMatch($_POST["password"], $_POST["repassword"])) {
                    array_push($errorArray, "Passwords do not match");
                }
                if (!Validator::passwordIsValid($_POST["password"])) {
                    array_push($errorArray, "Password is invalid");
                }
                if (!isset($_POST["agree"])) {
                    array_push($errorArray, "Please agree to terms");
                }

                if ($errorArray == array()) {
                    SessionManager::create();
                    SessionManager::add("signupmsg", "Sign Up Successful. Please login below");
                    $newRecord = array(
                        "name" => $_POST["fullname"],
                        "email" => $_POST["email"],
                        "password" => password_hash($_POST["password"], PASSWORD_DEFAULT)
                    );
                    $this->getModel()->update($newRecord);
                    header("Location: index.php?controller=Login");
                } else {
                    $this->getView()->addVar("errorArray", $errorArray);
                    $this->getView()->display();
                }
            }
        }
    }
?>