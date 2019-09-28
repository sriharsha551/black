<?php

class Account_coa_model extends CI_Model
{
    function __construct()
    {
        parent :: __construct();
    }

    function get_act_coa_count() 
    {
        $this->db->where('deleted_at', null);
        $this->db->from('act_coa');
        return $this->db->count_all_results();
    }

    function get_types_list($params = array())
    {
        $params['deleted_at'] = null;
        $this->db->where($params);
        $this->db->select('id, name');
        $query = $this->db->get('act_types');
        return $query->result_array();
    }


    function get_group_data()
    {
        $query1 = $this->db->query('select id, name as group_name from act_groups where deleted_at is null');
        $query2 = $this->db->query('select id as type_id, name as type_name, group_id from act_types where deleted_at is null');
        $groups = $query1->result_array();
        $types = $query2->result_array();
        $result = array();
        foreach($groups as $group) {
            $result[$group['group_name']] = $this->get_types_list(array('group_id' => $group['id']));
        }
        return $result;
    }

    function get_all_act_coa($params = array())
    {
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->select('t1.id ,t2.name as type_name, t1.name, t1.enabled');    
        $this->db->from('act_coa as t1');
        $this->db->join('act_types as t2', 't1.type_id = t2.id');
        $this->db->where('t1.deleted_at', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_act_coa_detail($id)
    {
        $this->db->where(array('t1.id' => $id, 't1.deleted_at' => null));
        $this->db->select('t1.id ,t2.name as type_name, t1.name, t1.enabled, t1.type_id');    
        $this->db->from('act_coa as t1');
        $this->db->join('act_types as t2', 't1.type_id = t2.id');
        $query = $this->db->get('act_coa');
        return $query->row_array();
    }

    function add_act_coa($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('act_coa',$params);
        return $this->db->insert_id();
    }

    function edit_act_coa($id,$params)
    {
        $params['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        return $this->db->update('act_coa',$params);
    }

    function get_safe_delete($id) 
    {
        $count = $this->db->where(['coa_id'=>$id])->from("act_bill_payment")->count_all_results();
        $count = $count + $this->db->where(['coa_id'=>$id])->from("act_inv_payment")->count_all_results();
        $count = $count + $this->db->where(['coa_id'=>$id])->from("act_transaction")->count_all_results();
        $count = $count + $this->db->where(['coa_id'=>$id])->from("act_accounts")->count_all_results();
        if($count == 0)
            return TRUE;
        else
            return FALSE;
    }

    function delete_act_coa($id)
    {
        $this->db->where('id',$id);
        $params['deleted_at'] = date('Y-m-d H:i:s');
        return $this->db->update('act_coa',$params);
    } 
}

?>