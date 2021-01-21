<?php

abstract class Forma {

    protected $dimensijos = ["x" => 0, "y" => 0];

    abstract protected function perimetras();
    abstract protected function plotas();

    public static function kasTaiYra() {
        return "Šis objektas apibrėžia formą";
    }

    public static function grazinaDimensijuKieki() {
        return count(self::$dimensijos);
    }

    public function nustatytiDimensijas($x, $y, $z = false, $w=false) {
            $this->dimensijos["x"] = $x;
            $this->dimensijos["y"] = $y;
            ($z) ? $this->dimensijos["z"] = $z : unset($this->dimensijos["z"]));
            ($w) ? $this->dimensijos["w"] = $w : unset($this->dimensijos["w"]));
    }
}