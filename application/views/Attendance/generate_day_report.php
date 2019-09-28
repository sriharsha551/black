<table class="table">
    <thead>
        <tr height="80">
            <td >Sno</td>
            <td >Employee</td>
            <td >Date</td>
            <td >Location</td>
            <td >SignIn</td>
            <td >SignOut</td>
            <td >Action</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=1;
       // $employees = $this->Employees_model->get_all_employee();
        $employees = $this->db->select('e.empName,a.*')
                            ->join('emp_attendance a','a.UID=e.id')
                            ->where('DATE(a.ATTENDANCE_TAKEN_DATE)',$date)
                            ->get('employees e')
                            ->result_array();

        foreach($employees as $emp)
        {?>
        <tr>
            <td ><?php echo $i++;?></td>
            <td ><?php echo $emp["empName"]?></td>
            <td ><?php echo $emp["ATTENDANCE_TAKEN_DATE"]?></td>
            <td ><?php echo $emp["LOCATION"]?></td>
            <td ><?php echo date('H:m',strtotime($emp["SIGN_IN"]))?></td>
            <td ><?php echo ($emp["SIGN_OUT"])? date('H:m',strtotime($emp["SIGN_OUT"])) : ""; ?></td>
            <td ><a href="<?php echo site_url('Employee_attendance/UpdateAttendance/'.$emp['ATD_ID']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a> </td>
        </tr>
            <?php
        }
        ?>

    </tbody>
</table>