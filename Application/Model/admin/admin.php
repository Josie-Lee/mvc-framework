<?php
namespace Application\Model\admin;
use Core\Common\Db;
use Core\Libraries\APP\Model;

class adminModel extends Model
{
    private $table = 'user';
    public function __construct()
    {
        $this->redis = $this->loadRedis('test');
        $this->db = Db::d('test');
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
            $ret = $this->db->select($this->table, array('id'), array('username'=>$username));
            if(!count($ret)){
                return -1;
            }
            $ret = $this->db->select($this->table, array('id'), array('username'=>$username, 'password'=>$password));
            if(count($ret)){
                return true;
            }else{
                return 0;
            }
        }
        return false;
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