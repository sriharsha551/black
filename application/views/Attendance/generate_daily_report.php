<?php 

?>

<table border="1">
    
        <tr height="80">
            <td ></td>
            <?php 
                $datediff = strtotime($to_date) - strtotime($from_date);
                $days =  round($datediff / (60 * 60 * 24));
                for($i=0; $i<$days; $i++)
                {
                    ?>
                    <td class="text_vertical"><?php echo date('d-m-Y', strtotime($from_date. ' + '.$i.' days'));?></td>
                    <?php
                }

            ?>
        </tr>
        <?php
        $employees = $this->Employees_model->get_all_employee();
        foreach($employees as $emp)
        {?>
            <tr>
                <td><?php echo  $emp["empName"];?></td>
                <?php
                for($i=0; $i<$days; $i++)
                {
                    $re_date = date('Y-m-d', strtotime($from_date. ' + '.$i.' days'));
                    $select = $this->db->select('ATTENDACE,IS_LATE')
                            ->where('UID',$emp["id"])
                            ->where('DATE(SIGN_IN)',$re_date)
                            ->get('emp_attendance')
                            ->row();
                    //print_r($select); exit;
                    //echo $this->db->last_query();
                    ?>
                    <td ><?php echo (isset($select->ATTENDACE))? 'P' : 'A'; ?></td>
                    <?php
                }?>
            </tr>
            <?php
        }
        ?>

    </tbody>
</table>