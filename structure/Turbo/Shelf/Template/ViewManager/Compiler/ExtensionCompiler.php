<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/22/2017
 * Time: 10:20 PM
 */

namespace Turbo\Shelf\Template\ViewManager\Compiler;


use Turbo\Shelf\HelperClasses\StringHelper\CharacterRemover;
use Turbo\Shelf\Template\ViewManager\FileLoader\TemplateFileLoader;

class ExtensionCompiler
{
    private $compileData, $extensionData;
    function __construct(string $filePath) {
        $this->compileData = array();
        $this->extensionData = (new TemplateFileLoader($filePath))->getFileData();
        $this->catchAttachments();
    }

    private function catchAttachments() {
        foreach ($this->extensionData as $item) {
            if(strpos($item, "@capture") !== false) {
                $data = preg_replace("/@capture/", "", $item);
                $data = CharacterRemover::removeBothSideUnwantedCharacter($data, "(");
                $data = CharacterRemover::removeBothSideUnwantedCharacter($data, ")");
                $data = CharacterRemover::removeBothSideUnwantedCharacter($data, "'");
                $this->compileData[$data] = array();
            } else $this->compileData[] = $item;
        }
    }

    function getCompileData() {
        return $this->compileData;
    }
}