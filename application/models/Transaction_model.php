<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Transaction_model extends CI_Model
{
    public function __construct() {
        parent :: __construct();
    }
    public function get_all_Transaction($params = array())
    {
        $this->db->order_by('t1.id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('t1.delete_status', '0');
        $this->db->select('t1.*,t2.name as coa_name');
        $this->db->join('act_coa as t2 ','t1.coa_id=t2.id','inner');

        $this->db->from('act_transaction as t1');
        $query = $this->db->get();
        return $query->result_array();

    }

    function get_all_coa_list($coa = array())
    {
    $this->db->select('id,name');
    $this->db->from('act_coa');
    $query = $this->db->get();
    return $query->result_array();
    }
    function add_Transaction($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('act_transaction',$params);
        return $this->db->insert_id();
    }
    function get_transactions($id)
    {
        return $this->db->get_where('act_transaction',array('id'=>$id))->row_array();
    }
    function get_transactions_detail($id)
    {
        return $this->db->get_where('act_transaction',array('id'=>$id,"delete_status"=>'0'))->row_array();
    }
    function delete_transactions($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('act_transaction',array('deleted_at'=> date('Y-m-d H:i:s'), 'delete_status' => '1'));
    }
    function update_transaction($id,$params)
    {
        $params['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        return $this->db->update('act_transaction ',$params);
    }
    
}

