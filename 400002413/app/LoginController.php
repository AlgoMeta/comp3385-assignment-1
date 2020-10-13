<?php
    class LoginController extends Controller{
        public function run():void{
            // $this->setModel(new IndexModel());
            // $this->setView(new View());
            // $this->getView()->setTemplate("tpl/index.tpl.php");
            // $this->getModel()->attach($this->getView());
            // $this->getModel()->setData($this->getModel()->getMostPopular());
            // $this->getModel()->notify();
            // $this->getModel()->setData($this->getModel()->getLearnerRecommended());
            // $this->getModel()->notify();
            // $this->getView()->display();
            require "tpl/login.tpl.php";
        }
    }
?>