<?php
/**
 * @desc Created by PhpStorm.
 * @author: Administrator
 * @since: 2017/5/23 22:47
 */
namespace Core\Libraries\APP;

class Model extends \Medoo\Medoo
{
    public function __construct()
    {
        $option = \Core\Libraries\conf::getAll('database');
        parent::__construct($option);
    }
}