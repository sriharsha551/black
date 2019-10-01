<?php

class Exe_client_request_model extends CI_Model
{
    function __consruct()
    {
        parent::__construct();
    }

    function get_all_request_count()
    {
        $this->db->from('exe_client_request');
        $this->db->where('deleted_at',NULL);
        return $this->db->count_all_results();
    }
    
    function get_all_request()
    {
        $this->db->select('t1.*,t2.name as prj_name,t5.material_name');
        $this->db->join('prj_list as t2', 't2.id = t1.prj_id', 'inner');
        $this->db->join('prj_mtrl_items as t5', 't5.id = t1.material_id', 'inner');
        return $this->db->get_where('exe_client_request t1',array('t1.deleted_at'=>NULL))->result_array();
    }

    function get_request($id)
    {
        $this->db->select('t1.*,t2.name as prj_name,t5.material_name');
        $this->db->join('prj_list as t2', 't2.id = t1.prj_id', 'inner');
        $this->db->join('prj_mtrl_items as t5', 't5.id = t1.material_id', 'inner');
        return $this->db->get_where('exe_client_request t1',array('t1.id'=>$id,'t1.deleted_at'=>NULL))->row_array();
    }

    function get_prj_ids()
    {
        $this->db->select('id,name');
        $this->db->from('prj_list');
        return $this->db->get()->result();
    }

    function get_material_ids()
    {
        $this->db->select('id, material_name');
        $this->db->from('prj_mtrl_items');
        return $this->db->get()->result();
    }

    function add_request($params)
    {
        $params['created_at'] = date("Y-m-d H:i:s");

        $this->db->insert('exe_client_request',$params);
        return $this->db->insert_id();
    }


    function update_request($id,$params)
    {
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('exe_client_request',$params);
    }

    function delete_request($id)
    {
        $params['deleted_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('exe_client_request',$params);

    }
}
?>
 