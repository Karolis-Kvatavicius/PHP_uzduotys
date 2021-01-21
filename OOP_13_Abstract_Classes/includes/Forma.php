<?php

abstract class Forma {

    private $dimensijos = ["x" => 0, "y" => 0];

    abstract protected function perimetras();
    abstract protected function plotas();

    public static function kasTaiYra() {
        return "Šis objektas apibrėžia formą";
    }

    public static function grazinaDimensijuKieki() {
        return count(self::$dimensijos);
    }
}