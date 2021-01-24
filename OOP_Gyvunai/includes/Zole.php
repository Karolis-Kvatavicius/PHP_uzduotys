<?php

class Zole {
    private $svoris;

    function __construct($svoris)
    {
        $this->svoris = $svoris;
    }

    function getSvoris()
    {
        return $this->svoris;
    }
}