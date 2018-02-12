<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/21/2017
 * Time: 7:31 PM
 */

namespace Turbo\Shelf\Template\ViewManager;


use Turbo\Shelf\HelperClasses\StringHelper\CharacterRemover;
use Turbo\Shelf\Template\ViewManager\Compiler\ExtensionCompiler;
use Turbo\Shelf\Template\ViewManager\Compiler\ViewCompiler;
use Turbo\Shelf\Template\ViewManager\FileLoader\TemplateFileLoader;

class TemplateViewManager
{
    private $attachData;
    private $fileData;
    private $compileData;
    function __construct(string $fileName) {
        $this->fileData = (new TemplateFileLoader($fileName))->getFileData();
        $this->copiler = new ViewCompiler();
        $this->compileData = array();
        $this->attachData = array();
        $this->compileTheData();
    }

    function viewData() {
        return $this->fileData;
    }

    private function compileTheData() {
        for ($i = 0; $i < count($this->fileData); $i++) {
            if (strpos($this->fileData[$i], "@extend") !== false) {
                $data = preg_replace("/@extend/", "", $this->fileData[$i]);
                $data = CharacterRemover::removeBothSideUnwantedCharacter($data, "(");
                $data = CharacterRemover::removeBothSideUnwantedCharacter($data, ")");
                $data = CharacterRemover::removeBothSideUnwantedCharacter($data, "'");
                $data = (new ExtensionCompiler($data))->getCompileData();
                $this->combineTheArray($data);
            } elseif (strpos($this->fileData[$i], "@attach") !== false) {
                $data = preg_replace("/@attach/", "", $this->fileData[$i]);
                $attachData = array();
                for ($k = $i+1; $k < count($this->fileData); $k++) {
                    if($this->fileData[$k] == "@stop") {
                        $i = $k;
                        break;
                    }
                    $attachData[] = $this->fileData[$k];
                }
                $data = CharacterRemover::removeBothSideUnwantedCharacter($data, "(");
                $data = CharacterRemover::removeBothSideUnwantedCharacter($data, ")");
                $data = CharacterRemover::removeBothSideUnwantedCharacter($data, "'");
                $this->attachData[$data] = $attachData;
            } else $this->compileData[] = $this->fileData[$i];
        }
        $this->combineAllCompileData();
    }


    private function combineTheArray($arrayData) {
        foreach ($arrayData as $item => $value) {
            is_string($item) ? $this->compileData[$item] = $value : $this->compileData[] = $value;
        }
    }

    private function combineAllCompileData() {
        $allData = array();
        foreach ($this->compileData as $item => $value) {
            if(is_array($value)) {
                if(array_key_exists($item, $this->attachData)) {
                    foreach ($this->attachData[$item] as $viewData) {
                        $allData[] = $viewData;
                    }
                } else throw new \Exception("{$item} not exists");
            } else $allData[] = $value;
        }
        $this->compileData = $allData;
        $this->finalCompilation();
    }

    private function finalCompilation() {
        $compiler = (new ViewCompiler());
        $this->fileData = $compiler->compileAllData($this->compileData);
    }
}