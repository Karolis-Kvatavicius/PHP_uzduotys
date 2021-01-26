<?php

class Ryklys extends PlaukiojantysGyvunai {

    private $dantuAstrumas;
    
    function __construct($svoris, $regionas, $dantuAstrumas)
    {
        $this->svoris = $svoris;
        $this->regionas = $regionas;
        $this->dantuAstrumas = $dantuAstrumas;
    }

    function valgo($obj) {
        if(get_class($obj) == "Tunas") {
            echo get_class($obj)." suvalgytas<br>";
            if($obj->getSvoris() * 100 / $this->svoris < 1) {
                echo get_class($this)." vis dar alkanas<br>";
            }
            $this->svoris += $obj->getSvoris();
            // unset($obj);
        } else {
            echo get_class($obj)." nevalgomas<br>";
        }
    }

    function plaukioja()
    {
        return "Plaukioja";
    }
}