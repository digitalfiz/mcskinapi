<?php

// PHP 5.3 check just encase not using composer
if (strnatcmp(phpversion(),'5.3.0') <= 0) {
    throw new Exception('PHP v.5.3.0 or higher required for the Mincraft package.');
}


/**
 * Simple PSR-0 autoloader
 * This will setup an autoloader if your not going to use composer
 *
 * @see https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
 * @return void
 **/
function apiAutoloader($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    
    if ($lastNsPos = strripos($className, '\\'))  {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    
    $toLoad = dirname(__FILE__).'/src/'.$fileName;

    if (is_file($toLoad) === true) {
        include $toLoad;
    }
}


if(!is_file("vendor/autoload.php")) {
    // Register autoload function
    spl_autoload_register('apiAutoloader');
}
else {
    include "vendor/autoload.php";
}