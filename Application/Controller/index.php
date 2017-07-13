<?php

namespace Application\Controller;
use Core\Libraries\APP\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $data = array('Hello World front');
        $this->assign('data',$data);
        $this->display('index.html');
    }
}