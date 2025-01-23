<?php
function autoload($classname){
    require '../'.str_replace('\\','/',$classname) . '.php';
    //echo $classname . '.php';

}
spl_autoload_register('autoload');