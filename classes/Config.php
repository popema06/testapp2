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
     * Oznaceni vychozi slozky projektu na lokalu
     */
    public const PROJECT_FOLDER_NAME = 'testapp';

    /**
     * Oznaceni nazvu kontrolleru
     */
    public const CONTROLLER_NAME = 'controller';


    /**
     * Maska nasi URL
     * @var string[]
     */
    public static $urlMasks = [
        self::CONTROLLER_NAME,
        'action',
        'id'
    ];


}