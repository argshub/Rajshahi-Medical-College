<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/5/2017
 * Time: 5:21 PM
 */

namespace Turbo\Shelf\Application\Configurations\RouteConfiguration\RoutesManager;


use Turbo\Shelf\Application\Configurations\ApplicationConfiguration\RoutesConfiguration;
use Turbo\Shelf\Application\Configurations\RouteConfiguration\RoutesManager\RoutesFileLoader\RoutesFile;

class RoutesManagement
{
    private $routes;

    private $allRoutesData;

    function __construct() {
        $this->allRoutesData = array();
        $this->routes = (new RoutesConfiguration())->getAllRoutesWithMiddleware();
        $this->constructAllRoutesData();
    }

    function getAllRoutesData(): array {
        return (array) $this->allRoutesData;
    }

    private function constructAllRoutesData() {
        foreach ((array) $this->routes as $item => $value) {
            $data = (new RoutesFile($item, $value))->getRoutes();
            if(count($data)) $this->combineTwoArrayData($data);
        }
    }

    private function combineTwoArrayData($data) {
        foreach ($data as $item => $value) {
            if(array_key_exists($item, $this->allRoutesData)) throw new \Exception("{$item} routes defined conflict");
            $this->allRoutesData[$item] = $value;
        }
    }
}