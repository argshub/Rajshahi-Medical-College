<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/2/2017
 * Time: 3:13 AM
 */

require_once __DIR__."/../../vendor/autoload.php";
require_once __DIR__."/utility.php";

define("ROOT", __DIR__."/../../");

use Turbo\Shelf\Application\BaseController\Purpose;
Purpose::run();