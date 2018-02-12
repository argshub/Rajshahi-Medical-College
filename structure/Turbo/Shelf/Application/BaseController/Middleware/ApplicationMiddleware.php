<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/2/2017
 * Time: 3:45 AM
 */

namespace Turbo\Shelf\Application\BaseController\Middleware;


abstract class ApplicationMiddleware
{
    abstract function checkMiddlewareStatus();
}