<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/19/2017
 * Time: 12:46 AM
 */

namespace Turbo\Shelf\HTTP\URL;


use Turbo\Shelf\HelperClasses\StringHelper\CharacterRemover;

class UrlCatcher
{
    private $url;
    function __construct() {
        $this->url = isset($_GET['uri']) ? CharacterRemover::removeBothSideUnwantedCharacter(filter_var($_GET['uri'], FILTER_SANITIZE_URL), "/") : "";
    }

    function getUrlAsString(): string {
        return $this->url;
    }

}