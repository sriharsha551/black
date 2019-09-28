<?php
    class Project_List_Model extends CI_Model{

        public function __construct(){
            parent::__construct();
        }


        public function getTypes(){
            $this->db->where('delete_status','0');
            $this->db->select('id,type');
            return $res = $this->db->get('prj_type')->result_array();
        }

        public function getCategories(){
            $this->db->where('delete_status','0');
            $this->db->select('id,category');
            return $this->db->get('prj_category')->result_array();
        }

        public function getStages(){
            $this->db->where('delete_status','0');
            $this->db->select('id,stage_name');
            return $this->db->get('prj_stages')->result_array();
        }

        public function getCount(){
            $this->db->where('delete_status','0');
            return $this->db->get('prj_list')->num_rows();            
        }

        public function getAllProjects(){
            $this->db->where('p.delete_status','0');
            $this->db->select('p.id,c.category,t.type,p.name,s.stage_name,p.remarks');
            $this->db->from('prj_list as p');
            $this->db->join('prj_type as t','p.type_id = t.id','inner');
            $this->db->join('prj_category as c','p.cat_id = c.id','inner');
            $this->db->join('prj_stages as s','p.stage = s.id','inner');
            return $this->db->get()->result_array();        
        }

        public function getPercentages($id){
            $percent = 0;
            $res = $this->db->query("select percentage FROM prj_dsg_layout where prj_id='$id' ORDER BY id DESC LIMIT 1");
            if($res->num_rows()){
                $percent = $percent + $res->row()->percentage;
            }
            $res = $this->db->query("select percentage from prj_dsg_concept where prj_id='$id' ORDER BY id DESC LIMIT 1");
            if($res->num_rows()){
                $percent = $percent + $res->row()->percentage;
            }
            $res = $this->db->query("select percentage from prj_dsg_layout where prj_id='$id' ORDER BY id DESC LIMIT 1");
            if($res->num_rows()){
               $percent = $percent + $res->row()->percentage;
            }
            $res = $this->db->query("select percentage from prj_dsg_render where prj_id='$id' ORDER BY id DESC LIMIT 1");
            if($res->num_rows()){
               $percent = $percent + $res->row()->percentage;
            }
            return $percent/4;
        }


        public function getProject($id){
            $this->db->where('p.id',$id);
            $this->db->select('p.id,c.category,t.type,p.name,s.stage_name,p.remarks');
            $this->db->from('prj_list as p');
            $this->db->join('prj_type as t','p.type_id = t.id','inner');
            $this->db->join('prj_category as c','p.cat_id = c.id','inner');
            $this->db->join('prj_stages as s','p.stage = s.id','inner');
            return $this->db->get()->row_array();
        }


        public function addProject($data){
            return $this->db->insert('prj_list',$data);
        }

        public function editProject($id,$data){
            return $this->db->where('id',$id)->update('prj_list',$data);
        }   
        
        public function deleteProject($id){
            $data['delete_status']='1';
            return $this->db->where('id',$id)->update('prj_list',$data);
        }

    }

?>