<?php
spl_autoload_register(function ($class) {
    $controllers = __DIR__ .'/';
    $file = $controllers . $class .'.php';
    if (file_exists($file)) {
        require $file;
    }

    $controllers = __DIR__ .'/../../app/controllers/';
    $file = $controllers . $class .'.php';
    if (file_exists($file)) {
        require $file;
    }

    $models = __DIR__ .'/../../app/models/';
    $file = $models . $class .'.php';
    if (file_exists($file)) {
        require $file;
    }
});