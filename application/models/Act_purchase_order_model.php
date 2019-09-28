<?php

    class Act_purchase_order_model extends CI_Model
    {
        function __construct()
        {
            parent :: __construct();
        }

        function get_all_purchases_count()
        {
            $this->db->where('deleted_at' ,NULL);
            return $this->db->get('act_purchase_order')->num_rows();
        }

        function get_all_purchases()
        {
            $this->db->where('p.deleted_at',NULL);
            $this->db->select('p.id,p.ponumber,p.sup_id,p.sup_name,p.sup_email,p.sup_phone,p.sup_address,i.material_name,p.description,p.amount,p.remarks');
            $this->db->from('act_purchase_order as p');
            $this->db->join('prj_mtrl_items as i','i.id = p.items','inner');
            return $this->db->get()->result_array();
        }

        function get_suppliers()
        {
            $this->db->where('delete_status','0');
            $this->db->select('id,name,email_id,address,contact_no_1');
            $this->db->from('suppliers');
            return $this->db->get()->result();
        }

        function get_items()
        {
            $this->db->where('delete_status','0');
            $this->db->select('*');
            return $this->db->get('prj_mtrl_items')->result_array();
        }

        function get_order($id)
        {
            $this->db->where('deleted_at',NULL);
            $this->db->where('id',$id);
            return $this->db->get('act_purchase_order')->result_array();
        }

        function add_purchase($params)
        {
            $params['created_at'] = date("Y-m-d H:i:s");
            $this->db->insert('act_purchase_order',$params);
            return $this->db->insert_id();
        }

        function edit_purchases($id,$params)
        {
            $params['updated_at'] = date("Y-m-d H:i:s");
            $this->db->where('id',$id);
            return $this->db->update('act_purchase_order',$params);
        }

        function delete_purchase($id)
        {
            $params['deleted_at'] = date("Y-m-d H:i:s");
            $this->db->where('id',$id);
            return $this->db->update('act_purchase_order',$params);
        }

    }

?>