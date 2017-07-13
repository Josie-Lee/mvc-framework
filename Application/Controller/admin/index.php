<?php
namespace Application\Controller\admin;

use Core\Libraries\APP\Controller;

class IndexController extends Controller
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