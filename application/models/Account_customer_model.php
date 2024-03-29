<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Account_customer_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get Account_customer by id
     */
    function get_Account_customer($id)
    {

        return $this->db->get_where('act_customer',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all Account_customer count
     */
    function get_all_Account_customer_count()
    {
        $this->db->where('delete_status','0');
        $this->db->from('act_customer as t1');
        return $this->db->count_all_results();
    }
      /*
     * Get tax details
     */
    function get_tax()
    {
        $this->db->where('delete_status','0');
        return ($this->db->get('act_tax')->result_array());
    }
     function get_in_tax($id)
     {
        $this->db->where('id',$id);
        return ($this->db->get('act_tax')->result_array());
     }    
    /*
     * Get all Account_customer
     */
    function get_all_Account_customer($params = array())
    {
        $this->db->where('t1.delete_status','0');
        $this->db->order_by('id', 'desc');
        $this->db->select('t1.*,t2.name as tax_name,  t3.name as prj_name');
        $this->db->join('act_tax as t2','t1.tax_number=t2.id');
        $this->db->join('prj_list as t3', 't1.prj_id = t3.id','inner');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('act_customer as t1')->result_array();
    }
        
    /*
     * function to add new Account_customer
     */
    function add_Account_customer($params)
    {
        $this->db->insert('act_customer',$params);
        return $this->db->insert_id();
    }

    function get_all_prj_list()
    {
        $this->db->where('delete_status','0');
        $this->db->select('id, name');
        $this->db->from('prj_list');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    /*
     * function to update Account_customer
     */
    function update_Account_customer($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('act_customer',$params);
    }
    
    /*
     * function to delete Account_customer
     */
    function delete_Account_customer($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('act_customer',array('delete_status' => '1'));
    }
}
