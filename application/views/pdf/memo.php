<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>INTERNAL MEMO</title>
  </head>
  <body style="width:680px; font-size:12px; line-height:18px;">
    <div style="margin:60px 0"></div>

    <p style="text-align: center; display:block; padding:10px 0px"><strong>INTERNAL MEMO</strong></p>
    <br><hr><br>
    <table style="width:100%">
      <tr>
        <td>To</td>
        <td>:</td>
        <td>STAFF</td>
      </tr>
      <tr>
        <td>Date</td>
        <td>:</td>
        <td><?php echo date('dS F, Y',strtotime($memo["memo_date"]));?></td>
      </tr>
      <tr>
        <td>Subject</td>
        <td>:</td>
        <td><?php echo $memo["memo_name"];?></td>
      </tr>
    </table>
    <br>
    <hr><br>
    <p style="line-height:22px;">Dear All,</p>
    <p style="line-height:22px;"><?php echo $memo["description"];?>
    </p><br><br></p>
   
   
    
    <p style=" padding:0; margin:0; line-height:22px">Managing Director<br><br></p>
</body>
</html>
