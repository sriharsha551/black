<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Memo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get memo by id
     */
    function get_memo($id)
    {
        return $this->db->get_where('memo',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all memo count
     */
    function get_all_memo_count()
    {
        $this->db->from('memo');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all memo
     */
    function get_all_memo($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('memo')->result_array();
    }

    function get_all_memo_employees($id)
    {
        return $this->db->where('memo_id',$id)->get('memo_members')->result_array();
    }

    function get_all_memo_employees_emails($id)
    {
        return $this->db->select("e.email")
                        ->where('memo_id',$id)
                        ->join("employees e", "e.id=m.employee_id")
                        ->get('memo_members m')->result_array();
    }
        
    /*
     * function to add new memo
     */
    function add_memo($params)
    {
        $this->db->insert('memo',$params);
        return $this->db->insert_id();
    }
    function add_employees($params)
    {
        $this->db->insert_batch('memo_members',$params);
    }
    /*
     * function to update memo
     */
    function update_memo($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('memo',$params);
    }
    
    /*
     * function to delete memo
     */
    function delete_memo($id)
    {
        return $this->db->delete('memo',array('id'=>$id));
    }

    function delete_memo_members($id)
    {
        return $this->db->delete('memo_members',array('memo_id'=>$id));
    }
}
