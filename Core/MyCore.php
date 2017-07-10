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
        $extract = explode('\\', $controllerName);
        $prefix = $extract[0]=='admin' ? 'admin\\' : '';
        $defaultController = ucfirst(\Core\Libraries\conf::get('Controller', 'route'));
        $defaultFile = APPPATH.rtrim('/Controller/'.trim($prefix, '\\'), '/').'/'.$defaultController.'.php';
        $defaultClass = str_replace($controllerName, $prefix.$defaultController, $controllerClass);
        $defaultAction = \Core\Libraries\conf::get('Action', 'route');
        if(is_file($controllerFile)){
            require_once $controllerFile;
            if(!method_exists($controllerClass, $action)){
                $controllerClass = $defaultClass;
                $controllerFile = $defaultFile;
                $action = $defaultAction;
            }
        }else{
            //throw new \Exception('找不到控制器'.$controllerName);
            $controllerClass = $defaultClass;
            $controllerFile = $defaultFile;
            $action = $defaultAction;
        }
        require_once $controllerFile;
        $controller = new $controllerClass();
        $controller->preDo();
        $controller->$action();
        \Core\Libraries\log::log('controller:'.$controllerClass.' action:'.$action);
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