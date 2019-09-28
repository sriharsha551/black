<?php

    class Prj_Review_model extends CI_Model{
        public function __construct(){
            parent :: __construct();
        }

        public function getAllReviews(){
            $this->db->where('delete_status','0');
            $this->db->select('id,review_status_name');
            return $this->db->get('prj_review_status')->result_array();
            
        }

        public function getCount(){
            $this->db->where('delete_status','0');
            return $this->db->get('prj_review_status')->num_rows();
        }

        public function getReview($id){
            $this->db->where('id',$id);
            return $this->db->get('prj_review_status')->row_array();
        }

        public function addReview($data){
            $data['delete_status']='0';
            $stat = $this->db->insert('prj_review_status',$data);
            return $stat;
        }

        public function deleteReview($id){
            $data['delete_status']='1';
            $this->db->where('id',$id);
            $this->db->update('prj_review_status',$data);
        }
    }

?>