<?php

class Prj_dsg_stage_model extends CI_Model
{
    function __consruct()
    {
        parent::__construct();
    }

    function get_all_stages($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get_where('Prj_dsg_stage',array('delete_status'=>'0'))->result_array();
    }

    function get_stage($id)
    {
        return $this->db->get_where('prj_dsg_stage',array('id'=>$id,"delete_status"=>'0'))->row_array();
    }

    function get_all_stages_count()
    {
        $this->db->from('prj_dsg_stage');
        $this->db->where(array('delete_status'=>'0'));
        return $this->db->count_all_results();
    }

    function add_stage($params)
    {
        $this->db->insert('prj_dsg_stage',$params);
        return $this->db->insert_id();
    }

    function update_stage($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('prj_dsg_stage',$params);
    }

    function delete_stage($id)
    {
        $this->db->set(array('delete_status'=>'1'));
        $this->db->where('id',$id);
        return $this->db->update('prj_dsg_stage');

    }

}

?>