<?php
namespace Application\Model\admin;
use Core\Libraries\APP\Model;
class indexModel extends Model
{
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
        return $this->select($table, $col, $where);
    }

    public function insertVal($table, $data)
    {
        $ret = $this->insert($table, $data);
        return $ret===false ? false : $this->id();
    }
}
