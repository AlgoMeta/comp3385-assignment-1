<?php
    
    abstract class Controller{
        protected $model;
        protected $view;
        
        function __constructor(){
            $this->model = null;
            $this->view = null;
        }

        public function setModel(Model $m):void{
            $this->model = $m;
        }

        public function setView(View $v):void{
            $this->view = $v;
        }

        public function getModel():Model{
            return $this->model;
        }

        public function getView():View{
            return $this->view;
        }

        public abstract function run():void;
    }
?>