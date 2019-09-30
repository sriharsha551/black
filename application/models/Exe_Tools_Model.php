<?php

    class Exe_Tools_Model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function getCount()
        {
            $this->db->where('deleted_at',NULL);
            return $this->db->get('exe_tools')->num_rows();
        }

        public function getData()
        {
            $this->db->where('t.deleted_at',NULL);
            $this->db->select('t.id,p.name,m.tool_name,t.qty');
            $this->db->from('exe_tools as t');
            $this->db->join('prj_list as p','t.prj_id = p.id','inner');
            $this->db->join('machinary as m','t.tool_id = m.id','inner');
            return $this->db->get()->result_array();
        }

        public function getProjects()
        {
            $this->db->where('delete_status','0');
            return $this->db->get('prj_list')->result_array();
        }

        public function getTools()
        {
            $this->db->where('deleted_at',NULL);
            return $this->db->get('machinary')->result_array();
        }

        public function addData($data)
        {
            $data['created_at'] = date("Y-m-d H:i:s");
            $this->db->insert('exe_tools',$data);
            return $this->db->insert_id();
        }

        public function getDetail($id)
        {
            $this->db->where("id",$id);
            return $this->db->get('exe_tools')->row_array();
        }

        public function editData($id,$data)
        {
            $data['updated_at'] = date("Y-m-d H:i:s");
            $this->db->where('id',$id);
            return $this->db->update('exe_tools',$data);
        }

        public function deleteData($id)
        {
            $data['deleted_at'] = date("Y-m-d H:i:s");
            $this->db->where("id",$id);
            return $this->db->update('exe_tools',$data);
        }
    }

?>