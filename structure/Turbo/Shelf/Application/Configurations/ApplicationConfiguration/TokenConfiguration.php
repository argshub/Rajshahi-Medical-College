<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/5/2017
 * Time: 3:35 PM
 */

namespace Turbo\Shelf\Application\Configurations\ApplicationConfiguration;


class TokenConfiguration implements ConfigurationTree
{
    private $tokenConfigurationData;

    function __construct() {
        $this->tokenConfigurationData = ApplicationConfigurationProvider::getApplicationConfiguration()->getTokenConfiguration();
    }

    function getFormTokenName(): string {
        return isset($this->tokenConfigurationData['FORM TOKEN']) ? $this->tokenConfigurationData['FORM TOKEN'] : "";
    }
}