<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/19/2017
 * Time: 12:37 AM
 */

namespace Turbo\Shelf\Application\BaseController\RequestMethod;


class PUTMethod extends RequestMethods
{
    function __construct($controller, $method, $params) {
        parent::__construct($controller, $method, $params);
    }

    function passRequest() {
        return call_user_func_array([$this->controller, $this->method], $this->params);
    }
}