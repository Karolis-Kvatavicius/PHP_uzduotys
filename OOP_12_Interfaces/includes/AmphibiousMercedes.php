<?php

class AmphibiousMercedes extends Mercedes implements Car, Ship {
    private $speedOnWater = 50;
    private $anchorState = false;

    public function turnEngineOn() {
        $this->engineState = true;
        return $this->engineState;
    }

    public function countTripTime($dist) {
        return $dist/$this->speed;
    }

    public function countSailTime($dist) {
        return $dist/$this->speedOnWater;
    }

    public function throwAnchor() {
        $this->anchorState = true;
        return $this->anchorState;
    }
}