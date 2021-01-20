<?php

function autoload_includes($class) {
    include 'includes/' . $class . '.php';
}

spl_autoload_register("autoload_includes");