<?php

namespace Application\Controller;
class indexController extends \Core\MyCore
{
    public function index()
    {
        $data = 'Hello World';
        $this->assign('data',$data);
        $this->display('index.html');
    }
}