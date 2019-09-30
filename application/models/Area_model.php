<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Area_model extends CI_Model
{
    public function __construct() {
        parent :: __construct();
    }
    public function get_all_area($params = array())
    {
        $this->db->order_by('t1.id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('t1.deleted_at',NULL);
        $this->db->select('t1.*,t2.name as prj_name');
        $this->db->join('prj_list as t2','t1.prj_id=t2.id','inner');
        return $this->db->get('area as t1')->result_array();
    }
    public function get_prj_list($tool = array())
    {
        
        $this->db->where('delete_status','0');
        $this->db->select('id,name');
        $this->db->from('prj_list');
        $query = $this->db->get();
        return $query->result_array();
    }
    function add_area($params)
    {
        $params['created_at'] = date("Y-m-d H:i:s");
        $this->db->insert('area',$params);
        return $this->db->insert_id();
    }
    function get_area_list($id)
    {
        $this->db->where('id',$id);
        return $this->db->get_where('area',array('id'=>$id))->row_array();
    }
    function update_area($id,$params)
    {
        $params['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        return $this->db->update('area',$params);
    }
    function get_area_detail($id)
    {
        return $this->db->get_where('area',array('id'=>$id,"deleted_at"=>NULL))->row_array();
    }
    function delete_area($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('area',array('deleted_at'=> date('Y-m-d H:i:s')));
    }
}