<?php
/**
 * Created by PhpStorm.
 * User: argshub
 * Date: 1/24/2017
 * Time: 1:37 AM
 */

namespace Turbo\Shelf\HTTP\Session;


trait UserSessions
{
    static function put(string $name, string $value) {
        $_SESSION[$name] = $value;
    }

    static function exists(string $name): bool {
        return isset($_SESSION[$name]) ? true : false;
    }

    static function get(string $name): string {
        return self::exists($name) ? $_SESSION[$name] : "";
    }

    static function delete(string $name): bool {
        if(self::exists($name)){
            unset($_SESSION[$name]);
            return true;
        }
        return false;
    }

    static function flash(string $name, string $value = null): string {
        $session  = "";
        if ($value) self::put($name, $value);
        else {
            if(self::exists($name)) $session = self::get($name);
            self::delete($name);
        }
        return $session;
    }

    static function getAllSession(): array {
        return $_SESSION ? $_SESSION : [];
    }
}