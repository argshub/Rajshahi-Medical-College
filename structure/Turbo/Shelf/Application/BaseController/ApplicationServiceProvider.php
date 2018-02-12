<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/19/2017
 * Time: 12:33 AM
 */

namespace Turbo\Shelf\Application\BaseController;


use Turbo\Shelf\Application\BaseController\RequestMethod\RequestMethodProvider;
use Turbo\Shelf\Application\BaseController\RouteValidator\RouteValidatorProvider;
use Turbo\Shelf\Application\BaseController\Middleware\MiddlewareProvider;

abstract class ApplicationServiceProvider
{
    private $controller, $method, $params, $middleware, $requestMethod;
    function __construct() {
        $this->routeData = (new RouteValidatorProvider())->getUrlInformation();
    }

    protected function checkRouteExists() {
        if(!count($this->routeData)) throw new \Error("404 not found");
        $this->controller = isset($this->routeData['CONTROLLER']) ? $this->routeData['CONTROLLER'] : "";
        $this->method = isset($this->routeData['METHOD']) ? $this->routeData['METHOD'] : "";
        $this->params = isset($this->routeData['PARAMS']) ? $this->routeData['PARAMS'] : [];
        $this->middleware = isset($this->routeData['MIDDLEWARE']) ? $this->routeData['MIDDLEWARE'] : "";
        $this->requestMethod = isset($this->routeData['REQUEST_METHOD']) ? $this->routeData['REQUEST_METHOD'] : "";
    }

    protected function checkController() {
        if(class_exists("\\app\\controllers\\".$this->controller)) {
            $class = "\\app\\controllers\\".$this->controller;
            $this->controller = new $class;

        } elseif(class_exists($this->controller)) {
            $this->controller = new $this->controller;
        } else throw new \Exception("{$this->controller} not exists");
    }

    protected function checkMethod() {
        if(!method_exists($this->controller, $this->method)) throw new \Exception("{$this->method} not exists");
    }

    protected function checkMiddleware() {
        MiddlewareProvider::checkMiddlewareService($this->middleware);
    }

    protected function passToTheRequestMethod() {
        return RequestMethodProvider::validateRequest($this->requestMethod, $this->controller, $this->method, $this->params);
    }

}