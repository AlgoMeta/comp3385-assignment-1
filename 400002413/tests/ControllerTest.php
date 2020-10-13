<?php
    require "../framework/autoloader.php";
    use PHPUnit\Framework\TestCase;

    class ControllerTest extends TestCase{

        public function testControllerIsValid(){
            $indexController = new IndexController();
            $this->assertInstanceOf('Controller', $indexController);
        }
        
        public function testSetModel(){
            $indexModel = new IndexModel();
            $indexController = new IndexController();
            $indexController->setModel($indexModel);
            $this->assertEquals($indexModel, $indexController->getModel());
        }

        public function testSetView(){
            $tmpView = new View();
            $indexController = new IndexController();
            $indexController->setView($tmpView);
            $this->assertEquals($tmpView, $indexController->getView());
        }

        public function testGetModel(){
            $indexModel = new IndexModel();
            $indexController = new IndexController();
            $indexController->setModel($indexModel);
            $this->assertEquals($indexModel, $indexController->getModel());
        }

        public function testGetView(){
            $tmpView = new View();
            $indexController = new IndexController();
            $indexController->setView($tmpView);
            $this->assertEquals($tmpView, $indexController->getView());
        }
    }
?>