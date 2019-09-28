<?php

class Bills_model extends CI_Model
{
    function __consruct()
    {
        parent::__construct();
    }

    function get_all_bills_count()
    {
        $this->db->from('act_bills');
        $this->db->where(array('delete_status'=>'0'));
        return $this->db->count_all_results();
    }
    
    function get_all_bills()
    {
        $this->db->select('t1.*,t2.name as bill_status,t3.ponumber as order_name,t4.name as supplier,t5.name as cr_days,t5.days,t6.name as tax');
        $this->db->join('act_bill_status as t2', 't2.id = t1.bill_status', 'inner');
        $this->db->join('act_purchase_order as t3','t1.order_num = t3.id','inner');
        $this->db->join('suppliers as t4', 't1.sup_id = t4.id', 'inner');
        $this->db->join('act_cr_days as t5', 't1.cr_days_id= t5.id', 'inner');
        $this->db->join('act_tax as t6', 't6.id = t1.tax_id', 'inner');
        return $this->db->get_where('act_bills t1',array('t1.delete_status'=>'0'))->result_array();
    }

    function get_sup()
    {
        $this->db->from('suppliers');
        $this->db->select('id,name,email_id,address,contact_no_1');
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

    function get_bill_items()
    {
        $this->db->from('act_bill_items');
        $this->db->select('id,item_name');
        return $this->db->get()->result();
    }

    function get_bill_status()
    {
        $this->db->from('act_bill_status');
        $this->db->select('id,name');
        return $this->db->get()->result();
    }

    function get_order()
    {
        $this->db->from('act_purchase_order');
        $this->db->select('id,ponumber');
        return $this->db->get()->result();
    }

    function get_bills($id)
    {
        return $this->db->get_where('act_bills',array('id'=>$id,"delete_status"=>'0'))->row_array();
    }

    function add_bill($params)
    {
        $params['created_at'] = date("Y-m-d H:i:s");

        $this->db->insert('act_bills',$params);
        return $this->db->insert_id();
    }

    function update_bills($id,$params)
    {
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('act_bills',$params);
    }

    function delete_bills($id)
    {
        $params['deleted_at'] = date("Y-m-d H:i:s");
        $this->db->set(array('delete_status'=>'1'));
        $this->db->where('id',$id);
        return $this->db->update('act_bills');

    }
}
?>