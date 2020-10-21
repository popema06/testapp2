<?php


namespace classes;


/**
 * Class Request
 * @package classes
 */
class Request
{

    /** @var array */
    private $urlParts = [];

    /** @var array */
    private $queryParams = [];

    /** @var array */
    private $postData;



    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->setUrlParts();
        $this->postData = filter_input_array(INPUT_POST);
    }


    /**
     * Nastavení části URL podle masky
     */
    private function setUrlParts(): void
    {
        $url = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
        $parseUrl = parse_url($url);

        // Odeberu první lomítko na začátku řetězce
        $path = substr($parseUrl['path'], 1);

        $bits = explode('/', $path);

        if (isset($bits[0]) && $bits[0] === Config::PROJECT_FOLDER_NAME) {
            unset($bits[0]);
            $bits = array_values($bits);
        }

        foreach ($bits as $key => $value) {
            if ($value !== '') {
                $this->urlParts[Config::$urlMasks[$key]] = $value;
            }
        }

        // Dvojice klíč hodnota query části REQUEST_URI
        $this->queryParams = filter_input_array(INPUT_GET);
    }


    /**
     * Vrací část url odpovídající dané masce
     * @param $mask
     * @return false|mixed
     */
    public function getUrlPart($mask)
    {
        if (array_key_exists($mask, $this->urlParts)) {
            return $this->urlParts[$mask];
        }
        return false;
    }


    /**
     * Vrací hodnotu parametru z Query
     * @param $param
     * @return false|mixed
     */
    public function getQueryValueByParam($param)
    {
        if (array_key_exists($param, $this->queryParams)) {
            return $this->queryParams[$param];
        }
        return false;
    }


    /**
     * Vraci cele pole post nebo hodnotu podle predaneho klice
     * @param null $index
     * @return array|false|mixed
     */
    public function getPost($index = null)
    {
        // Pokud nebyl zadan zadny index, vracim cele pole POST
        if ($index === null) {
            return $this->postData;
        }

        // Byl zadan index, takze chci hodnotu konkretniho klice (indexu)
        // Pri kontrole existence klice v poli, muzete pouzit bud funkce isset($this->post[$index])
        // Nebo rychlejsi a efektivnejsi funkce array_key_exists()
        if (is_array($this->postData) && array_key_exists($index, $this->postData)) {
            return filter_var($this->postData[$index], FILTER_SANITIZE_STRING);
        }

        // Byla vyzadana hodnota daneho indexu, ale pole $this->post ji neobsahuje :-/
        return false;
    }


}