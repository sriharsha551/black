<?php

    class Stage_model extends CI_Model{
        public function __construct(){
            parent :: __construct();
        }

        public function getAllStages(){
            $this->db->where('delete_status','0');
            $this->db->select('id,stage_name');
            return $this->db->get('prj_stages')->result_array();
            
        }

        public function getCount(){
            $this->db->where('delete_status','0');
            return $this->db->get('prj_stages')->num_rows();
        }

        public function getStage($id){
            $this->db->where('id',$id);
            return $this->db->get('prj_stages')->row_array();
        }

        public function addStage($data){
            $data['delete_status']='0';
            $stat = $this->db->insert('prj_stages',$data);
            return $stat;
        }

        public function editStage($id,$data){
            $this->db->where('id',$id);
            $stat = $this->db->update('prj_stages',$data);
            return $stat;
        }

        public function deleteStage($id){
            $data['delete_status']='1';
            $this->db->where('id',$id);
            $this->db->update('prj_stages',$data);
        }
    }

?>