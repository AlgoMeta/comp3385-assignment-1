<?php

    class CourseModel extends Model{
        public function getAll():array{
            $data = file_get_contents($this->absolutePath . "/" . "data/courses.json");
            return json_decode($data,true);
        }

        public function getRecord(string $id):array{
            $data = file_get_contents($this->absolutePath . "/" . "data/courses.json");
            $records = json_decode($data,true);

            foreach($records as $record){
                if ($record["course_id"] == $id) {
                    return $record;
                }
            }
            return array();
        }

        public function getAllWithInstructors():array{
            $records = $this->getAll();
            $courseInstructor = $this->getCourseInstructor();
            $instructors = $this->getInstructors();
            $facultyDepartment = $this->getFacultyDepartment();
            $facultyDeptCourses = $this->getFacultyDeptCourses();

            for ($i=0; $i < sizeof($records); $i++) { 
                for ($j=0; $j < sizeof($courseInstructor); $j++) { 
                    for ($k=0; $k < sizeof($instructors); $k++) { 
                        if ($records[$i]["course_id"] == $courseInstructor[$j]["course_id"] && $courseInstructor[$j]["instructor_id"] == $instructors[$k]["instructor_id"]) {
                            $records[$i]["instructor_name"] = $instructors[$k]["instructor_name"];
                        }
                    }
                }
            }

            for ($i=0; $i < sizeof($records); $i++) { 
                for ($j=0; $j < sizeof($facultyDeptCourses); $j++) { 
                    for ($k=0; $k < sizeof($facultyDepartment); $k++) { 
                        if ($records[$i]["course_id"] == $facultyDeptCourses[$j]["course_id"] && $facultyDeptCourses[$j]["faculty_dept_id"] == $facultyDepartment[$k]["faculty_dept_id"]) {
                            $records[$i]["faculty_dept_name"] = $facultyDepartment[$k]["faculty_dept_name"];
                        }
                    }
                }
            }
            return $records;
        }

        public function getCourseInstructor():array{
            $data = file_get_contents($this->absolutePath . "/" . "data/course_instructor.json");
            return json_decode($data,true);
        }

        public function getInstructors():array{
            $data = file_get_contents($this->absolutePath . "/" . "data/instructors.json");
            return json_decode($data,true);
        }

        public function getFacultyDeptCourses():array{
            $data = file_get_contents($this->absolutePath . "/" . "data/faculty_dept_courses.json");
            return json_decode($data,true);
        }

        public function getFacultyDepartment():array{
            $data = file_get_contents($this->absolutePath . "/" . "data/faculty_department.json");
            return json_decode($data,true);
        }

        public function getMostPopular():array{
            $records = $this->getAll();
            $courseInstructor = $this->getCourseInstructor();
            $instructors = $this->getInstructors();

            for ($i=0; $i < sizeof($records); $i++) { 
                for ($j=0; $j < sizeof($courseInstructor); $j++) { 
                    for ($k=0; $k < sizeof($instructors); $k++) { 
                        if ($records[$i]["course_id"] == $courseInstructor[$j]["course_id"] && $courseInstructor[$j]["instructor_id"] == $instructors[$k]["instructor_id"]) {
                            $records[$i]["instructor_name"] = $instructors[$k]["instructor_name"];
                        }
                    }
                }
            }

            usort($records,function($a,$b){
                return strnatcasecmp($a['course_access_count'],$b['course_access_count']);
            });
            return array_slice(array_reverse($records),0,8);
        }

        public function getLearnerRecommended():array{
            $records = $this->getAll();
            $courseInstructor = $this->getCourseInstructor();
            $instructors = $this->getInstructors();

            for ($i=0; $i < sizeof($records); $i++) { 
                for ($j=0; $j < sizeof($courseInstructor); $j++) { 
                    for ($k=0; $k < sizeof($instructors); $k++) { 
                        if ($records[$i]["course_id"] == $courseInstructor[$j]["course_id"] && $courseInstructor[$j]["instructor_id"] == $instructors[$k]["instructor_id"]) {
                            $records[$i]["instructor_name"] = $instructors[$k]["instructor_name"];
                        }
                    }
                }
            }
            usort($records,function($a,$b){
                return strnatcasecmp($a['course_recommendation_count'],$b['course_recommendation_count']);
            });
            return array_slice(array_reverse($records),0,8);
        }
    }
?>