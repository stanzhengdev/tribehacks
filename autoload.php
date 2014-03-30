<?php
function autoloader($class_name) 
{
    $filename ='application/' . str_replace('_', DIRECTORY_SEPARATOR, strtolower($class_name)).'.php';

    $file = $filename;

    if ( ! file_exists($file))
    {
        return false;
    }
    include $file;
}

spl_autoload_register('autoloader');