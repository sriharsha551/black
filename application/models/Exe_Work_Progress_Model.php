<?php

    class Exe_Work_Progress_Model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function getCount()
        {
            $this->db->where('deleted_at',NULL);
            return $this->db->get('exe_work_progress')->num_rows();
        }

        public function getData()
        {
            $this->db->where('t.deleted_at',NULL);
            $this->db->select('t.id,p.name,t.date,m.trade_name,a.area,t.work_description');
            $this->db->from('exe_work_progress as t');
            $this->db->join('prj_list as p','t.prj_id = p.id','inner');
            $this->db->join('trades as m','t.trade_id = m.id','inner');
            $this->db->join('area as a','t.area_id = a.id','inner');
            return $this->db->get()->result_array();
        }

        public function getProjects()
        {
            $this->db->where('delete_status','0');
            return $this->db->get('prj_list')->result_array();
        }

        public function getTrades()
        {
            $this->db->where('deleted_at',NULL);
            return $this->db->get('trades')->result_array();
        }

        public function getAreas()
        {
            $this->db->where('deleted_at',NULL);
            return $this->db->get('area')->result_array();
        }

        public function addData($data)
        {
            $data['created_at'] = date("Y-m-d H:i:s");
            $this->db->insert('exe_work_progress',$data);
            return $this->db->insert_id();
        }

        public function getDetail($id)
        {
            $this->db->where("id",$id);
            return $this->db->get('exe_work_progress')->row_array();
        }

        public function editData($id,$data)
        {
            $data['updated_at'] = date("Y-m-d H:i:s");
            $this->db->where('id',$id);
            return $this->db->update('exe_work_progress',$data);
        }

        public function deleteData($id)
        {
            $data['deleted_at'] = date("Y-m-d H:i:s");
            $this->db->where("id",$id);
            return $this->db->update('exe_work_progress',$data);
        }
    }

?>