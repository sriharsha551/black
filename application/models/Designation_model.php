<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Designation_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get designation by id
     */
    function get_designation($id)
    {
        return $this->db->get_where('designation',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all designation count
     */
    function get_all_designation_count()
    {
        $this->db->from('designation');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all designation
     */
    function get_all_designation($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('designation')->result_array();
    }
        
    /*
     * function to add new designation
     */
    function add_designation($params)
    {
        $this->db->insert('designation',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update designation
     */
    function update_designation($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('designation',$params);
    }
    
    /*
     * function to delete designation
     */
    function delete_designation($id)
    {
        return $this->db->delete('designation',array('id'=>$id));
    }
}