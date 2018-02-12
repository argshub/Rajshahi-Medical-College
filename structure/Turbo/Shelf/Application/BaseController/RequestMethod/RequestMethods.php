<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/19/2017
 * Time: 4:18 PM
 */

namespace Turbo\Shelf\Application\BaseController\RequestMethod;


abstract class RequestMethods
{
    protected $controller, $method, $params;
    function __construct($controller, $method, $params) {
        $this->controller = $controller;
        $this->method = $method;
        $this->params = $params;
    }

    abstract function passRequest();
}