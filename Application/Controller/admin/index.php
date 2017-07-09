<?php
namespace Application\Controller\admin;

class indexController extends \Core\Libraries\APP\Controller
{
    public function preDo()
    {
        echo "first";
    }
    public function index1()
    {
        $data = array('Hello World');
        /*
        $model = $this->loadModel('admin_index');
        $data = $model->getVal('ttable', '*');
        $id = $model->insertVal('ttable', array('name'=>'tn', 'sort'=>2));
        */
        $this->assign('data',$data);
        $this->display('admin/index.html');
    }
}