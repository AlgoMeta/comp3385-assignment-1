<?php
    class CoursesController extends Controller{
        public function run():void{
            $this->setModel(new CourseModel());
            $this->setView(new View());
            $this->getView()->setTemplate("tpl/courses.tpl.php");
            $this->getModel()->attach($this->getView());
            $this->getModel()->setData($this->getModel()->getAllWithInstructors());
            $this->getModel()->notify();
            $this->getView()->display();
        }
    }
?>