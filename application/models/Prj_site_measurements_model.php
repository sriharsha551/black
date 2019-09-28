<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Prj_site_measurements_model extends CI_Model
{
    public function __construct() {
        parent :: __construct();
    }
    function get_site_measurement($id)
    {
        return $this->db->get_where('prj_site_measurements',array('id'=>$id))->row_array();
    }
    function get_all_prj_site_measurements_count()
    {
        $this->db->from('prj_site_measurements');
        return $this->db->count_all_results();
    }
    function get_all_project_list() {
        $this->db->select('id,name');
        $this->db->from('prj_list');
        $query = $this->db->get();
        return $query->result_array();
    }
    function add_site_measurements($params)
    {
        // $params['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('prj_site_measurements',$params);
        return $this->db->insert_id();
    }
    function get_all_prj_site_measurements($params = array())
    {
        $this->db->order_by('t1.id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('t1.delete_status', '0');
        $this->db->select('t1.*,t2.id as prj_id,t2.name as prj_name');    
        $this->db->from('prj_site_measurements as t1');
        $this->db->join('prj_list as t2','t1.project_id = t2.id','inner');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_data($id) {
        $this->db->where('delete_status','0');
        $this->db->where('id',$id);
        $this->db->select('*');
        $this->db->from('prj_site_measurements');
      
        $query = $this->db->get();
        return $query->result();
    }
   
    public function insert($data)
    {
        $status=$this->db->insert('prj_site_measurements',$data);
        return $status;

    }
    function update_site_measurement($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('prj_site_measurements',$params);
    }
    public function delete($id)
    {
        $this->db->set(array('delete_status'=>'1'));
        $this->db->where('id',$id);
        $query = $this->db->update('prj_site_measurements');
        
    }
    
}