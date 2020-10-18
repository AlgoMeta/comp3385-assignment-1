<?php
    require "../framework/autoloader.php";
    use PHPUnit\Framework\TestCase;

    class ModelTest extends TestCase{

        public function testModelIsValid(){
            $courseModel = new CourseModel();
            $this->assertInstanceOf('Model', $courseModel);
        }

        public function testAttachMethod(){
            $courseModel = new CourseModel();
            $indexView = new View();
            $courseModel->attach($indexView);
            $this->assertEquals($indexView, $courseModel->getObservers()[0]);
        }

        public function testDetachMethod(){
            $courseModel = new CourseModel();
            $indexView = new View();
            $courseModel->attach($indexView);
            $courseModel->detach($indexView);
            $this->assertEquals(array(), $courseModel->getObservers());
        }

        public function testNotifyMethod(){
            $data = file_get_contents("../data/courses.json");
            $records = json_decode($data,true);
            $courseModel = new CourseModel();
            $indexView = new View();
            $courseModel->attach($indexView);
            $courseModel->setData($courseModel->getAll());
            $courseModel->notify();
            $this->assertEquals($records,$indexView->getObsData()[0]);
        }

        public function testGetAllMethod(){
            $data = file_get_contents("../data/courses.json");
            $records = json_decode($data,true);
            $courseModel = new CourseModel();
            $this->assertEquals($courseModel->getAll(),$records);
        }

        public function testGetRecord(){
            $data = file_get_contents("../data/courses.json");
            $records = json_decode($data,true);
            $randomNumber = rand();
            $result = array();
            $courseModel = new CourseModel();
            
            foreach($records as $record){
                if ($record["course_id"] == $randomNumber) {
                    $result = $record;
                    break;
                }
            }
        
            $this->assertEquals($result, $courseModel->getRecord($randomNumber));
        }

        public function testGetData(){
            $courseModel = new CourseModel();
            $tmpArray = [1, 2, 3, 4, 5];
            $courseModel->setData($tmpArray);
            $this->assertEquals($courseModel->getData(), $tmpArray);
        }

        public function testSetData(){
            $courseModel = new CourseModel();
            $tmpArray = [1, 2, 3, 4, 5];
            $courseModel->setData($tmpArray);
            $this->assertEquals($courseModel->getData(), $tmpArray);
        }

        public function testGetObservers(){
            $courseModel = new CourseModel();
            $indexView = new View();
            $courseModel->attach($indexView);
            $this->assertEquals($courseModel->getObservers()[0], $indexView);
        }

        public function testAdditionalMethods(){
            $courseModel = new CourseModel();
            $this->assertTrue(is_array($courseModel->getAllWithInstructors()));
            $this->assertTrue(is_array($courseModel->getCourseInstructor()));
            $this->assertTrue(is_array($courseModel->getInstructors()));
            $this->assertTrue(is_array($courseModel->getFacultyDeptCourses()));
            $this->assertTrue(is_array($courseModel->getFacultyDepartment()));
            $this->assertTrue(is_array($courseModel->getMostPopular()));
            $this->assertTrue(is_array($courseModel->getLearnerRecommended()));
        }
    }

?>