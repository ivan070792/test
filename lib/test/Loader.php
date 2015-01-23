<?php

namespace test;

class Loader
{
    protected static $_libdir = 'lib';

    public static function init()
    {
        return spl_autoload_register(array(__CLASS__, 'includeClass'));
    }

    public static function includeClass($class)
    {
        $file = require_once(PROJECTROOT . '/' . self::$_libdir . '/' . strtr($class, '_\\', '//') . '.php');
		If (file_exists($file)) require_once $file;
    }
}

function S($class)
{
    $class = __NAMESPACE__ . '\\' . $class;
    return $class::getInstance();
}
