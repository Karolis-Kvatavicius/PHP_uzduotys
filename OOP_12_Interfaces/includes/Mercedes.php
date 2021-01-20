<?php

class Mercedes implements Car {
    private $engineState = false;
    private $speed = 100;

    public function turnEngineOn() {
        $this->engineState = true;
        return $this->engineState;
    }

    public function countTripTime($dist) {
        return $dist/$this->speed;
    }
}