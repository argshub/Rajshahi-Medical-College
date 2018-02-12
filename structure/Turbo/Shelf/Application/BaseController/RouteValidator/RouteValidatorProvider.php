<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/19/2017
 * Time: 12:50 AM
 */

namespace Turbo\Shelf\Application\BaseController\RouteValidator;


use Turbo\Shelf\Application\Configurations\RouteConfiguration\RouteConfigurationProvider;
use Turbo\Shelf\HelperClasses\StringHelper\CharacterRemover;
use Turbo\Shelf\HTTP\URL\UrlCatcher;

class RouteValidatorProvider
{
    private $routes, $urlInformation;
    function __construct() {
        $this->routes = RouteConfigurationProvider::getRoutesConfigurationData()->getAllRoutesData();
        $this->url = (new UrlCatcher())->getUrlAsString();
        $this->getRouteInformation();
    }

    public function getUrlInformation(): array {
        return $this->urlInformation;
    }

    private function getRouteInformation() {
        $infoData = array();
        if(isset($this->routes[$this->url])) $infoData = $this->routes[$this->url];
        else {
            $urlExploration1 = explode("/", $this->url);
            foreach ($this->routes as $route => $route_value) {
                $paramData = array();
                if(strpos($route, "{") !== false) {
                    $urlExploration2 = explode("/", $route);
                    if(count($urlExploration1) === count($urlExploration2)) {
                        for ($i = 0; $i < count($urlExploration1); $i++) {
                            if(strpos($urlExploration2[$i], "{") !== false) {
                                $urlExploration2[$i] = $urlExploration1[$i];
                                $paramData[] = $urlExploration1[$i];
                            }
                        }
                    }
                    if($this->url === $this->combineTheArrayAsString($urlExploration2)) {
                        $infoData = $this->routes[$route];
                        $infoData['PARAMS'] = $paramData;
                        break;
                    }
                }
            }
        }
        $this->urlInformation = $infoData;
    }

    private function combineTheArrayAsString($urlExploration2): string {
        $data = "";
        foreach ($urlExploration2 as $item) $data .= $item."/";
        return CharacterRemover::removeBothSideUnwantedCharacter($data, "/");
    }
}