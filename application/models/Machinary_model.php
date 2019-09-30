<?php
 
class  Machinary_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_all_tools($params = array())
    {
        $this->db->order_by('t1.id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('t1.deleted_at', NULL);
        $this->db->select('t1.id,t1.tool_name,t1.qty');    
        $this->db->from('machinary as t1');
        $query = $this->db->get();
        return $query->result_array();
    }

    function add_machinary($params)
    {
            $params['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert('machinary',$params);
            return $this->db->insert_id();
    
    }
    function get_machinary($id)
    {
        return $this->db->get_where('machinary',array('id'=>$id))->row_array();
    }
    function update_machinary($id,$params)
    {
        $params['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        return $this->db->update('machinary',$params);

    }
    function delete($id)
    {
        $this->db->where('id',$id);
        $params['deleted_at'] = date('Y-m-d H:i:s');
        return $this->db->update('machinary',$params);
      }
}