<?php
    class Category_Model extends CI_Model{

        public function __construct(){
            parent::__construct();
        }


        public function getTypes(){
            $this->db->where('delete_status','0');
            $this->db->select('id,type');
            return $res = $this->db->get('prj_type')->result_array();
        }

        public function getCount(){
            $this->db->where('delete_status','0');
            return $this->db->get('prj_category')->num_rows();            
        }

        public function getAllCategories(){
            $this->db->where('c.delete_status','0');
            $this->db->select('c.id,c.category,t.type');
            $this->db->from('prj_category as c');
            $this->db->join('prj_type as t','c.type_id=t.id','inner');
            return $this->db->get()->result_array();        
        }


        public function getCategory($id){
            $this->db->where('c.id',$id);
            $this->db->select('c.id,c.category,t.type');
            $this->db->from('prj_category as c');
            $this->db->join('prj_type as t','c.type_id=t.id');
            return $this->db->get()->row_array();
        }


        public function addCategory($data){
            return $this->db->insert('prj_category',$data);
        }

        public function editCategory($id,$data){
            return $this->db->where('id',$id)->update('prj_category',$data);
        }   
        
        public function deleteCategory($id){
            $data['delete_status']='1';
            return $this->db->where('id',$id)->update('prj_category',$data);
        }

    }

?>