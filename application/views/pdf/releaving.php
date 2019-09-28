
  <div style="width:680px;">
      <table style="margin-top: 50px" cellpadding="0" cellspacing="0" width="100%"> 
        <thead>
          <tr>
            <th align="left">K-HR/LTR/VA/010316/JS/10</th>
          </tr>
          <tr>
            <th align="left"><p style="font-weight: normal; margin:0; padding:0"><?php echo date('dS F, Y');?></p> <br /><br /></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td align="left"><p style="font-weight: normal; margin:0; padding:0"><?php echo $employee["prefix"];?> <?php echo ucfirst($employee["empName"]);?>,</p></td>
          </tr>
          <tr>
            <td align="left"><p style="font-weight: normal;  margin:0; padding:0">Employee Id. <?php echo $employee["empId"];?>,</p></td>
          </tr>
          <tr>
            <td align="left"><p style="font-weight: normal;  margin:0; padding:0"><?php echo ucfirst($employee["designation"]);?>.</p> <br /><br /></td>
          </tr>
          <tr>
            <td><p>Sub: <span>Relieving Letter</span></p></td>
          </tr>
          <tr>
            <td align="center"><h3>TO WHOM SO IT MAY CONCERN</h3> <br /></td>
          </tr>
          <tr>
            <td>
              <p>This has reference to your letter of resignation dated <?php echo date('dS F, Y',strtotime($employee["resignation_data"]));?>. 
                We would like to inform you, that your resignation has been accepted and you are relived from the services of the company with effect from closing of office hours on <?php echo date('dS F, Y',strtotime($employee["DOT"]));?>.
                </p>
            </td>
          </tr>
          <tr>
            <td><p>We also certify you that your full and final settlement of account has been cleared with the organisation.</p></td>
          </tr>
          <tr>
            <td><p>Your contribution to the organisation towards its growth and success will be always appreciated. Wish you all the best at your future endeavours.</p><br /></td>
          </tr>
          <tr>
              <td><p>For <span>Krisp Interiors</span></p><br /></td>
          </tr>
          <tr>
              <td><p>Authorised Signature</p></td>
          </tr>

        </tbody>
      </table>
  </div>
