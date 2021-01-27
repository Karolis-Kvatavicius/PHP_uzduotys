<?php

class Tunas extends Zoledziai implements PlaukiojantysGyvunai {
    
    function __construct($svoris, $regionas)
    {
        $this->svoris = $svoris;
        $this->regionas = $regionas;
    }

    function plaukioja()
    {
        return "Plaukioja";
    }
}