<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/22/2017
 * Time: 3:05 PM
 */

namespace Turbo\Shelf\Template\ViewManager\Compiler;


class ViewCompiler
{
    private $compileData;
    function __construct() {
        $this->compileData = array();
    }

    
    function compileAllData(array $data) {
        foreach ($data as $item) {
            if(strpos($item, "{{") !== false) {
                $data = preg_replace("/{{/", "<?= ", $item);
                $data = preg_replace("/}}/", " ?>", $data);
                $this->compileData[] = $data;
            } elseif (strpos($item, "@if") !== false) {
                $data = preg_replace("/@/", "<?php ", $item);
                $data .= ": ?>";
                $this->compileData[] = $data;
            } elseif (strpos($item, "@endif") !== false) {
                $data = preg_replace("/@/", "<?php ", $item);
                $data .= "; ?>";
                $this->compileData[] = $data;
            } elseif (strpos($item, "@foreach") !== false) {
                $data = preg_replace("/@/", "<?php ", $item);
                $data .= ": ?>";
                $this->compileData[] = $data;
            } elseif (strpos($item, "@endforeach") !== false) {
                $data = preg_replace("/@/", "<?php ", $item);
                $data .= "; ?>";
                $this->compileData[] = $data;
            }
            else $this->compileData[] = $item;
        }
        return $this->compileData;
    }

}