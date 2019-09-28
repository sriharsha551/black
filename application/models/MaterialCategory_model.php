<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class MaterialCategory_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get MaterialCategory by id
     */
    function get_MaterialCategory($id)
    {
        return $this->db->get_where('prj_mtrl_category',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all MaterialCategory count
     */
    function get_all_MaterialCategory_count()
    {
        $this->db->where('delete_status','0');
        $this->db->from('prj_mtrl_category');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all MaterialCategory
     */
    function get_all_MaterialCategory($params = array())
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('delete_status','0');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('prj_mtrl_category')->result_array();
    }
        
    /*
     * function to add new MaterialCategory
     */
    function add_MaterialCategory($params)
    {
        $this->db->insert('prj_mtrl_category',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update MaterialCategory
     */
    function update_MaterialCategory($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('prj_mtrl_category',$params);
    }
    
    /*
     * function to delete MaterialCategory
     */
    function delete_MaterialCategory($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('prj_mtrl_category',array('delete_status'=>'1'));
    }
}
