<?php 

?>

<table border="1">
    
        <tr height="80">
            <td ></td>
            <?php 
                $year = $pick_year;
               
                for($m=1; $m<=12; ++$m){
                    ?>
                    <td class="text_vertical"><?php echo date('F', mktime(0, 0, 0, $m, 1)).'<br>';?></td>
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
                for($m=1; $m<=12; ++$m){
                    $select = $this->db->select('ATD_ID')
                            ->where('UID',$emp["id"])
                            ->where('YEAR(SIGN_IN)',$year)
                            ->where('MONTH(SIGN_IN)',$m)
                            ->where('ATTENDACE','P')
                            ->get('emp_attendance')
                            ->result();
                    ?>
                    <td class=""><?php echo count($select);?></td>
                    <?php
                }
                ?>
            </tr>
            <?php
        }
        ?>

    </tbody>
</table>