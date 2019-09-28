<?php 

    class Act_accounts_model extends CI_Model{
        public function __construct(){
            parent :: __construct();
        } 

        public function get_count(){
            $this->db->where('deleted_at',NULL);
            return $this->db->get('act_accounts')->num_rows();
        }

        public function get_coa(){
            $this->db->where('deleted_at',NULL);
            $this->db->select('id,name');
            return $this->db->get('act_coa')->result_array();
        }
        public function get_balance($id){
            $this->db->where('id',$id);
            $this->db->select('cr_amt,db_amt');
            $this->db->from('act_transaction');
            return $this->db->get()->result_array();
        }

        public function get_all_accounts(){
            $this->db->where('a.deleted_at',NULL);
            $this->db->select('a.id,c.name,a.acc_name,a.bank_name,a.opening_balance,a.bank_address');
            $this->db->from('act_accounts as a');
            $this->db->join('act_coa as c','a.coa_id = c.id','inner');
            return $this->db->get()->result_array();
        }

        public function addDetail($data){
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['enabled'] = '0';
            $data['lock_stat']='0';
            $this->db->insert('act_accounts',$data);
        }    

        public function getDetail($id){
            $this->db->where('a.id',$id);
            $this->db->select('a.id,c.name,a.acc_name,a.bank_name,a.opening_balance,a.bank_address');
            $this->db->from('act_accounts as a');
            $this->db->join('act_coa as c','a.coa_id = c.id','inner');
            return $this->db->get()->row_array();
        }

        public function editDetail($id,$data){
            $this->db->where('id',$id);
            $params['updated_at'] = date('Y-m-d H:i:s');
            $this->db->update('act_accounts',$data);
        }

        public function deleteDetail($id){
            $this->db->where('id',$id);
            $params['deleted_at'] = date('Y-m-d H:i:s');
            $this->db->update('act_accounts',$params);
        }

        public function checkData($data){
            $this->db->where('acc_name',$data);
            $where = "deleted_at is NULL";
            $this->db->where('deleted_at is null',NULL,false);
            return $this->db->get('act_accounts')->num_rows();
        }

        public function checkEdit($id,$data){
            $this->db->where('acc_name',$data);
            $this->db->where('deleted_at',NULL);
            $this->db->where('id !=',$id);
            return $this->db->get('act_accounts')->num_rows();
        }

    }

?>