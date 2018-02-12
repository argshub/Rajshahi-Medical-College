<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/19/2017
 * Time: 12:52 AM
 */

namespace Turbo\Shelf\Application\BaseController;


class Purpose extends ApplicationServiceProvider
{
    static function run() {
        $app = new self();
        return $app->startTheApp();
    }

    private function startTheApp() {
        $this->checkRouteExists();
        $this->checkController();
        $this->checkMethod();
        $this->checkMiddleware();
        return $this->passToTheRequestMethod();
    }
}