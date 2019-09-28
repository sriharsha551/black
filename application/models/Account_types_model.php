<?php

class Account_types_model extends CI_Model
{
    function __construct()
    {
        parent :: __construct();
    }

    function get_act_types_count() 
    {
        $this->db->where('deleted_at', null);
        $this->db->from('act_types');
        return $this->db->count_all_results();
    }

    function get_group_list()
    {
        $this->db->where('deleted_at', null);
        $this->db->select('id, name');
        $query = $this->db->get('act_groups');
        return $query->result_array();
    }

    function get_all_act_types($params = array())
    {
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->select('t1.id ,t2.name as group_name, t1.name, t1.enabled');    
        $this->db->from('act_types as t1');
        $this->db->join('act_groups as t2', 't1.group_id = t2.id');
        $this->db->where('t1.deleted_at', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_act_types_detail($id)
    {
        $this->db->where(array('t1.id' => $id, 't1.deleted_at' => null));
        $this->db->select('t1.id ,t2.name as group_name, t1.name, t1.enabled, t1.group_id');    
        $this->db->from('act_types as t1');
        $this->db->join('act_groups as t2', 't1.group_id = t2.id');
        $query = $this->db->get('act_types');
        return $query->row_array();
    }

    function add_act_types($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('act_types',$params);
        return $this->db->insert_id();
    }

    function edit_act_types($id,$params)
    {
        $params['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        return $this->db->update('act_types',$params);
    }

    function get_safe_delete($id) 
    {
        $this->db->where(array('deleted_at' => null, 'type_id' => $id));
        $query = $this->db->from('act_coa');
        if($this->db->count_all_results() > 0)
            return FALSE;
        else
            return TRUE;
    }

    function delete_act_types($id)
    {
        $this->db->where('id',$id);
        $params['deleted_at'] = date('Y-m-d H:i:s');
        return $this->db->update('act_types',$params);
    } 
}

?>