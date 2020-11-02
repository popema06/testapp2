<?php


namespace classes\components;

use classes\Config;

/**
 * Komponenta Menu aplikace
 */
class Menu {
    
    
    /**
     * Pole polozek menu
     * @var array 
     */
    private $menuItems;


    /**
     * Nastavení vstupních položek menu
     * @param array $menuItems
     */
    public function __construct(array $menuItems)
    {
        $this->menuItems = $menuItems;       
    }


    /**
     * Přidání nové položky menu
     * @param string $key - nazev dat. souboru
     * @param string $value - popisek odkazu
     */
    public function addMenuItem(string $key, string $value): void
    {
        $this->menuItems[$key] = $value;
    }
    
    
    /**
     * Vrátí pole položek menu
     * @return array
     */
    public function getMenuItems(): array
    {
        return $this->menuItems;      
    }


    /**
     * Vytvoření odkazu
     * @param string $key
     * @return string
     */
    public function createLink(string $key): string
    {
        // Osetreni URL pro vychozi stranku
        if ($key === strtolower(Config::DEFAULT_CONTROLLER)) {
            return Config::APP_BASE_URL;
        }
        return Config::APP_BASE_URL . '/' . $key;
    }
    
    
    
}
