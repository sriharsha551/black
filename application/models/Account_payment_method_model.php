<?php

class Account_payment_method_model extends CI_Model
{
    function __construct()
    {
        parent :: __construct();
    }

    function get_payment_method_count() 
    {
        $this->db->where('deleted_at', null);
        $this->db->from('act_payment_method');
        return $this->db->count_all_results();
    }

    function get_all_payment_methods($params = array())
    {
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('deleted_at', null);
        $this->db->select('id, name');    
        $this->db->from('act_payment_method');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_payment_method_detail($id)
    {
        $this->db->where(array('id' => $id, 'deleted_at' => null));
        $this->db->select('name, id');
        $query = $this->db->get('act_payment_method');
        return $query->row_array();
    }

    function add_payment_method($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('act_payment_method',$params);
        return $this->db->insert_id();
    }

    function edit_payment_method($id,$params)
    {
        $params['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        return $this->db->update('act_payment_method',$params);
    }

    function delete_payment_method($id)
    {
        $this->db->where('id',$id);
        $params['deleted_at'] = date('Y-m-d H:i:s');
        return $this->db->update('act_payment_method',$params);
    } 
}

?>