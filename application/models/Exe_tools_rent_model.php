<?php

class Exe_tools_rent_model extends CI_Model
{
    function __consruct()
    {
        parent::__construct();
    }

    function get_all_tools_rent_count()
    {
        $this->db->from('exe_tools_rent');
        $this->db->where('deleted_at',NULL);
        return $this->db->count_all_results();
    }
    
    function get_all_tools_rent()
    {
        $this->db->select('t1.*,t2.name as prj_name,t3.tool_name');
        $this->db->join('prj_list as t2', 't2.id = t1.prj_id', 'inner');
        $this->db->join('machinary as t3','t1.tool_id = t3.id','inner');
        return $this->db->get_where('exe_tools_rent t1',array('t1.deleted_at'=>NULL))->result_array();
    }

    function get_tools_rent($id)
    {
        $this->db->select('t1.*,t2.name as prj_name,t3.tool_name');
        $this->db->join('prj_list as t2', 't2.id = t1.prj_id', 'inner');
        $this->db->join('machinary as t3','t1.tool_id = t3.id','inner');
        return $this->db->get_where('exe_tools_rent t1',array('t1.id'=>$id,'t1.deleted_at'=>NULL))->row_array();
    }

    function get_prj_ids()
    {
        $this->db->select('id,name');
        $this->db->from('prj_list');
        return $this->db->get()->result();
    }

    function get_tool_ids()
    {
        $this->db->select('id,tool_name');
        $this->db->from('machinary');
        return $this->db->get()->result();
    }

    function add_tools_rent($params)
    {
        $params['created_at'] = date("Y-m-d H:i:s");

        $this->db->insert('exe_tools_rent',$params);
        return $this->db->insert_id();
    }


    function update_tools_rent($id,$params)
    {
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('exe_tools_rent',$params);
    }

    function delete_tools_rent($id)
    {
        $params['deleted_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('exe_tools_rent',$params);

    }
}
?>
 