<?php 

class Type_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function getCount(){
        $this->db->where('delete_status','0');
        return $this->db->get('prj_type')->num_rows();
    }

    public function getAllTypes(){
        $this->db->where('delete_status','0');
        $this->db->select('id,type');
        return $this->db->get('prj_type')->result_array();
    }

    public function getType($id){
        $this->db->where('id',$id);
        $this->db->select('id,type');
        return $this->db->get('prj_type')->row_array();
    }

    public function addType($data){
        $data['delete_status']='0';
        $stat = $this->db->insert('prj_type',$data);
        return $stat;
    }

    public function editType($id,$data){
        $this->db->where('id',$id);
        return $this->db->update('prj_type',$data);
    }    

    public function deleteType($id){
        $data['delete_status']='1';
        $this->db->where('id',$id);
        return $this->db->update('prj_type',$data);
    }
}

?>