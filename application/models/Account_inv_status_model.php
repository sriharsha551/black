<?php

class Account_inv_status_model extends CI_Model
{
    function __construct()
    {
        parent :: __construct();
    }

    function get_invoice_status_count() 
    {
        $this->db->where('deleted_at', null);
        $this->db->from('act_inv_status');
        return $this->db->count_all_results();
    }

    function get_all_invoice_statuses($params = array())
    {
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('deleted_at', null);
        $this->db->select('id, name');    
        $this->db->from('act_inv_status');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_invoice_status_detail($id)
    {
        $this->db->where(array('id' => $id, 'deleted_at' => null));
        $this->db->select('name, id');
        $query = $this->db->get('act_inv_status');
        return $query->row_array();
    }

    function add_invoice_status($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('act_inv_status',$params);
        return $this->db->insert_id();
    }

    function edit_invoice_status($id,$params)
    {
        $params['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        return $this->db->update('act_inv_status',$params);
    }

    function delete_invoice_status($id)
    {
        $this->db->where('id',$id);
        $params['deleted_at'] = date('Y-m-d H:i:s');
        return $this->db->update('act_inv_status',$params);
    } 
}

?>