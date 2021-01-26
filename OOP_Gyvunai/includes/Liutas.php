<?php

class Liutas extends Mesedziai {
    
    function __construct($svoris, $regionas, $dantuAstrumas)
    {
        $this->svoris = $svoris;
        $this->regionas = $regionas;
        $this->dantuAstrumas = $dantuAstrumas;
    }
}