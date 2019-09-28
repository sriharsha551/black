<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Employees_attendance_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
	/*
     * Get employees with department and designation
     */
	 function getAllEmployess(){
	 	$this->db->select('ep.id,ep.empId,ep.empName,ep.phone,ep.email,dp.name as department,dg.name as designation,ea.UID,ea.ATTENDACE,ea.LOCATION,ea.IS_LATE,ea.SIGN_IN,ea.SIGN_OUT,(select UID from emp_attendance where UID=ep.id AND ATTENDANCE_TAKEN_DATE LIKE "%'.date('Y-m-d').'%") as is_exist');
	 	$this->db->from('employees as ep');
		$this->db->join('department as dp', 'ep.Department=dp.id', 'left');
		$this->db->join('designation as dg', 'ep.Designation=dg.id', 'left');
		$this->db->join('emp_attendance as ea', 'ep.id=ea.UID', 'left');
		$query=$this->db->get();
	   	if($query->num_rows()>0)
	   	{
		 return $query->result_object();
	   	}else
	   	{
		 return false;
	   	}
	 }
	 
	 /*
     * Save Attendance
     */
	 function checkAttendance(){
		$this->db->select('SUM(IF(ea.ATTENDACE="P",1,0)) as total_presents,SUM(IF(ea.ATTENDACE="A",1,0)) as total_absents,count(ea.ATD_ID) as total_cnt');
	 	$this->db->from('emp_attendance as ea');
		$this->db->like('ea.ATTENDANCE_TAKEN_DATE',date('Y-m-d'),'both');
		$query=$this->db->get();
	   	if($query->num_rows()>0)
	   	{
		 return $query->result_object();
	   	}else
	   	{
		 return 0;
	   	}
	 }
	 
	 /*
     * Save Attendance
     */
	 function saveAttendance($users){
		$result=$this->db->insert_batch('emp_attendance',$users);
		//return 1;
     }
     
      /*
     * Save Attendance
     */
	 function saveUserAttendance($users){
		$result=$this->db->insert('emp_attendance',$users);
		//return 1;
     }
     
     function updateUserAttendance($id,$params)
     {
        $this->db->where('ATD_ID',$id);
        return $this->db->update('emp_attendance',$params);
     }
	 
    /*
     * Get joining_form by id
     */
    function get_employee($id)
    {
        return $this->db->get_where('employees',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all employees count
     */
    function get_all_employee_count()
    {
        $this->db->from('employees');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all employees
     */
    function get_all_employee($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('employees')->result_array();
    }
      

    function get_empid()
    {
        $last = $this->db->select('empId')
                        ->order_by('id',"desc")
		                ->limit(1)
                        ->get('employees')
                        ->row();
        $id=substr($last->empId, 5);
       // $ID $id+1;
        return $final_append="KRISP".++$id;
        
    }

    function get_attendance_status()
    {
        $get_status = "select * from emp_attendance where UID = '".$emp["empId"]."' and DATE(SIGN_IN) = '".$re_date."'";
        $select = $this->db->select('ATTENDANCE,IS_LATE')
                            ->where('UID',$emp["empId"])
                            ->where(DATE(SIGN_IN),$re_date)
                            ->get('emp_attendance')
                            ->row();
    }
}