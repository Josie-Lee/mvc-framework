<?php
namespace Application\Controller\admin;

class IndexController extends \Core\Libraries\APP\Controller
{
    public function preDo()
    {
        //echo "preDo";
    }
    public function index()
    {
        $data = 'Hello World admin';
        $this->assign('data',$data);
        $this->display('admin/login.html');
    }
}