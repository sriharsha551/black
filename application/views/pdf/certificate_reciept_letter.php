<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Increment Letter</title>
  </head>
  <body style="width:680px; font-size:12px; line-height:18px;">
  <div style="margin:60px 0"></div>
  <p style=" margin:5px 0; display:block">DATE: <?php echo date('dS F, Y');?> .</p>
  <p style=" margin:5px 0; display:block"><?php echo $employee["prefix"];?> <?php echo $employee["empName"];?><br><?php echo $employee["relation"];?>: <?php echo $employee["father"];?></p><br>

    <p style="text-align: center; display:block; padding:10px 0px"><strong>Sub: Receiving of Original Certificate</strong></p>
    <p style="line-height:22px;">Dear <?php echo $employee["empName"];?>,</p>
    <p style="line-height:22px;">This is to confirm that your SSC (10 th class) <strong>Original Certificate</strong> (as per attached copy) is
    received by the <strong>KRISP INTERIORS</strong> as per the company policy. This will be returned to you
    at the end of your services to the company as per the contract agreement.
    </p><br><br>
    <p>Thanking you,</p>
    </p>
    <p style=" padding:0; margin:0; line-height:22px">For KRISP INTERIORS<br><br>
    Er. M. Krishna Prasad<br>
    Managing Director</p>
</body>
</html>
