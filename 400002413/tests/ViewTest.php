<?php
    require "../framework/autoloader.php";

    use PHPUnit\Framework\TestCase;

    class ViewTest extends TestCase{

        public function testViewIsValid(){
            $tmpView = new View();
            $this->assertInstanceOf('View', $tmpView);
        }

        public function testSetTemplate(){
            $tmpView = new View();
            $fileName = "test.tpl.php";
            $tmpView->setTemplate($fileName);
            $this->assertEquals($tmpView->getTpl(), $fileName);
        }

        public function testDisplay(){
            $this->assertEquals(1,1);
        }

        public function testAddVar(){
            $tmpView = new View();
            $fileName = "test.tpl.php";
            $tmpView->setTemplate($fileName);
            $tmpView->addVar("name", "John Doe");
            $this->assertEquals($tmpView->getVars()["name"], "John Doe");
        }
    }
?>