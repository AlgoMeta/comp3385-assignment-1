<?php
    class Validator{
        
        public static function emailIsValid($email):bool{
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
            return false;
        }

        public static function passwordsMatch($password, $repassword):bool{
            if ($password == $repassword) {
                return true;
            }
            return false;
        }

        public static function passwordIsValid($password):bool{
            if (strlen($password) < 10) {
                return false;
            } else if(!preg_match('/[A-Z]/', $password)){
                return false;
            } else if(!preg_match('/\d/',$password)){
                return false;
            }
            return true;
        }
    }
    
?>