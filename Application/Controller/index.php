<?php

namespace Application\Controller;
class IndexController extends \Core\Libraries\APP\Controller
{
    public function index()
    {
        $data = array('Hello World front');
        $this->assign('data',$data);
        $this->display('index.html');
    }
}