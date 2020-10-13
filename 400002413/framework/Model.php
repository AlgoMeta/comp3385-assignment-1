<?php
    abstract class Model implements Observable{
        private $observers;
        private $data;
        protected $absolutePath;

        function __construct(){
            $this->observers = array();
            $this->data = array();
            $this->absolutePath = dirname(dirname(realpath(__FILE__)));
        }

        abstract public function getAll():array;
        abstract public function getRecord(string $id):array;

        public function setData(array $d){
            $this->data = $d;
        }

        public function getData():array{
            return $this->data;
        }

        public function getObservers():array{
            return $this->observers;
        }

        public function attach(Observer $observer):void{
            array_push($this->observers, $observer);
        }

        public function detach(Observer $observer):void{
            if (($key = array_search($observer, $this->observers)) !== false) {
                unset($this->observers[$key]);
            }
        }

        public function notify():void{
            foreach($this->observers as $obs){
                $obs->update($this);
            }
        }

    }
?>