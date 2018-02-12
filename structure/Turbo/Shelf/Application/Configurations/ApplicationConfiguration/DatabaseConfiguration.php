<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/5/2017
 * Time: 3:34 PM
 */

namespace Turbo\Shelf\Application\Configurations\ApplicationConfiguration;


class DatabaseConfiguration implements ConfigurationTree
{
    private $databaseConfigurationData;

    function __construct() {
        $this->databaseConfigurationData = ApplicationConfigurationProvider::getApplicationConfiguration()->getDatabaseConfiguration();
    }

    function getDatabaseServerName(): string {
        return isset($this->databaseConfigurationData['DATABASE SERVER NAME']) ? $this->databaseConfigurationData['DATABASE SERVER NAME'] : "";
    }

    function getDatabaseHostName(): string {
        return isset($this->databaseConfigurationData['DATABASE HOST']) ? $this->databaseConfigurationData['DATABASE HOST'] : "";
    }

    function getDatabaseUsername(): string {
        return isset($this->databaseConfigurationData['DATABASE USERNAME']) ? $this->databaseConfigurationData['DATABASE USERNAME'] : "";
    }

    function getDatabasePassword(): string {
        return isset($this->databaseConfigurationData['DATABASE PASSWORD']) ? $this->databaseConfigurationData['DATABASE PASSWORD'] : "";
    }

    function getDatabaseName(): string {
        return isset($this->databaseConfigurationData['DATABASE NAME']) ? $this->databaseConfigurationData['DATABASE NAME'] : "";
    }
}