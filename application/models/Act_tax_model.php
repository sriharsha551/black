<?php 

    class Act_tax_model extends CI_Model{
        public function __construct(){
            parent :: __construct();
        }

        public function get_count(){
            $this->db->where('deleted_at',NULL);
            return $this->db->get('act_tax')->num_rows();
        }

        public function get_all_taxes(){
            $this->db->where('deleted_at',NULL);
            $this->db->select('id,name,value');
            return $this->db->get('act_tax')->result_array();
        }

        public function addDetail($data){
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['lock_st']='0';
            $this->db->insert('act_tax',$data);
        }    

        public function getDetail($id){
            $this->db->where('id',$id);
            $this->db->select('id,name,value');
            return $this->db->get('act_tax')->row_array();
        }

        public function editDetail($id,$data){
            $this->db->where('id',$id);
            $params['updated_at'] = date('Y-m-d H:i:s');
            $this->db->update('act_tax',$data);
        }

        public function deleteDetail($id){
            $this->db->where('id',$id);
            $params['deleted_at'] = date('Y-m-d H:i:s');
            $this->db->update('act_tax',$params);
        }

        public function checkData($data){
            $this->db->where('deleted_at ',NULL);
            $this->db->where('name',$data);
            return $this->db->get('act_tax')->num_rows();
        }

        public function checkEdit($id,$data){
            $this->db->where('name',$data);
            $this->db->where('deleted_at',NULL);
            $this->db->where('id !=',$id);
            return $this->db->get('act_tax')->num_rows();
        }

    }

?>