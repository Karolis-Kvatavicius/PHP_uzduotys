<?php

abstract class Gyvunai {

    protected $svoris;

    function getSvoris()
    {
        return $this->svoris;
    }

    abstract function valgo($obj);
}