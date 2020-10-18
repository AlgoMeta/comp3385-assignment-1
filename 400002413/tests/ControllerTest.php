<?php
    require "../framework/autoloader.php";
    use PHPUnit\Framework\TestCase;

    class ControllerTest extends TestCase{

        public function testControllerIsValid(){
            $indexController = new IndexController();
            $this->assertInstanceOf('Controller', $indexController);
        }
        
        public function testSetModel(){
            $courseModel = new CourseModel();
            $indexController = new IndexController();
            $indexController->setModel($courseModel);
            $this->assertEquals($courseModel, $indexController->getModel());
        }

        public function testSetView(){
            $tmpView = new View();
            $indexController = new IndexController();
            $indexController->setView($tmpView);
            $this->assertEquals($tmpView, $indexController->getView());
        }

        public function testGetModel(){
            $courseModel = new CourseModel();
            $indexController = new IndexController();
            $indexController->setModel($courseModel);
            $this->assertEquals($courseModel, $indexController->getModel());
        }

        public function testGetView(){
            $tmpView = new View();
            $indexController = new IndexController();
            $indexController->setView($tmpView);
            $this->assertEquals($tmpView, $indexController->getView());
        }
    }
?>