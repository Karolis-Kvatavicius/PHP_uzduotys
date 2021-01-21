<?php

class Staciakampis extends Forma {

        private $krastines = ["plotis" => 1, "ilgis" => 5];

        public function __construct($plotis, $ilgis) {
            $this->krastines["plotis"] = $plotis;
            $this->krastines["ilgis"] = $ilgis;
        }
        
        function perimetras() {
            return array_sum($this->krastines);
        }

        function plotas() {
            return $this->krastines["plotis"] * $this->krastines["ilgis"];
        }
}