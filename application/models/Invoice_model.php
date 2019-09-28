<?php

class Invoice_model extends CI_Model
{
    function __consruct()
    {
        parent::__construct();
    }

    function get_all_invoice_count()
    {
        $this->db->from('act_invoices');
        $this->db->where(array('delete_status'=>'0'));
        return $this->db->count_all_results();
    }
    
    function get_all_Invoice()
    {
        $this->db->select('t1.*,t2.name as invoice_status,t3.ponumber as order_num,t4.name as supplier,t5.name as cr_days,t5.days,t6.name as tax,t7.item_name as invoice_item');
        $this->db->join('act_inv_status as t2', 't2.id = t1.invoice_status', 'inner');
        $this->db->join('act_purchase_order as t3','t1.order_num = t3.id','inner');
        $this->db->join('act_customer as t4', 't1.customer_id = t4.id', 'inner');
        $this->db->join('act_cr_days as t5', 't1.cr_days_id= t5.id', 'inner');
        $this->db->join('act_tax as t6', 't6.id = t1.tax_id', 'inner');
        $this->db->join('act_inv_items as t7','t1.invoice_item = t7.id','inner');
        return $this->db->get_where('act_invoices t1',array('t1.delete_status'=>'0'))->result_array();
    }

    function get_cut()
    {
        $this->db->from('act_customer');
        $this->db->select('id,name,email,address,phone');
        return $this->db->get()->result();
    }
    function get_credit()
    {
        $this->db->from('act_cr_days');
        $this->db->select('id,name');
        return $this->db->get()->result();
    }
    function get_tax()
    {
        $this->db->from('act_tax');
        $this->db->select('id,name');
        return $this->db->get()->result();
    }
    function get_invoice_items()
    {
        $this->db->from('act_inv_items');
        $this->db->select('id,item_name');
        return $this->db->get()->result();
    }
    function get_inv_status()
    {
        $this->db->from('act_inv_status');
        $this->db->select('id,name');
        return $this->db->get()->result();
    }
    function get_order()
    {
        $this->db->from('act_purchase_order');
        $this->db->select('id,ponumber');
        return $this->db->get()->result();
    }
    function get_invoice($id)
    {
        return $this->db->get_where('act_invoices',array('id'=>$id,"lock_st"=>'0'))->row_array();
    }

    function add_invoice($params)
    {
        $params['created_at'] = date("Y-m-d H:i:s");

        $this->db->insert('act_invoices',$params);
        return $this->db->insert_id();
    }

    function update($id,$params)
    {
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('act_invoices',$params);
    }
    function get_invoice_detail($id)
    {
        return $this->db->get_where('act_invoices',array('id'=>$id,"delete_status"=>'0'))->row_array();
    }

    function delete($id)
    {
        $params['deleted_at'] = date("Y-m-d H:i:s");
        $this->db->set(array('delete_status'=>'1'));
        $this->db->where('id',$id);
        return $this->db->update('act_invoices');

    }
}
?>
