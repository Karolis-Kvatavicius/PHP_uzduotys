<?php

abstract class Mesedziai extends Gyvunai
{

    protected $dantuAstrumas;

    function valgo($obj)
    {
        if (get_parent_class($obj) == "Zoledziai" && class_implements($obj) === class_implements($this)) {
            echo get_class($obj) . " suvalgytas<br>";
            if ($obj->getSvoris() * 100 / $this->svoris < 1) {
                echo get_class($this) . " vis dar alkanas<br>";
            }
            $this->svoris += $obj->getSvoris();
        } else {
            echo get_class($obj) . " nevalgomas<br>";
        }
    }
}
