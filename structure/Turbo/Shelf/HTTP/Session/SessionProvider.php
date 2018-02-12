<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/24/2017
 * Time: 2:06 AM
 */

namespace Turbo\Shelf\HTTP\Session;


abstract class SessionProvider
{
    private $allSessions;
    function __construct() {
        $this->allSessions = $_SESSION ? $_SESSION : [];
    }
}