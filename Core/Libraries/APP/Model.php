<?php
namespace Core\Libraries\APP;

use Core\Common\Db;
use Core\Common\Re;

class Model
{
    public function loadDb($name)
    {
        return Db::d($name);
    }

    public function loadRedis($name)
    {
        return Re::r($name);
    }

}