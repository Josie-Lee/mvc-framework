<?php
namespace Core;
class MyCore
{
    public static $classMap = array();
    public $assign;
    static public function run()
    {
        \Core\Libraries\log::init();
        $route = new \Core\Libraries\route();
        $controllerName = $route->controller;
        $action = $route->action;
        $controllerFile = APPPATH.'/Controller/'.str_replace('\\', '/', $controllerName).'.php';
        $controllerClass = '\\'.MODULE.'\Controller\\'.$controllerName.'Controller';
        if(is_file($controllerFile)){
            include $controllerFile;
            $controller = new $controllerClass();
            $controller->preDo();
            $controller->$action();
            \Core\Libraries\log::log('controller:'.$controllerName.' action:'.$action);
        }else{
            throw new \Exception('找不到控制器'.$controllerName);
        }
    }

    static public function load($class)
    {
        //自动加载类库
        //new \Core\route();
        //$class = '\core\route';
        //BASE.'/core/route.php
        if(isset($classMap[$class])){
            return true;
        }else{
            $class = str_replace('\\', '/', $class);
            $file = BASEPATH.'/'.$class.'.php';
            if(is_file($file)){
                include $file;
                self::$classMap[$class] = $class;
            }else{
                return false;
            }
        }

    }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {

        $file = APPPATH.'/View/'.trim($file, '/');
        if(is_file($file)){
            extract($this->assign);
            include $file;
        }

    }
}