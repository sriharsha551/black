<?php 

    class Act_bill_status_model extends CI_Model{
        public function __construct(){
            parent :: __construct();
        }

        public function get_count(){
            $this->db->where('deleted_at !=',NULL);
            return $this->db->get('act_bill_status')->num_rows();
        }

        public function get_all_status(){
            $this->db->where('deleted_at ',NULL);
            $this->db->select('id,name');
            return $this->db->get('act_bill_status')->result_array();
        }

        public function addDetail($data){
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['lock_stat']='0';
            $this->db->insert('act_bill_status',$data);
        }    

        public function getDetail($id){
            $this->db->where('id',$id);
            $this->db->select('id,name');
            return $this->db->get('act_bill_status')->row_array();
        }

        public function editDetail($id,$data){
            $this->db->where('id',$id);
            $params['updated_at'] = date('Y-m-d H:i:s');
            $this->db->update('act_bill_status',$data);
        }

        public function deleteDetail($id){
            $this->db->where('id',$id);
            $params['deleted_at'] = date('Y-m-d H:i:s');
            $this->db->update('act_bill_status',$params);
        }

        public function checkData($data){
            $this->db->where('deleted_at ',NULL);
            $this->db->where('name',$data);
            return $this->db->get('act_bill_status')->num_rows();
        }

        public function checkEdit($id,$data){
            $this->db->where('name',$data);
            $this->db->where('deleted_at !=',NULL);
            $this->db->where('id !=',$id);
            return $this->db->get('act_bill_status')->num_rows();
        }

    }

?>