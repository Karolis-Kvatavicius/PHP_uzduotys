<?php

abstract class Gyvunai {

    protected $svoris;
    protected $regionas;

    function getSvoris()
    {
        return $this->svoris;
    }

    abstract function valgo($obj);
}