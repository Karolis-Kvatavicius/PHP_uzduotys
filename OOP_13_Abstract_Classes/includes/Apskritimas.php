<?php

class Apskritimas extends Forma {

        private $spindulys;

        public function __construct($spindulys) {
            $this->spindulys = $spindulys;
        }

       public function perimetras() {
            return 2*M_PI*$this->spindulys;
        }

        public function plotas() {
            return M_PI*pow($this->spindulys, 2);
        }
}