<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Labour_details_model extends CI_Model
{
    public function __construct() {
        parent :: __construct();
    }
    function get_all_labour($params = array())
    {
        $this->db->order_by('t1.id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('t1.deleted_at',NULL);
        $this->db->select('t1.*,t2.trade_name as trade_name,t3.name');
        $this->db->join('prj_list as t3','t1.prj_id=t3.id','inner');
        $this->db->join('trades as t2','t1.trade_id=t2.id','inner');
        return $this->db->get('exe_lbr_details as t1')->result_array();
    }
    public function get_prj_list($list = array())
    {
        
        $this->db->where('delete_status','0');
        $this->db->select('id,name');
        $this->db->from('prj_list');
        $query = $this->db->get();
        return $query->result_array();
    } 
    public function get_trade($name = array())
    {
        
        $this->db->where('deleted_at',NULL);
        $this->db->select('id,trade_name');
        $this->db->from('trades');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function add_labour($params)
    {
        $params['created_at'] = date("Y-m-d H:i:s");
        $this->db->insert('exe_lbr_details',$params);
        return $this->db->insert_id();
    }
 
        function get_labours($id)
        {
            $this->db->where('id',$id);
            return $this->db->get_where('exe_lbr_details',array('id'=>$id))->row_array();
        }
        function update_labour($id,$params)
        {
            $params['updated_at'] = date('Y-m-d H:i:s');
            $this->db->where('id',$id);
            return $this->db->update('exe_lbr_details',$params);
        }
        function get_labour_detail($id)
        {
            return $this->db->get_where('exe_lbr_details',array('id'=>$id,"deleted_at"=>NULL))->row_array();
        }
        function delete($id)
        {
            $this->db->where('id',$id);
            return $this->db->update('exe_lbr_details',array('deleted_at'=> date('Y-m-d H:i:s')));
        }

}