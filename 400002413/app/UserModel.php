<?php

    class UserModel extends Model{
        public function getAll():array{
            $data = file_get_contents($this->absolutePath . "/" . "data/users.json");
            return json_decode($data,true);
        }

        public function getRecord(string $id):array{
            $data = file_get_contents($this->absolutePath . "/" . "data/users.json");
            $records = json_decode($data,true);

            foreach($records as $record){
                if ($record["email"] == $id) {
                    return $record;
                }
            }
            return array();
        }

        public function getUserCourses():array{
            $data = file_get_contents($this->absolutePath . "/" . "data/user_courses.json");
            return json_decode($data,true);
        }

        public function getCourses():array{
            $courseModel = new CourseModel();
            $courses = $courseModel->getAllWithInstructors();
            $userCourses = $this->getUserCourses();
            $userCoursesWithInstructors = array();

            for ($i=0; $i < sizeof($courses); $i++) { 
                for ($j=0; $j < sizeof($userCourses); $j++) { 
                    if ($courses[$i]["course_id"] == $userCourses[$j]["course_id"] && $userCourses[$j]["email"] == $_SESSION["user"]) {
                        array_push($userCoursesWithInstructors, $courses[$i]);
                    }
                }
            }
            return $userCoursesWithInstructors;
        }

        public function update(array $newRecord):void{
            $records = $this->getAll();
            array_push($records, $newRecord);
            file_put_contents($this->absolutePath . "/" . "data/users.json", json_encode($records));
        }
    }
?>