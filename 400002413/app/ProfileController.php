<?php
    class ProfileController extends Controller{
        public function run():void{
            $this->setModel(new UserModel());
            $this->setView(new View());
            $this->getView()->setTemplate("tpl/profile.tpl.php");
            $this->getModel()->attach($this->getView());
            $this->getModel()->setData($this->getModel()->getCourses());
            $this->getModel()->notify();
            $this->getView()->display();
        }
    }
?>