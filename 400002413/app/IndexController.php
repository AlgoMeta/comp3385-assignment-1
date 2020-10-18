<?php
    class IndexController extends Controller{
        public function run():void{
            $this->setModel(new CourseModel());
            $this->setView(new View());
            $this->getView()->setTemplate("tpl/index.tpl.php");
            $this->getModel()->attach($this->getView());
            $this->getModel()->setData($this->getModel()->getMostPopular());
            $this->getModel()->notify();
            $this->getModel()->setData($this->getModel()->getLearnerRecommended());
            $this->getModel()->notify();
            $this->getView()->display();
        }
    }
?>