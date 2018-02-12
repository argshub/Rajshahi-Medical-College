<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/21/2017
 * Time: 6:57 PM
 */

namespace Turbo\Shelf\Template;


use Turbo\Shelf\Template\ViewManager\TemplateViewManager;

class ViewManager
{
    function __construct(string $fileName) {
        $this->viewData = (new TemplateViewManager($fileName));
    }
    function getData() {
        $data  = "";
        foreach ($this->viewData->viewData() as $item) $data .= $item;
        return $data;
    }
}