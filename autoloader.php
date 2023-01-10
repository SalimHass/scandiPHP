<?php

spl_autoload_register(
    function ($class_name) {
        //class directories
        $directorys = array('/router/','/api/',
        '/models/',
        '/config/',
        '/dao/',

        );

        //for each directory
        $ds = "/"; //Directory Seperator
        $dir = dirname(__FILE__); //Get Current file path
        $windir = "\\"; //Windows Directory Seperator
        $path = str_replace($windir, $ds, $dir);
        $finalClassName = explode("\\", $class_name);




        foreach ($directorys as $directory) {
            if (file_exists($path . $directory . end($finalClassName) . '.php')) {
                require_once($path . $directory . end($finalClassName) . '.php');
                return;
            }
        }
    }
);
/*
ob_start();
spl_autoload_register(function ($className) {


    # List all the class directories in the array.
    $array_paths = array(
        '.',
        'api',
        'models',
        'config',
        'dao'
    );
    foreach ($array_paths as $path) {
        $file = $path . "/" . $className . ".php";
        if (file_exists($file)) {
            include_once($file);
        }
    }
});
*/
