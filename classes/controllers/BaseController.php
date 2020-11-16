<?php


namespace classes\controllers;

use classes\Config;
use classes\Request;
use Tracy\Debugger;

/*
 * Class BaseController
 * @package classes\controllers
 */
abstract class BaseController
{

    protected $request;

    protected $title;
    /*
     * BaseController constructor
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function getAction() {
        $action = $this->request->getUrlPart('action');
        if (!$action) {
            $action = Config::DEFAULT_ACTION;
        }
        return $action;
    }

    public function getTitle() {
        return $this->title ?? Config::DEFAULT_TITLE;
    }

    protected function render() {

        $action = $this->getAction();
        $template = $this->getTemplate($action);

        if (!file_exists($template)) {
            Debugger>>log('neexistuej šablona'.$template, 'critical');
            throw new \Exception('neexistuje sablona'.$template);
        }


        require_once 'inc/head.php';

        // Vložení konkrétní šablony podle akce Controlleru


        require_once 'inc/bottom.php';
    }

    protected function getTemplate($action) {

        $reflect = new \ReflectionClass($this);
        $controller = $reflect->getShortName();
        $controller = str_replace('Controller', '', $controller);
        return './views/'.$controller.'/'.$action.'.tpl';
    }

}