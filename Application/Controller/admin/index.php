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
        /*
        $model = $this->loadModel('admin_index');
        $data = $model->getVal('ttable', '*');
        $id = $model->insertVal('ttable', array('name'=>'tn', 'sort'=>2));
        */
        $this->assign('data',$data);
        $this->display('admin/index.html');
    }
}