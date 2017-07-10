<?php

namespace Application\Controller;
class IndexController extends \Core\Libraries\APP\Controller
{
    public function index()
    {
        $data = 'Hello World front';
        $this->assign('data',$data);
        $this->display('admin/index.html');
    }
}