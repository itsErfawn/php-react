<?php

spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/';
    $classPath = str_replace('\\', '/', $class);
    $file = $baseDir . $classPath . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});
