<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class MaterialSpecification_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get MaterialSpecification by id
     */
    function get_MaterialSpecification($id)
    {
        return $this->db->get_where('prj_mtrl_spec',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all MaterialSpecification count
     */
    function get_all_MaterialSpecification_count()
    {
        $this->db->from('prj_mtrl_spec');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all MaterialSpecification
     */
    function get_all_MaterialSpecification($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('t1.delete_status', '0');
        $this->db->select('t1.*,t2.name,t3.material_category,t4.material_name,t5.name as supplier_name');    
        $this->db->from('prj_mtrl_spec as t1');
        $this->db->join('prj_list as t2', 't1.project_id = t2.id');
        $this->db->join('prj_mtrl_category as t3','t1.material_cat_id = t3.id');
        $this->db->join('prj_mtrl_items as t4','t1.material_item_id = t4.id');
        $this->db->join('suppliers as t5','t5.id=t1.supplier_id');
        return($this->db->get()->result_array());
    }
        
    /*
     * function to add new MaterialSpecification
     */
    function add_MaterialSpecification($params)
    {
        $this->db->insert('prj_mtrl_spec',$params);
        return $this->db->insert_id();
    }
    public function select()  
      {  
        $this->db->select("id,name");
		$this->db->from('prj_list'); 
        $query = $this->db->get();
		return $query->result();
      }
      function selectCat() 
      {
        $this->db->select("id,material_category");
        $this->db->where('delete_status','0');
		$this->db->from('prj_mtrl_category'); 
        $query = $this->db->get();
		return $query->result();
      } 
      function selectitem() 
      {
        $this->db->select("id,material_name");
        $this->db->where('delete_status','0');
		$this->db->from('prj_mtrl_items'); 
        $query = $this->db->get();
		return $query->result();
      } 
      function selectsupplier() 
      {
        $this->db->select("id,name");
        $this->db->where('delete_status','0');
		$this->db->from('suppliers'); 
        $query = $this->db->get();
		return $query->result();
      } 
      function get_name($id){
          
        $this->db->where('id',$id);
        $this->db->select('name');
        $this->db->from('prj_list');
        $query= $this->db->get();

         return (get_object_vars($query->result()[0])['name']);
    } 
    function get_cat_name($id){
          
        $this->db->where('id',$id);
        $this->db->select('material_category');
        $this->db->from('prj_mtrl_category');
        $query= $this->db->get();

         return (get_object_vars($query->result()[0])['material_category']);
    } 
    function get_item_name($id){
          
        $this->db->where('id',$id);
        $this->db->select('material_name');
        $this->db->from('prj_mtrl_items');
        $query= $this->db->get();

         return (get_object_vars($query->result()[0])['material_name']);
    } 
    function get_sup_name($id){
          
        $this->db->where('id',$id);
        $this->db->select('name');
        $this->db->from('suppliers');
        $query= $this->db->get();

         return (get_object_vars($query->result()[0])['name']);
    } 
    
    /*
     * function to update MaterialSpecification
     */
    function update_MaterialSpecification($id,$params)
    { 
        $this->db->where('id',$id);
        return($this->db->update('prj_mtrl_spec',$params));
    }

    
    /*
     * function to delete MaterialSpecification
     */
    function delete_MaterialSpecification($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('prj_mtrl_spec',array('delete_status' => '1'));
    }
}