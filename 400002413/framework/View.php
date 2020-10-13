<?php

    class View implements Observer{
        private $tpl;
        private $vars;
        private $obsData;

        public function __contruct(){
            $this->tpl = "";
            $this->vars = array();
            $this->obsData = array();
        }

        public function setTemplate($filename):void{
            $this->tpl = $filename;
        }

        public function display():void{
            if($this->vars != array()) {
                extract($this->vars);
            }
            $this->obsData;
            require $this->tpl;
        }

        public function addVar($name, $value):void{
            $this->vars[$name] = $value;
        }

        public function update(Observable $observable):void{
            if (!is_array($this->obsData)) {
                $this->obsData[] = $observable->getData();
                return;
            }
            array_push($this->obsData, $observable->getData());
        }

        public function getObsData():array{
            return $this->obsData;
        }

        public function getTpl():string{
            return $this->tpl;
        }

        public function getVars():array{
            return $this->vars;
        }
        
    }
?>