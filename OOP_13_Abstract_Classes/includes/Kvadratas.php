<?php

class Kvadratas extends Staciakampis {

        public function __construct($krastine) {
            $this->krastine["plotis"] = $krastine;
            $this->krastine["ilgis"] = $krastine;
        }
        
       public function perimetras() {
            return $this->krastine * 4;
        }

        public function plotas() {
            return pow($this->krastine, 2);
        }
}