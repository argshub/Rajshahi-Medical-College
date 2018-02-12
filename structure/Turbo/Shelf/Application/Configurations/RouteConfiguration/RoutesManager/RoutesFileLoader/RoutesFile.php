<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/5/2017
 * Time: 5:20 PM
 */

namespace Turbo\Shelf\Application\Configurations\RouteConfiguration\RoutesManager\RoutesFileLoader;


use Turbo\Shelf\HelperClasses\StringHelper\CharacterRemover;

class RoutesFile
{
    private $routesPath = ROOT."/app/routes/";


    private $routes;

    private $middlewareName, $fileName;


    function __construct(string $middlewareName, string $fileName) {
        if(!file_exists($this->routesPath.$fileName)) throw new \Exception("{$this->routesPath}{$fileName} not exists");
        $this->middlewareName = $middlewareName;
        $this->fileName = $this->routesPath.$fileName;
        $this->readFileData();
    }

    function getRoutes(): array {
        return (array) $this->routes;
    }

    private function readFileData() {
        $data = require_once $this->fileName;
        $urlData = array();
        foreach ((array)$data as $item => $value) {
            if(count($value)) {
                foreach ((array)$value as $urlKey => $urlValue) {
                    $explodeData = explode("|", $urlValue);
                    $controllerData = explode("@", $explodeData[0]);
                    $urlData[CharacterRemover::removeBothSideUnwantedCharacter($urlKey, "/")] = [
                        "CONTROLLER" => CharacterRemover::removeBothSideUnwantedCharacter($controllerData[0], " "),
                        "METHOD" => CharacterRemover::removeBothSideUnwantedCharacter($controllerData[1], " "),
                        "MIDDLEWARE" => CharacterRemover::removeBothSideUnwantedCharacter($this->middlewareName, " "),
                        "TAG" => isset($explodeData[1]) ? CharacterRemover::removeBothSideUnwantedCharacter($explodeData[1], " ") : "",
                        "REQUEST_METHOD" => CharacterRemover::removeBothSideUnwantedCharacter($item, " ")
                    ];
                }
            }
        }
        $this->routes = $urlData;
    }
}