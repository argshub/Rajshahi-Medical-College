<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/23/2017
 * Time: 3:59 PM
 */

namespace app\controllers;


class HomeController
{
    function index() {

        return view('home');
    }

    function getAbout() {

        return view('template/about', ['name' => ['shazzad', 'masum', 'rasel']]);
    }
}