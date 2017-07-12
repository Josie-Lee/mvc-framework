<?php
namespace Application\Controller\admin;

use Core\Common\Func;

class AdminController extends \Core\Libraries\APP\Controller
{
    public function preDo()
    {
        session_start();
        $this->func = new Func();
        $this->model = $this->loadModel('admin_admin');
    }
    public function register()
    {
        $userName = $_POST['username'];
        $nickName = $_POST['nickname'];
        $password = $_POST['password'];
        $url = 'admin/login.html';
        if(!preg_match('/^[\x{4e00}-\x{9fa5}\w]+$/u',$nickName)){
            $this->error('������Ϸ��ǳ�nickname', $url);
            exit;
        }
        if(!preg_match("/^[0-9a-zA-Z_]+@[0-9a-zA-Z_]+.[0-9a-zA-Z_]+$/",$userName)){
            $this->error('������Ϸ�������email', $url);
            exit;
        }
        if(!preg_match('/^\w{6,20}$/', $password)){
            $this->error('�Ƿ�������password', $url);
            exit;
        }
        $data = array('username'=>$userName, 'nickname'=>$nickName, 'password'=>$password, 'time'=>time());

        if($this->model->addUser($data) == false){
            echo "test"; exit;
            $this->error('ע��ʧ��', $url);
            exit;
        }else{
            $this->addSession(array('username'=>$userName, 'nickname'=>$nickName));
        }
    }
    public function login()
    {
        $userName = $_POST['username'];
        $password = $_POST['password'];
        $ret = $this->model->checkUser($userName, $password);

    }
    public function addSession($data)
    {
        if(is_array($data)){
            foreach($data as $key => $val){
                $_SESSION[$key] = $val;
            }
            return true;
        }else{
            return false;
        }
    }
}