<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class MaterialItems_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get MaterialItems by id
     */
    function get_MaterialItems($id)
    {
        // $this->db->where('project_id',$id);
        // print_r($this->db->get('prj_mtrl_items')->row_array());
        return $this->db->get_where('prj_mtrl_items',array('id'=>$id))->row_array();
    }
    function get_name($id){
        $this->db->where('id',$id);
        $this->db->select('material_category');
        $this->db->from('prj_mtrl_category');
        $query= $this->db->get();
        return ($query->result_array()['0']['material_category']);
    }
    function get_supplier_name($id){
        $this->db->where('id',$id);
        $this->db->select('name');
        $this->db->from('suppliers');
        $query= $this->db->get();
         return ($query->result_array()['0']['name']);
    }

    /*
     * Get all MaterialItems count
     */
    function get_all_MaterialItems_count()
    {
        $this->db->from('prj_mtrl_items');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all MaterialItems
     */
    function get_all_MaterialItems($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('t1.delete_status', '0');
        $this->db->select('t1.*, t2.material_category,e.name');    
        $this->db->from('prj_mtrl_items as t1');
        $this->db->join('prj_mtrl_category as t2', 't1.material_cat_id = t2.id');
        $this->db->join('suppliers as e','t1.supplier_id = e.id');

        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new MaterialItems
     */
    function add_MaterialItems($params)
    {
        $this->db->insert('prj_mtrl_items',$params);
        return $this->db->insert_id();
    }  
    public function select()  
      {  
        $this->db->select("id,material_category");
        $this->db->where('delete_status','0');
		$this->db->from('prj_mtrl_category'); 
        $query = $this->db->get();
		return $query->result_array();
	  }  
	  public function selectSupplier()  
      {  
		$this->db->select("id,name");
        $this->db->from('suppliers'); 
        $this->db->where('delete_status','0');
        $query1 = $this->db->get();
		return $query1->result_array();
	  }  
    
    /*
     * function to update MaterialItems
     */
    function update_MaterialItems($id,$params)
    {
        $this->db->where('id',$id);
        return($this->db->update('prj_mtrl_items',$params));
    }
    
    /*
     * function to delete MaterialItems
     */
    function delete_MaterialItems($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('prj_mtrl_items',array('delete_status' => '1'));
    }
}