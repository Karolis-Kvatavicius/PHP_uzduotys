<?php

class Zole {
    private $svoris;
    private $regionas;

    function __construct($svoris, $regionas)
    {
        $this->svoris = $svoris;
        $this->regionas = $regionas;
    }

    function getSvoris()
    {
        return $this->svoris;
    }
}