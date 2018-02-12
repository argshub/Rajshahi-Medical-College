<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/2/2017
 * Time: 4:22 AM
 */

namespace Turbo\Shelf\Application\Configurations\ApplicationConfiguration\ConfigurationFileLoader;


class ConfigurationFile
{
    private $configFile = ROOT."/app/config.json";

    private $configData;

    function __construct() {
        $config = (array) json_decode(file_get_contents($this->configFile));
        $this->constructAllDataAsArray($config);
    }

    function getApplicationConfigurationData(): array {
        return isset($this->configData['APPLICATION CONFIGURATION']) ? $this->configData['APPLICATION CONFIGURATION'] : [];
    }

    function getDatabaseConfiguration(): array {
        return isset($this->configData['DATABASE CONFIGURATION']) ? $this->configData['DATABASE CONFIGURATION'] : [];
    }

    function getSessionConfiguration(): array {
        return isset($this->configData['SESSION CONFIGURATION']) ? $this->configData['SESSION CONFIGURATION'] : [];
    }

    function getCookieConfiguration(): array {
        return isset($this->configData['COOKIE CONFIGURATION']) ? $this->configData['COOKIE CONFIGURATION'] : [];
    }

    function getTokenConfiguration(): array {
        return isset($this->configData['TOKEN CONFIGURATION']) ? $this->configData['TOKEN CONFIGURATION'] : [];
    }

    function getRoutesConfiguration(): array {
        return isset($this->configData['ROUTES CONFIGURATION']) ? $this->configData['ROUTES CONFIGURATION'] : [];
    }

    private function constructAllDataAsArray($config) {
        $data = array();
        foreach ($config as $item => $value) {
            $data[$item] = (array) $value;
        }
        $this->configData = $data;
    }
}