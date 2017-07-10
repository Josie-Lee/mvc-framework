<?php
namespace Application\Model\admin;

class indexModel extends \Core\Libraries\APP\Model
{
    public function __construct()
    {
        $this->db = \Core\Common\Db::d(\Core\Common\Db::TEST);
    }
    public function getVal($table, $col, $where=array())
    {
        if(empty($table)){
            echo "��������Ϊ��";
            exit;
        }
        if(empty($col)){
            echo "������Ҫ���ҵ�����";
            exit;
        }
        return $this->db->select($table, $col, $where);
    }

    public function insertVal($table, $data)
    {
        $ret = $this->db->insert($table, $data);
        return $ret===false ? false : $this->id();
    }
}
