<?php echo form_open('employee_appriasal/edit/'.$employee_appriasal["id"],array("class"=>"form-horizontal")); ?>
<div class="col-md-12 mt-3">
	<div class="card mb-4">
		<h6 class="card-header">EMPLOYEE APRAISAL 
            <a class="btn btn-success btn-sm float-right mb-2" href="<?php echo site_url('Employee_appriasal'); ?>">
                Back
            </a>
            <a class="btn btn-success btn-sm float-right mb-2" href="<?php echo site_url('Employee_appriasal/edit/'.$employee_appriasal["id"]); ?>">
                Edit
            </a>
        </h6>
		<div class="card-body row">
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="empId" class="col-md-12 control-label">Employee ID</label> : <?php echo $employee_appriasal["empId"];?>
				
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="date" class="col-md-12 control-label">Employee Name</label> : <?php echo $employee["empName"];?>
				
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="review_fre" class="col-md-12 control-label">Position</label> : <?php echo $employee["Designation"];?>
				
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="attendance" class="col-md-12 control-label">Department</label> : <?php echo $employee["Department"];?>
				
			</div>
			
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="attendance" class="col-md-12 control-label">Present Rate</label> : <?php echo $employee_appriasal["present_rate"];?>

			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="attendance" class="col-md-12 control-label">Date of Review</label> : <?php echo date('d-m-Y',strtotime($employee_appriasal["review_date"]));?>
				
			</div>		
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label class="col-md-12 control-label"><strong>Review Period</strong></label>
				<div class="col-md-12">
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="review_fre" value="1" <?php echo ($employee_appriasal['review_fre']==1 ? 'checked' : ''); ?>/>
						<span class="custom-control-label">Six months review</span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="review_fre" value="2" <?php echo ($employee_appriasal['review_fre']==2 ? 'checked' : ''); ?>/>
						<span class="custom-control-label">Annual Review</span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="review_fre" value="3" <?php echo ($employee_appriasal['review_fre']==3 ? 'checked' : ''); ?>/>
						<span class="custom-control-label">Otgers</span>
					</label>
				</div>
			</div>		
		</div>
	</div>
</div>
<div class="col-md-12 mt-3">
	<div class="card mb-4">
		<h5 class="card-header">PERFORMANFE APRAISAL RATINGS</h5>
		<div class="card-body row">
		
			<div class="form-group col-md-6 col-sm-6 col-xs-12 ">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Attendance :</strong></label>
					<div class="col-md-12">
                    <?php
                    for($i=5; $i>=1; $i--)
                    {
                        if($i<$employee_appriasal['attendance']){
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star-outline"></span></button>
                            <?php
                        }
                        else {
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star"></span></button>
                            
                            <?php
                        }
                    }
                    ?>
                    <br><br>
                    <p><strong>Comments : </strong>
					<?php echo ($this->input->post('att_com') ? $this->input->post('att_com') : $employee_appriasal['att_com']); ?></p>
					</div>
				</div>
			</div>
			
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Quality of Work :</strong></label>
					<div class="col-md-12">
                    <?php
                    for($i=5; $i>=1; $i--)
                    {
                        if($i<$employee_appriasal['quality_work']){
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star-outline"></span></button>
                            <?php
                        }
                        else {
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star"></span></button>                            
                            <?php
                        }
                    }
                    ?>
                    <br><br>
                    <p><strong>Comments : </strong>
                    <?php echo ($this->input->post('qow_com') ? $this->input->post('qow_com') : $employee_appriasal['qow_com']); ?></p>
                    
                   
					</div>
				</div>
			</div>
				
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Productivity :</strong></label>
					<div class="col-md-12">
                    <?php
                    for($i=5; $i>=1; $i--)
                    {
                        if($i<$employee_appriasal['productivity']){
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star-outline"></span></button>
                            <?php
                        }
                        else {
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star"></span></button>                            
                            <?php
                        }
                    }
                    ?>
                    <br><br>
                    <p><strong>Comments : </strong>
                    <?php echo ($this->input->post('prod_com') ? $this->input->post('prod_com') : $employee_appriasal['prod_com']); ?></p>                   
						
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Knowledge of Job :</strong></label>
					<div class="col-md-12">
                    <?php
                    for($i=5; $i>=1; $i--)
                    {
                        if($i<$employee_appriasal['kldg_job']){
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star-outline"></span></button>
                            <?php
                        }
                        else {
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star"></span></button>                            
                            <?php
                        }
                    }
                    ?>
                    <br><br>
                    <p><strong>Comments : </strong>
                    <?php echo ($this->input->post('kldg_com') ? $this->input->post('kldg_com') : $employee_appriasal['kldg_com']); ?></p>
						
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Reliability and Dependability :</strong></label>
					<div class="col-md-12">
                    <?php
                    for($i=5; $i>=1; $i--)
                    {
                        if($i<$employee_appriasal['randa']){
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star-outline"></span></button>
                            <?php
                        }
                        else {
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star"></span></button>                            
                            <?php
                        }
                    }
                    ?>
                    <br><br>
                    <p><strong>Comments : </strong>
                    <?php echo ($this->input->post('randa_com') ? $this->input->post('randa_com') : $employee_appriasal['randa_com']); ?></p>
				
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Initiative :</strong></label>
					<div class="col-md-12">
                    <?php
                    for($i=5; $i>=1; $i--)
                    {
                        if($i<$employee_appriasal['initiative']){
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star-outline"></span></button>
                            <?php
                        }
                        else {
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star"></span></button>                            
                            <?php
                        }
                    }
                    ?>
                    <br><br>
                    <p><strong>Comments : </strong>
                    <?php echo ($this->input->post('init_com') ? $this->input->post('init_com') : $employee_appriasal['init_com']); ?></p>
						
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Creativity :</strong></label>
					<div class="col-md-12">
                    <?php
                    for($i=5; $i>=1; $i--)
                    {
                        if($i<$employee_appriasal['creativity']){
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star-outline"></span></button>
                            <?php
                        }
                        else {
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star"></span></button>                            
                            <?php
                        }
                    }
                    ?>
                    <br><br>
                    <p><strong>Comments : </strong>
                    <?php echo ($this->input->post('creat_com') ? $this->input->post('creat_com') : $employee_appriasal['creat_com']); ?></p>						
					</div>
				</div>
			</div>
			

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Working Relationships :</strong></label>
					<div class="col-md-12">
                    <?php
                    for($i=5; $i>=1; $i--)
                    {
                        if($i<$employee_appriasal['work_rela']){
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star-outline"></span></button>
                            <?php
                        }
                        else {
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star"></span></button>                            
                            <?php
                        }
                    }
                    ?>
                    <br><br>
                    <p><strong>Comments : </strong>
                    <?php echo ($this->input->post('workrela_com') ? $this->input->post('workrela_com') : $employee_appriasal['workrela_com']); ?></p>		

					</div>
				</div>
			</div>

		

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Adherence to company polices :</strong></label>
					<div class="col-md-12">
                    <?php
                    for($i=5; $i>=1; $i--)
                    {
                        if($i<$employee_appriasal['adherence']){
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star-outline"></span></button>
                            <?php
                        }
                        else {
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star"></span></button>                            
                            <?php
                        }
                    }
                    ?>
                    <br><br>
                    <p><strong>Comments : </strong>
                    <?php echo ($this->input->post('adherence_com') ? $this->input->post('adherence_com') : $employee_appriasal['adherence_com']); ?></p>	

					
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Comments on overall organizational performance :</strong></label>
					<div class="col-md-12">
                    <?php
                    for($i=5; $i>=1; $i--)
                    {
                        if($i<$employee_appriasal['org_perform']){
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star-outline"></span></button>
                            <?php
                        }
                        else {
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star"></span></button>                            
                            <?php
                        }
                    }
                    ?>
                    <br><br>
                    <p><strong>Comments : </strong>
                    <?php echo ($this->input->post('org_com') ? $this->input->post('org_com') : $employee_appriasal['org_com']); ?></p>	

						
					</div>
				</div>
			</div>

		
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Overall performance ratings :</strong></label>
					<div class="col-md-12">
                    <?php
                    for($i=5; $i>=1; $i--)
                    {
                        if($i<$employee_appriasal['overall']){
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star-outline"></span></button>
                            <?php
                        }
                        else {
                            ?>
                            <button type="button" class="btn icon-btn btn-xs btn-outline-success"><span class="ion ion-md-star"></span></button>                            
                            <?php
                        }
                    }
                    ?>
                    <br><br>
                    <p><strong>Comments : </strong>
                    <?php echo ($this->input->post('overall_com') ? $this->input->post('overall_com') : $employee_appriasal['overall_com']); ?></p>
						
					</div>
				</div>
			</div>
			
		

			<div class="col-md-12">
				<div class="row">
				<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="sprv_com" class="col-md-12 control-label"><strong>Supervisor comments on overall performance</strong></label>
				<div class="col-md-12">
                <?php echo ($this->input->post('sprv_com') ? $this->input->post('sprv_com') : $employee_appriasal['sprv_com']); ?>
				</div>
			</div>
					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<label for="emp_com" class="col-md-12 control-label"><strong>Employee Comments</strong></label>
						<div class="col-md-12">
                        <?php echo ($this->input->post('emp_com') ? $this->input->post('emp_com') : $employee_appriasal['emp_com']); ?>
						</div>
					</div>
					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<label for="emp_improve" class="col-md-12 control-label"><strong>Specific Action Employee must to Improve with in qualified time</strong></label>
						<div class="col-md-12">
                        <?php echo ($this->input->post('emp_improve') ? $this->input->post('emp_improve') : $employee_appriasal['emp_improve']); ?>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
	

	
	

<?php echo form_close(); ?>