<?php
 
class  Credit_days_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_all_cr_days($params = array())
    {
        $this->db->order_by('t1.id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('t1.delete_status', '0');
        $this->db->select('t1.id,t1.name,t1.days');    
        $this->db->from('act_cr_days as t1');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_credit_days($id)
    {
        return $this->db->get_where('act_cr_days',array('id'=>$id))->row_array();
    }
    function add_credit_days($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('act_cr_days',$params);
        return $this->db->insert_id();
    }
    function update_credit($id,$params)
    {
        $params['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        return $this->db->update('act_cr_days',$params);
    }
    function get_credit_days_detail($id)
    {
        return $this->db->get_where('act_cr_days',array('id'=>$id,"delete_status"=>'0'))->row_array();
    }
    function delete($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('act_cr_days',array('deleted_at'=> date('Y-m-d H:i:s'), 'delete_status' => '1'));

    }
} 
