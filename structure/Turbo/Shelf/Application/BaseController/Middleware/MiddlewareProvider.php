<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/19/2017
 * Time: 4:05 PM
 */

namespace Turbo\Shelf\Application\BaseController\Middleware;


class MiddlewareProvider
{
    static function checkMiddlewareService(string $middlewareName) {
        switch ($middlewareName) {
            case 'AUTH':
                    $middleware = new AuthMiddleware();
                break;
            case 'AUTHORIZE':
                    $middleware = new AuthorizeMiddleware();
                break;
            case 'API':
                    $middleware = new APIMiddleware();
                break;
            default:
                    $middleware = new WEBMiddleware();
                break;
        }
        $middleware->checkMiddlewareStatus();
    }
}