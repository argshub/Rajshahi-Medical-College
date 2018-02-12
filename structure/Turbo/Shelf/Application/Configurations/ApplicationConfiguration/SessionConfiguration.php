<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/5/2017
 * Time: 3:35 PM
 */

namespace Turbo\Shelf\Application\Configurations\ApplicationConfiguration;


class SessionConfiguration implements ConfigurationTree
{
    private $sessionConfigurationData;

    function __construct() {
        $this->sessionConfigurationData = ApplicationConfigurationProvider::getApplicationConfiguration()->getSessionConfiguration();
    }

    function getSessionName(): string {
        return isset($this->sessionConfigurationData['SESSION NAME']) ? $this->sessionConfigurationData['SESSION NAME'] : "";
    }

}