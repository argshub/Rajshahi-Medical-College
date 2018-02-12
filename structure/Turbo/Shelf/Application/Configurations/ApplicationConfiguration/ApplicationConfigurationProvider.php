<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/2/2017
 * Time: 3:44 AM
 */

namespace Turbo\Shelf\Application\Configurations\ApplicationConfiguration;


use Turbo\Shelf\Application\Configurations\ApplicationConfiguration\ConfigurationFileLoader\ConfigurationFile;

class ApplicationConfigurationProvider
{
    private static $instance;

    static function getApplicationConfiguration(): ConfigurationFile {
        if(!self::$instance) self::$instance = new ConfigurationFile();
        return self::$instance;
    }
}