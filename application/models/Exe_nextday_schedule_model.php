<?php

class Exe_nextday_schedule_model extends CI_Model
{
    function __consruct()
    {
        parent::__construct();
    }

    function get_all_schedule_count()
    {
        $this->db->from('exe_nextday_schedule');
        $this->db->where('deleted_at',NULL);
        return $this->db->count_all_results();
    }
    
    function get_all_schedule()
    {
        $this->db->select('t1.*,t2.name as prj_name,t3.trade_name,,t5.area');
        $this->db->join('prj_list as t2', 't2.id = t1.prj_id', 'inner');
        $this->db->join('trades as t3','t1.trade_id = t3.id','inner');
        $this->db->join('area as t5', 't5.id = t1.area_id', 'inner');
        return $this->db->get_where('exe_nextday_schedule t1',array('t1.deleted_at'=>NULL))->result_array();
    }

    function get_schedule($id)
    {
        $this->db->select('t1.*,t2.name as prj_name,t3.trade_name,,t5.area');
        $this->db->join('prj_list as t2', 't2.id = t1.prj_id', 'inner');
        $this->db->join('trades as t3','t1.trade_id = t3.id','inner');
        $this->db->join('area as t5', 't5.id = t1.area_id', 'inner');
        return $this->db->get_where('exe_nextday_schedule t1',array('t1.id'=>$id,'t1.deleted_at'=>NULL))->row_array();
    }

    function get_prj_ids()
    {
        $this->db->select('id,name');
        $this->db->from('prj_list');
        return $this->db->get()->result();
    }

    function get_trade_ids()
    {
        $this->db->select('id,trade_name');
        $this->db->from('trades');
        return $this->db->get()->result();
    }

    function get_area_ids()
    {
        $this->db->select('id, area');
        $this->db->from('area');
        return $this->db->get()->result();
    }

    function add_schedule($params)
    {
        $params['created_at'] = date("Y-m-d H:i:s");

        $this->db->insert('exe_nextday_schedule',$params);
        return $this->db->insert_id();
    }


    function update_schedule($id,$params)
    {
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('exe_nextday_schedule',$params);
    }

    function delete_schedule($id)
    {
        $params['deleted_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('exe_nextday_schedule',$params);

    }
}
?>
 