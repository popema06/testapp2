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

    /**
     * Base URL aplikace
     */
    public const APP_BASE_URL = 'http://localhost/testapp';

    /**
     * Oznaceni vychozi slozky projektu na lokalu
     */
    public const PROJECT_FOLDER_NAME = 'testapp';

    /**
     * Oznaceni nazvu kontrolleru
     */
    public const CONTROLLER_NAME = 'controller';


    /**
     * Výchozí titulek
     */
    public const DEFAULT_TITLE = 'Testovací aplikace';

    /**
     * Výchozí controller aplikace
     */
    public const DEFAULT_CONTROLLER = 'Default';

    public const DEFAULT_ACTION = 'default';

    /**
     * http://localhost/testapp/controller/action/id
     * Maska nasi URL
     * @var string[]
     */
    public static $urlMasks = [
        self::CONTROLLER_NAME,
        'action',
        'id'
    ];



}