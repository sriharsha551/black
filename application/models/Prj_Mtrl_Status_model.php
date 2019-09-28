<?php

    class Prj_Mtrl_Status_model extends CI_Model{
        public function __construct(){
            parent :: __construct();
        }

        public function getData(){
            $this->db->where('delete_status','0');
            $this->db->select('id,mtrl_status');
            return $this->db->get('prj_mtrl_status')->result_array();
            
        }

        public function getCount(){
            $this->db->where('delete_status','0');
            return $this->db->get('prj_mtrl_status')->num_rows();
        }

        public function checkData($data){
            $this->db->where('delete_status','0');
            $this->db->where('mtrl_status',$data);
            return $this->db->get('prj_mtrl_status')->num_rows();
        }

        public function checkEdit($id,$data){
            $this->db->where('delete_status','0');
            $this->db->where('id !=',$id);
            $this->db->where('mtrl_status',$data);
            return $this->db->get('prj_mtrl_status')->num_rows();
        }

        public function getDetail($id){
            $this->db->where('id',$id);
            return $this->db->get('prj_mtrl_status')->row_array();
        }

        public function addData($data){
            $data['delete_status']='0';
            $stat = $this->db->insert('prj_mtrl_status',$data);
            return $stat;
        }

        public function editDetail($id,$data){
            $this->db->where('id',$id);
            $stat = $this->db->update('prj_mtrl_status',$data);
            return $stat;
        }

        public function deleteData($id){
            $data['delete_status']='1';
            $this->db->where('id',$id);
            $this->db->update('prj_mtrl_status',$data);
        }
    }

?>