<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/2/2017
 * Time: 3:45 AM
 */

namespace Turbo\Shelf\Application\Configurations\RouteConfiguration;

use Turbo\Shelf\Application\Configurations\RouteConfiguration\RoutesManager\RoutesManagement;

class RouteConfigurationProvider
{
    private static $instance;

    static function getRoutesConfigurationData(): RoutesManagement {
        if(!self::$instance) self::$instance = new RoutesManagement();
        return self::$instance;
    }
}