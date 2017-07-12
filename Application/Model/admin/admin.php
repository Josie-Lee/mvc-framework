<?php
namespace Application\Model\admin;

class adminModel extends \Core\Libraries\APP\Model
{
    private $table = 'user';
    public function __construct()
    {
        $this->db = \Core\Common\Db::d(\Core\Common\Db::TEST);
    }
    public function getVal($col, $where=array())
    {
        if(!empty($col)){
            return $this->db->select($this->table, $col, $where);
        }else{
            return false;
        }
    }

    public function insertVal($data)
    {
        $ret = $this->db->insert($this->table, $data);
        return $ret===false ? false : $this->id();
    }

    public function checkUser($username, $password)
    {
        if(!empty($username) && !empty($password)){
            $ret = $this->db->select($this->table, array('nickname'), array('username'=>$username, 'password'=>$password));
            var_dump($ret); exit;
        }
    }

    public function addUser($data)
    {

        if(!empty($data)){
            $ret = $this->db->insert($this->table, $data);
            return $ret===false? false : true;
        }else{
            return false;
        }

    }
}