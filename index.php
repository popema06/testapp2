<?php
// Studijní verze vývoje webové aplikace
// Výchozí přístupový bod aplikace index.php

// Připojení generovaného autoloaderu composerem
// Určeno pro balíčky /vendor
require 'vendor/autoload.php';

// Init laděnky
use Tracy\Debugger;
Debugger::enable(Debugger::DETECT, __DIR__ . '/log');


// Autoloader pro vlastní třídy naší aplikace
spl_autoload_register(static function ($class) {
    $classPath = __DIR__ . '/' . $class . '.php';
    $classPath = str_replace('\\', '/', $classPath);

    if (file_exists($classPath)) {
        require $classPath;
    } else {
        Debugger::log('Autoload pro neexistující třídu: '. $class, 'critical');
        throw new Exception('Neexistující třída: '. $class);
    }
});

// https://www.itnetwork.cz/php/oop/php-tutorial-uvod-do-objektove-orientovaneho-programovani
// Inicialialilzace objektu třídy request
$request = new \classes\Request();
Debugger::barDump($request->getUrlPart(\classes\Config::CONTROLLER_NAME), \classes\Config::CONTROLLER_NAME);


// Vložení datového souboru
// Ten obsahuje i vložení hlavičky (inc/head.php)
require_once 'data/default.php';


// Vložení patičky
require_once 'inc/bottom.php';