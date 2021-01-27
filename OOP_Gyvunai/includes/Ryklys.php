<?php

class Ryklys extends Mesedziai implements PlaukiojantysGyvunai {
    
    function __construct($svoris, $regionas, $dantuAstrumas)
    {
        $this->svoris = $svoris;
        $this->regionas = $regionas;
        $this->dantuAstrumas = $dantuAstrumas;
    }

    function plaukioja()
    {
        return "Plaukioja";
    }
}