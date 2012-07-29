<?php

    spl_autoload_register(function($class)
    {
        $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';

        if (file_exists($path)) {
            require $path;
        }
    });
