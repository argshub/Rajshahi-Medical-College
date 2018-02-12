<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/5/2017
 * Time: 4:44 PM
 */

namespace Turbo\Shelf\Application\Configurations\ApplicationConfiguration;


class RoutesConfiguration implements ConfigurationTree
{
    private $routeConfigurationData;

    function __construct() {
        $this->routeConfigurationData = ApplicationConfigurationProvider::getApplicationConfiguration()->getRoutesConfiguration();
    }

    function getAllRoutesWithMiddleware(): array {
        return $this->routeConfigurationData;
    }
}