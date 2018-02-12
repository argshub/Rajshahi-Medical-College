<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/19/2017
 * Time: 12:35 AM
 */

namespace Turbo\Shelf\Application\BaseController\RequestMethod;


class RequestMethodProvider
{
    static function validateRequest($requestMethod, $controller, $method, $params) {
        switch ($requestMethod) {
            case 'POST':
                    $request = new PostMethod($controller, $method, $params);
                break;
            case 'PUT':
                    $request = new PUTMethod($controller, $method, $params);
                break;
            case 'DELETE':
                    $request = new DeleteMethod($controller, $method, $params);
                break;
            default:
                    $request = new GETMethod($controller, $method, $params);
                break;
        }
        return $request->passRequest();
    }
}