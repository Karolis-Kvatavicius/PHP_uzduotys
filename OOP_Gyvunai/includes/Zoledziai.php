<?php

abstract class Zoledziai extends Gyvunai {
    function valgo($obj) {
        if(get_class($obj) == "Zole") {
            if($obj->getSvoris() * 100 / $this->svoris < 1) {
                echo get_class($this)." vis dar alkanas<br>";
            }
            $this->svoris += $obj->getSvoris();         
            echo get_class($obj)." suvalgytas<br>";
            unset($obj);
        } else if (get_class($obj) == "Liutas") {
            $obj->valgo($this);
            // unset($this);
        } else {
            echo get_class($obj)." nevalgomas<br>";
        }
    }
}