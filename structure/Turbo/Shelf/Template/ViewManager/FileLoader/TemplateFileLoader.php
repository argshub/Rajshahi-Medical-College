<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/21/2017
 * Time: 12:14 AM
 */

namespace Turbo\Shelf\Template\ViewManager\FileLoader;

use Turbo\Shelf\HelperClasses\StringHelper\CharacterRemover;

class TemplateFileLoader
{
    private $fileData;
    function __construct(string $filePath) {
        $file = ROOT."app/views/".$filePath.".inc";
        if(!file_exists($file)) throw new \Exception("{$file} not found");
        $this->fileData = file($file);
        $this->removeEmptyLine();
    }

    function getFileData(): array {
        return $this->fileData;
    }

    private function removeEmptyLine() {
        $refreshData = array();
        for($i = 0; $i < count($this->fileData); $i++) {
            $data = CharacterRemover::removeBothSideUnwantedCharacter($this->fileData[$i], " \r\n\t");
            if(strlen($data) > 1) {
                $refreshData[] = $data;
            }
        }
        $this->fileData = $refreshData;
    }
}