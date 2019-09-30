<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Vendors_model extends CI_Model
{
    public function __construct() {
        parent :: __construct();
    }
    function get_all_Vendors($params = array())
    {
        $this->db->order_by('t1.id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('t1.deleted_at',NULL);
        $this->db->select('t1.*,t2.tool_name as tool_name');
        $this->db->join('machinary as t2','t1.tool_id=t2.id','inner');
        return $this->db->get('vendors as t1')->result_array();
    }

    function get_machinary($tool = array())
    {
        $this->db->where('deleted_at',NUll);
        $this->db->select('id,tool_name');
        $this->db->from('machinary');
        $query = $this->db->get();
        return $query->result_array();
    }
    function add_vendors($params)
    {
        $params['created_at'] = date("Y-m-d H:i:s");

        $this->db->insert('vendors',$params);
        return $this->db->insert_id();
    }
    function update_vendors($id,$params)
    {
        $params['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        return $this->db->update('vendors',$params);
    }
    function delete_vendors($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('vendors',array('deleted_at'=> date('Y-m-d H:i:s')));
    }
    function get_vendors($id)
    {
        $this->db->where('id',$id);
        return $this->db->get_where('vendors',array('id'=>$id))->row_array();
    }
    function get_vendors_detail($id)
    {
        return $this->db->get_where('vendors',array('id'=>$id,"deleted_at"=>NULL))->row_array();
    }
}