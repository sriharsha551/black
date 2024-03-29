<?php

class Bill_payments_model extends CI_Model
{
    function __consruct()
    {
        parent::__construct();
    }

    function get_all_bill_pay_count()
    {
        $this->db->from('act_bill_payment');
        $this->db->where(array('deleted_at'=>null));
        return $this->db->count_all_results();
    }
    
    function get_all_bill_pay()
    {
        $this->db->select('t1.*,t2.name as coa_id,t3.name as payment_method,t5.bill_num as bill_id,t4.name as prj_name');
        $this->db->join('act_coa as t2', 't2.id = t1.coa_id', 'inner');
        $this->db->join('act_payment_method as t3','t1.payment_method = t3.id','inner');
        $this->db->join('prj_list as t4', 't1.prj_id = t4.id','inner');
        // $this->db->join('act_trans_type as t4', 't1.tran_type_id = t4.id', 'inner');
        $this->db->join('act_bills as t5', 't5.id = t1.bill_id', 'inner');
        return $this->db->get_where('act_bill_payment t1',array('t1.deleted_at'=>null))->result_array();
    }

    function get_bill_pay($id)
    {
        return $this->db->get_where('act_bill_payment',array('id'=>$id,"deleted_at"=>null))->row_array();
    }

    function get_bill_amount()
    {
        $this->db->select('id,total_amt');
        $this->db->from('act_bills');
        $this->db->where("deleted_at",null);
        return $this->db->get()->result();
    }

    function get_bill_ids()
    {
        $this->db->select('id,bill_num');
        $this->db->from('act_bills');
        $this->db->where("deleted_at",null);
        return $this->db->get()->result();
    }

    function get_coa_ids()
    {
        $this->db->select('id,name');
        $this->db->from('act_coa');
        $this->db->where("deleted_at",null);
        return $this->db->get()->result();
    }

    function get_tran_ids()
    {
        $this->db->select('id, trans_type as name');
        $this->db->from('act_trans_type');
        $this->db->where("deleted_at",null);
        return $this->db->get()->result();
    }

    function get_pay_ids()
    {
        $this->db->select('id,name ');
        $this->db->from('act_payment_method');
        $this->db->where("deleted_at",null);
        return $this->db->get()->result();
    }

    function get_all_prj_list()
    {
        $this->db->where('delete_status','0');
        $this->db->select('id, name');
        $this->db->from('prj_list');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function add_bill_pay($params)
    {
        $params['created_at'] = date("Y-m-d H:i:s");

        $this->db->insert('act_bill_payment',$params);
        return $this->db->insert_id();
    }

    function add_transaction($params)
    {
        $data = array(
            'date_transaction' => $params['paid_dt'],
            'coa_id' => $params['coa_id'],
            'bill_id' => $params['bill_id'],
            'db_amt' => $params['amount'],
            'remarks' => $params['remarks'],
            'created_at' => date("Y-m-d H:i:s")
    );
        
        $this->db->insert('act_transaction',$data);
    }


    function update_bill_pay($id,$params)
    {
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('act_bill_payment',$params);
    }

    function update_bill($status,$id)
    {
        $params['bill_status'] = $status;
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        $this->db->update('act_bills',$params);
    }

    function delete_bill_pay($id)
    {
        $params['deleted_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('act_bill_payment',$params);

    }

    function delete_transaction($id)
    {
        $params['deleted_at'] = date("Y-m-d H:i:s");
        $this->db->where('bill_id',$id);
        return $this->db->update('act_transaction',$params);    
    }
}
?>