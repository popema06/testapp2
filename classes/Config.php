<?php


namespace classes;

/**
 * Konfigurace aplikace
 *
 * Class Config
 * @package classes
 */
class Config
{

    public const APP_BASE_URL = 'http://localhost/testapp';

    /**
     * Oznaceni vychozi slozky projektu na lokalu
     */
    public const PROJECT_FOLDER_NAME = 'testapp';

    /**
     * Oznaceni nazvu kontrolleru
     */
    public const CONTROLLER_NAME = 'controller';



    public const DEFAULT_CONTROLLER = 'Default';


    public const DEFAULT_TITLE = 'Testovací aplikace';


    /**
     * Maska nasi URL
     * @var string[]
     */
    public static $urlMasks = [
        self::CONTROLLER_NAME,
        'action',
        'id'
    ];


    public static $menuItems = [
        'default' => 'Úvod',
        'register' => 'Registrace'
    ];


    public static $dbParams = [
        'host' => 'localhost',
        'user' => 'root',
        'pass' => 'root1234',
        'db' => 'test'
    ];


}