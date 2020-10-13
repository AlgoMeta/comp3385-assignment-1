<?php
    require "../framework/autoloader.php";
    use PHPUnit\Framework\TestCase;

    class ModelTest extends TestCase{

        public function testModelIsValid(){
            $indexModel = new IndexModel();
            $this->assertInstanceOf('Model', $indexModel);
        }

        public function testAttachMethod(){
            $indexModel = new IndexModel();
            $indexView = new View();
            $indexModel->attach($indexView);
            $this->assertEquals($indexView, $indexModel->getObservers()[0]);
        }

        public function testDetachMethod(){
            $indexModel = new IndexModel();
            $indexView = new View();
            $indexModel->attach($indexView);
            $indexModel->detach($indexView);
            $this->assertEquals(array(), $indexModel->getObservers());
        }

        public function testNotifyMethod(){
            $data = file_get_contents("../data/courses.json");
            $records = json_decode($data,true);
            $indexModel = new IndexModel();
            $indexView = new View();
            $indexModel->attach($indexView);
            $indexModel->setData($indexModel->getAll());
            $indexModel->notify();
            $this->assertEquals($records,$indexView->getObsData()[0]);
        }

        public function testGetAllMethod(){
            $data = file_get_contents("../data/courses.json");
            $records = json_decode($data,true);
            $indexModel = new IndexModel();
            $this->assertEquals($indexModel->getAll(),$records);
        }

        public function testGetRecord(){
            $data = file_get_contents("../data/courses.json");
            $records = json_decode($data,true);
            $randomNumber = rand();
            $result = array();
            $indexModel = new IndexModel();
            
            foreach($records as $record){
                if ($record["course_id"] == $randomNumber) {
                    $result = $record;
                    break;
                }
            }
        
            $this->assertEquals($result, $indexModel->getRecord($randomNumber));
        }

        public function testGetData(){
            $indexModel = new IndexModel();
            $tmpArray = [1, 2, 3, 4, 5];
            $indexModel->setData($tmpArray);
            $this->assertEquals($indexModel->getData(), $tmpArray);
        }

        public function testSetData(){
            $indexModel = new IndexModel();
            $tmpArray = [1, 2, 3, 4, 5];
            $indexModel->setData($tmpArray);
            $this->assertEquals($indexModel->getData(), $tmpArray);
        }

        public function testGetObservers(){
            $indexModel = new IndexModel();
            $indexView = new View();
            $indexModel->attach($indexView);
            $this->assertEquals($indexModel->getObservers()[0], $indexView);
        }
    }

?>