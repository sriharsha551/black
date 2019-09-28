<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Increment Letter</title>
  </head>
  <body style="width:680px;font-size:11px; line-height:18px;">
  <div style="margin:60px 0">
</div>
<p style="">K-HR/LTR/VA/010918/JS/32<br>
Date: <?php echo date('dS F, Y',strtotime($revised_from));?></p>
<p style=""><?php echo $prefix;?>  <?php echo $employee_name;?><br>
Employee Id No: <?php echo $empId;?></p>
<p style="text-align: left;">Dear <?php echo $prefix;?>  <?php echo $employee_name;?></p>
<p style="text-align: justify; padding-left:10px; display:block; ">We would like to express our appreciation and commendation for all the passion and Commitmentyou have been exhibiting in your existing role.</p>
<p style="text-align: justify; padding-left:10px; display:block;">In recognition of your contribution, it is our pleasure to inform you that your gross salary has been revised to INR <?php echo $amount;?>/- p.m. (<?php echo $in_words;?>) w.e.f. <?php echo $revised_from;?>.</p>
<p style="text-align: justify; padding-left:10px; display:block;">Congratulations and best of luck in the future.</p>
<p style="text-align: justify; padding-left:10px; display:block;">Note: Next salary revision will be after a period of one year.</p><br>
<p>For Krisp Interiors</p><br>
<p>Vasu Adapa/ Krishna Prasad</p>
<p>Managing Director</p>    
  </body>
</html>