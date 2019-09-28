<?php

class Invoice_payments_model extends CI_Model
{
    function __consruct()
    {
        parent::__construct();
    }

    function get_all_invoice_count()
    {
        $this->db->from('act_inv_payment');
        $this->db->where(array('delete_status'=>'0'));
        return $this->db->count_all_results();
    }
    
    function get_all_invoice()
    {
        $this->db->select('t1.*,t2.name as coa_id,t3.name as pay_method,t5.invoice_num as inv_id');
        $this->db->join('act_coa as t2', 't2.id = t1.coa_id', 'inner');
        $this->db->join('act_payment_method as t3','t1.pay_method = t3.id','inner');
        // $this->db->join('act_trans_type as t4', 't1.tran_type_id = t4.id', 'inner');
        $this->db->join('act_invoices as t5', 't5.id = t1.inv_id', 'inner');
        return $this->db->get_where('act_inv_payment t1',array('t1.delete_status'=>'0'))->result_array();
    }

    function get_inv_amount()
    {
        $this->db->select('id,total_amount');
        $this->db->from('act_invoices');
        $this->db->where("delete_status",'0');
        return $this->db->get()->result();
    }

    function get_invoice($id)
    {
        return $this->db->get_where('act_inv_payment',array('id'=>$id,"delete_status"=>'0'))->row_array();
    }

    function get_inv_ids()
    {
        $this->db->select('id,invoice_num');
        $this->db->from('act_invoices');
        $this->db->where("delete_status",'0');
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
        return $this->db->get()->result();
    }

    function get_pay_ids()
    {
        $this->db->select('id,name ');
        $this->db->from('act_payment_method');
        return $this->db->get()->result();
    }

    function add_invoice($params)
    {
        $params['created_at'] = date("Y-m-d H:i:s");

        $this->db->insert('act_inv_payment',$params);
        return $this->db->insert_id();
    }

    function add_transaction($params)
    {
        $data = array(
            'date_transaction' => $params['paid_dt'],
            'coa_id' => $params['coa_id'],
            'inv_id' => $params['inv_id'],
            'cr_amt' => $params['amount'],
            'remarks' => $params['remarks'],

            'created_at' => date("Y-m-d H:i:s")
    );
        
        $this->db->insert('act_transaction',$data);
    }

    function update_invoice_pay($id,$params)
    {
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('act_inv_payment',$params);
    }

    function update_invoice($status,$id)
    {
        $params['invoice_status'] = $status;
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        $this->db->update('act_invoices',$params);
    }

    function delete_invoice($id)
    {
        $params['deleted_at'] = date("Y-m-d H:i:s");
        $this->db->set(array('delete_status'=>'1'));
        $this->db->where('id',$id);
        return $this->db->update('act_inv_payment');

    }
}
?>