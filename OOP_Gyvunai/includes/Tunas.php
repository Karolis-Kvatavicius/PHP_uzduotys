<?php

class Tunas extends PlaukiojantysGyvunai {
    
    function __construct($svoris)
    {
        $this->svoris = $svoris;
    }

    function valgo($obj) {
        if(get_class($obj) == "Zole") {
            echo get_class($obj)." suvalgytas<br>";
            if($obj->getSvoris() * 100 / $this->svoris < 1) {
                echo get_class($this)." vis dar alkanas<br>";
            }
            $this->svoris += $obj->getSvoris();
            unset($obj);
        } else if (get_class($obj) == "Ryklys") {
            $obj->valgo($this);
            // unset($this);
        }  else {
            echo get_class($obj)." nevalgomas<br>";
        }
    }

    function plaukioja()
    {
        return "Plaukioja";
    }
}