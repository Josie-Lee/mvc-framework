<?php
namespace Application\Controller\admin;

class IndexController extends \Core\Libraries\APP\Controller
{
    public function preDo()
    {
        echo "preDo";
    }
    public function index()
    {
        $data = 'Hello World admin';
        $model = $this->loadModel('admin_index');
        $ret = $model->getVal('test', '*');
        //$id = $model->insertVal('test', array('sort'=>'0', 'num1'=>1, 'num2'=>2, 'b'=>3));
        $this->assign('data',$data);
        $this->display('admin/index.html');
    }
}