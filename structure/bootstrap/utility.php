<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/19/2017
 * Time: 10:32 PM
 */

use Turbo\Shelf\Template\ViewManager;
use Turbo\Shelf\Application\RouteProvider\RouteServiceProvider;

function view($viewPath, ...$data) {
    foreach ($data as $item) foreach ($item as $value => $item_value) ${$value} = $item_value;
    $record = (new ViewManager($viewPath))->getData();
    $intName = sha1($viewPath);
    $file = fopen(ROOT."structure/garbage/application/views/{$intName}.php", "w");
    fwrite($file, $record);
    require_once ROOT."structure/garbage/application/views/{$intName}.php";
}



function route($tag, array $data = []) {
    return (new RouteServiceProvider($tag, $data));
}

