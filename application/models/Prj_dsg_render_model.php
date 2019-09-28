<?php

class Prj_dsg_render_model extends CI_Model
{
    function __consruct()
    {
        parent::__construct();
    }
 
    function get_prj_names()
    {
        $this->db->select('id,name');
        return $this->db->get_where('prj_list',array('delete_status'=>'0'))->result();
    }

    function get_proj_name($id) {
        $this->db->where('id', $id);
        $this->db->where('delete_status', '0');
        $this->db->select('name');
        $this->db->from('prj_list');
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->row()->name;
        }
        return null;
    }

    function get_dsg_names()
    {
        $this->db->select('id,design_stage');
        $this->db->from('prj_dsg_stage');
        return $this->db->get()->result();
    }

    function get_all_renders($params = array())
    {
        $this->db->order_by('t1.id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->select('t1.*,t2.name as prj_name,t3.review_status_name');
        $this->db->join('prj_list as t2', 't2.id = t1.prj_id', 'inner');
        $this->db->join('prj_review_status as t3','t3.id=t1.review_status','inner');
        return $this->db->get_where('prj_dsg_render t1',array('t1.delete_status'=>'0'))->result_array();
    }

    function get_all_renders_count()
    {
        $this->db->from('prj_dsg_render');
        $this->db->where(array('delete_status'=>'0'));
        return $this->db->count_all_results();
    }

    function get_all_review_status() {
        $this->db->select('id, review_status_name');
        $this->db->from('prj_review_status');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_render($id)
    {
        return $this->db->get_where('prj_dsg_render',array('id'=>$id,"delete_status"=>'0'))->row_array();
    }

    function add_render($params)
    {
        $params['created_at'] =  $timestamp =date("Y-m-d H:i:s");
        $this->db->insert('prj_dsg_render',$params);
        return $this->db->insert_id();
    }

    function update_render($id,$params)
    {
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('prj_dsg_render',$params);
    }

    function update_render_revision($id,$remarks)
    {
        $remarks['updated_at'] = date("Y-m-d H:i:s");
        $this->db->set($remarks);
        $this->db->where('id',$id);
        $this->db->update('prj_dsg_render');
        $this->db->select('prj_id,name,percentage,revisions');
        $data = $this->db->get_where('prj_dsg_render',array("id"=>$id,"delete_status"=>'0'))->result_array();
        $data[0]['revisions']=($data['0']['revisions'][0].((int)$data['0']['revisions'][1]+1));
        $data[0]['created_at'] = date("Y-m-d H:i:s");
        $data[0]['review_status'] = 1;
        $this->db->insert('prj_dsg_render',$data[0]);
        return $this->db->insert_id();
    }

    function delete_render($id)
    {
        $params['deleted_at'] = date("Y-m-d H:i:s");
        $this->db->set(array('delete_status'=>'1'));
        $this->db->where('id',$id);
        return $this->db->update('prj_dsg_render');

    }
}
?>