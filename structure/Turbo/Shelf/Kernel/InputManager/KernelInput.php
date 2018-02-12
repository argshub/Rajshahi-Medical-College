<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/25/2017
 * Time: 5:27 AM
 */

namespace Turbo\Shelf\Kernel\InputManager;


class KernelInput
{
    private $data;

    function __construct() {
        $this->data = getopt("a:", [
           "config:", "view:"
        ]);
        print_r($this->data);
    }

    function getInput(): string {
        return isset($this->data['view']) ? $this->data['view'] : "";
    }
}