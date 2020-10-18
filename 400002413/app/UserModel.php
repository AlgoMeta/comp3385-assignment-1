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

        public function update(array $newRecord):void{
            $records = $this->getAll();
            array_push($records, $newRecord);
            file_put_contents($this->absolutePath . "/" . "data/users.json", json_encode($records));
        }
    }
?>