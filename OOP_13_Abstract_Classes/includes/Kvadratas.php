<?php

class Kvadratas extends Forma {

        private $krastine;

        public function __construct($krastine) {
            $this->krastine = $krastine;
        }
        
       public function perimetras() {
            return $this->krastine * 4;
        }

        public function plotas() {
            return pow($this->krastine, 2);
        }
}