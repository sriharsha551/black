<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Suppliers_model extends CI_Model
{
    public function __construct() {
        parent :: __construct();
    }
    function get_all_Suppliers($params = array())
    {
        $this->db->order_by('t1.id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('t1.delete_status', '0');
        $this->db->select('t1.*');    
        $this->db->from('Suppliers as t1');
        $query = $this->db->get();
        return $query->result_array();
    }
     function add_suppliers($params)
    {
        $this->db->insert('suppliers',$params);
        return $this->db->insert_id();
    }
    function get_suppliers($id)
    {
        return $this->db->get_where('suppliers',array('id'=>$id))->row_array();
    }
    function update_suppliers($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('suppliers',$params);
    }
    public function delete($id)
    {
        $this->db->set(array('delete_status'=>'1'));
        $this->db->where('id',$id);
        $query = $this->db->update('suppliers');
        
    }
}