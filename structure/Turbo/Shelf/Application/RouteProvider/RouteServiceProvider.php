<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/23/2017
 * Time: 12:37 AM
 */

namespace Turbo\Shelf\Application\RouteProvider;


use Turbo\Shelf\Application\Configurations\RouteConfiguration\RouteConfigurationProvider;

class RouteServiceProvider
{
    private $url;
    private $tag;
    private $tagData;
    private $routeData;

    function __construct(string $tagName, array $tagData) {
        $this->tag = $tagName;
        $this->tagData = $tagData;
        $this->routeData = RouteConfigurationProvider::getRoutesConfigurationData()->getAllRoutesData();
        $this->checkRouteExists();
    }

    private function checkRouteExists() {
        $url = "";
        foreach ($this->routeData as $item => $value) {
            if($value['TAG'] === $this->tag) {
                $url = $item;
                break;
            }
        }
        $this->convertUrlData($url);
    }

    private function convertUrlData($url) {
        if(count($this->tagData)) {
            foreach ($this->tagData as $item => $value) {
                if(strpos($url, "{$item}") !== false) {
                    $url = preg_replace("/{{$item}}/", $value, $url);
                } else throw new \Exception("{$item} not defined");
            }
        }
        $this->url = $url;
    }

    function __toString() {
        return (string) $this->url;
    }

}