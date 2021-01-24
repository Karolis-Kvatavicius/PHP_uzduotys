<?php

abstract class Mesedziai extends Gyvunai {

        function valgo($obj) {
            if(get_class($obj) == "Kiskis") {
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
}