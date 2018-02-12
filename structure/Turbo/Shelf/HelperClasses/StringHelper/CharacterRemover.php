<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/5/2017
 * Time: 6:32 PM
 */

namespace Turbo\Shelf\HelperClasses\StringHelper;


class CharacterRemover
{
    static function removeRightSideUnwantedCharacter(string $data, string $character): string {
        return rtrim($data, $character);
    }

    static function removeLeftSideUnwantedCharacter(string $data, string $character): string {
        return ltrim($data, $character);
    }

    static function removeBothSideUnwantedCharacter(string $data, string $character): string {
        return ltrim(rtrim($data, $character), $character);
    }
}