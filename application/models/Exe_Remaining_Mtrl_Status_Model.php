<?php

    class Exe_Remaining_Mtrl_Status_Model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function getCount()
        {
            $this->db->where('deleted_at',NULL);
            return $this->db->get('exe_remaining_status')->num_rows();
        }

        public function getData()
        {
            $this->db->where('t.deleted_at',NULL);
            $this->db->select('t.id,p.name,t.date,m.material_name,t.qty_order,t.order_date,t.qty_recived,t.recived_date,t.qty_utilised,,t.utl_date');
            $this->db->from('exe_remaining_status as t');
            $this->db->join('prj_list as p','t.prj_id = p.id','inner');
            $this->db->join('prj_mtrl_items as m','t.material_id = m.id','inner');
            return $this->db->get()->result_array();
        }

        public function getProjects()
        {
            $this->db->where('delete_status','0');
            return $this->db->get('prj_list')->result_array();
        }

        public function getPO()
        {
            $this->db->where('deleted_at',NULL);
            return $this->db->get('act_purchase_order')->result_array();
        }

        public function getMaterials()
        {
            $this->db->where('delete_status','0');
            return $this->db->get('prj_mtrl_items')->result_array();
        }

        public function addData($data)
        {
            $data['created_at'] = date("Y-m-d H:i:s");
            $this->db->insert('exe_remaining_status',$data);
            return $this->db->insert_id();
        }

        public function getDetail($id)
        {
            $this->db->where("id",$id);
            return $this->db->get('exe_remaining_status')->row_array();
        }

        public function editData($id,$data)
        {
            $data['updated_at'] = date("Y-m-d H:i:s");
            $this->db->where('id',$id);
            return $this->db->update('exe_remaining_status',$data);
        }

        public function deleteData($id)
        {
            $data['deleted_at'] = date("Y-m-d H:i:s");
            $this->db->where("id",$id);
            return $this->db->update('exe_remaining_status',$data);
        }
    }

?>