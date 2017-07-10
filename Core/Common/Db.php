<?php
namespace Core\Common;
class Db
{
    const BLOG = 'blog';
    const TEST = 'test';
    private static $db = array();

    private function __construct()
    {

    }
    public static function d($name)
    {
        if(isset(self::$db[$name])){
            return self::$db[$name];
        }
        $conf = \Core\Libraries\conf::get(self::TEST, 'database');
        return self::add($name, $conf);
    }
    public static function add($name, $conf)
    {
        self::$db[$name] = new \Medoo\Medoo($conf);
        return self::$db[$name];
    }
}