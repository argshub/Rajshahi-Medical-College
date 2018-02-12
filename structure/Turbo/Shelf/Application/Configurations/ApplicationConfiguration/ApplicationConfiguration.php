<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/5/2017
 * Time: 3:32 PM
 */

namespace Turbo\Shelf\Application\Configurations\ApplicationConfiguration;


class ApplicationConfiguration implements ConfigurationTree
{
    private $applicationConfigData;

    function __construct() {
        $this->applicationConfigData = ApplicationConfigurationProvider::getApplicationConfiguration()->getApplicationConfigurationData();
    }

    function getApplicationRoot(): string {
        return isset($this->applicationConfigData['APPLICATION ROOT']) ? $this->applicationConfigData['APPLICATION ROOT'] : "";
    }

    function checkSessionStatus(): bool {
        return (isset($this->applicationConfigData['SESSION']) && $this->applicationConfigData['SESSION'] == "ON") ? true : false;
    }

    function checkCacheStatus(): bool {
        return (isset($this->applicationConfigData['CACHE']) && $this->applicationConfigData['CACHE'] == "ON") ? true : false;
    }
}