<?php

class Account_trans_type_model extends CI_Model
{
    function __construct()
    {
        parent :: __construct();
    }

    function get_trans_type_count() 
    {
        $this->db->where('deleted_at', null);
        $this->db->from('act_trans_type');
        return $this->db->count_all_results();
    }

    function get_all_trans_types($params = array())
    {
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('deleted_at', null);
        $this->db->select('id, trans_type');    
        $this->db->from('act_trans_type');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_trans_type_detail($id)
    {
        $this->db->where(array('id' => $id, 'deleted_at' => null));
        $this->db->select('trans_type, id');
        $query = $this->db->get('act_trans_type');
        return $query->row_array();
    }

    function add_trans_type($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('act_trans_type',$params);
        return $this->db->insert_id();
    }

    function edit_trans_type($id,$params)
    {
        $params['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        return $this->db->update('act_trans_type',$params);
    }

    function delete_trans_type($id)
    {
        $this->db->where('id',$id);
        $params['deleted_at'] = date('Y-m-d H:i:s');
        return $this->db->update('act_trans_type',$params);
    } 
}

?>