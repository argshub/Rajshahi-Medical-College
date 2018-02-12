<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/5/2017
 * Time: 3:35 PM
 */

namespace Turbo\Shelf\Application\Configurations\ApplicationConfiguration;


class CookieConfiguration implements ConfigurationTree
{
    private $cookieConfigData;

    function __construct() {
        $this->cookieConfigData = ApplicationConfigurationProvider::getApplicationConfiguration()->getCookieConfiguration();
    }

    function getCookieName(): string {
        return isset($this->cookieConfigData['COOKIE NAME']) ? $this->cookieConfigData['COOKIE NAME'] : "";
    }

    function getCookieExpiry(): int {
        return (int) isset($this->cookieConfigData['COOKIE EXPIRY']) ? $this->cookieConfigData['COOKIE EXPIRY'] : 0;
    }


}