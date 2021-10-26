<?php

class connect
{
    public static $db;

    public static function Connection()
    {
        if (!isset(self::$db)) {
            self::$db = new mysqli('localhost', 'root', '', 'pizza');
        }
        return self::$db;
    }
}