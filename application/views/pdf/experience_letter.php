<div style="width:680px; font-size:11px; line-height:18px;">
<div style="margin:60px 0">
</div>
<p style="font-size:10px">K- HR/ LTR/ VA/020918/JS/03<br /><?php echo date('dS F, Y');?>.</p>
<p style="font-size:10px; line-height:18px">
<?php echo $employee["prefix"];?> <?php echo ucfirst($employee["empName"]);?><br />
Employee Id. <?php echo $employee["empId"];?>,<br />
<?php echo ucfirst($employee["department"]);?> Department.<br />
</p>

<p style="text-align: left;">Sub: Experience Letter</p>

<p style="text-align:center; font-size:16px;text-decoration: underline;; display:block; margin:20px 0"><strong>TO WHOM IT MAY CONCERN</strong></p>
<p style="text-align: left;">This is to certify that <?php echo $employee["prefix"];?> <?php echo ucfirst($employee["empName"]);?>, <?php echo $employee["relation"];?>: <?php echo $employee["father"];?> worked with <strong>KRISP INTERIORS</strong> as a <?php echo ucfirst($employee["designation"]);?> from <?php echo date('d-m-Y',strtotime($employee["DOJ"]));?> to <?php echo date('d-m-Y',strtotime($employee["DOT"]));?>. In this Period he has taken the responsibilities and duties in execution of Interior Design works for Residential and Commercial projects.</p>
<p style="text-align: left;">During this Period he has shown full sincerity, dedication and hard-work towards his Concerned job which has helped in development of the organization.</p>
<p style="text-align: left;"><?php echo $employee["prefix"];?> <?php echo ucfirst($employee["empName"]);?> has been relieved from our services with effect from <?php echo date('dS F, Y',strtotime($employee["DOJ"]));?> on his own accord. During employment his conduct was found satisfactory.</p>

<p style="text-align: left;">We wish her all the best for his future endeavours.</p><br /><br /><br />

<p style="text-align: left;">For KRISP INTERIORS<br />
Authorised Signature.</p>