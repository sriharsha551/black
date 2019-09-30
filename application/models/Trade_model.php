<?php
 
class  Trade_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_all_trade()
    {
        $this->db->where('deleted_at',NULL);
        $this->db->select('*');
        return $this->db->get('trades')->result_array();
    }

    function get_trade($id)
    {
        $this->db->where('deleted_at',NULL);
        $this->db->where('id',$id);
        $this->db->select('*');
        return $this->db->get('trades')->result_array();
    }

    function add_trade($param)
    {
        $param['created_at']  = date('Y-m-d H:i:s');
        $this->db->insert('trades',$param);
        return $this->db->insert_id();
    }

    function update_trade($id,$param)
    {
        $param['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where("id",$id);
        $this->db->update('trades',$param);
    }

    function delete_trade($id,$param)
    {
        $param['deleted_at'] = date('Y-m-d H:i:s');
        $this->db->where("id",$id);
        $this->db->update('trades',$param);    
    }
}