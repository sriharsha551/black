<?php echo form_open('employee_appriasal/add/'.$employee["id"],array("class"=>"form-horizontal")); ?>
<div class="col-md-12 mt-3">
	<div class="card mb-4">
		<h6 class="card-header">EMPLOYEE APRAISAL</h6>
		<div class="card-body row">
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="empId" class="form-label">Employee ID</label>
				<div class="">					
					<input type="text" name="empId" id="empId" value="<?php echo $employee["empId"];?>" placeholder="" class="form-control"/>
				</div>
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="date" class="form-label">Employee Name</label>
				<div class="">
				<input type="text" name="employee_name" id="employee_name" value="<?php echo $employee["empName"];?>" placeholder="" class="form-control"/>
				</div>
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="review_fre" class="form-label">Position</label>
				<div class="">
					<input type="text" name="position" id="position" value="<?php echo $employee["Designation"];?>" placeholder="" class="form-control"/>
				</div>
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="attendance" class="form-label">Department</label>
				<div class="">
				<input type="text" name="department" id="department" value="<?php echo $employee["Department"];?>" placeholder="" class="form-control"/>
				</div>
			</div>
			
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="attendance" class="form-label">Present Rate</label>
				<div class="">
				<input type="text" name="present_rate" value="" placeholder="" class="form-control"/>
				</div>
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="attendance" class="form-label">Date of Review</label>
				<div class="">
				<input type="text" name="review_date" id="datepicker-inline" value="" placeholder="" class="form-control"/>
				</div>
			</div>		
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label class="form-label"><strong>Review Period</strong></label>
				<div class="c">
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="review_fre" value="1" />
						<span class="custom-control-label">Six months review</span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="review_fre" value="2" />
						<span class="custom-control-label">Annual Review</span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="review_fre" value="3" />
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
            <label class="form-label"><strong>Attendance</strong></label>
				<div class="radio_section pt-4 pb-4">	
					<div class="">
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="attendance" value="4" />
						<span class="custom-control-label">Very Good</span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="attendance" value="3" />
						<span class="custom-control-label">Good</span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="attendance" value="2" />
						<span class="custom-control-label">Improvement Needed</span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="attendance" value="1" />
						<span class="custom-control-label">Unsatisfactory</span>
					</label>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="attendance" class="form-label"><strong>Comments</strong></label>
				<div class="">
					<textarea name="att_com" class="form-control" placehoder="" rows="2"></textarea>
				</div>
			</div>	
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
            <label class="form-label"><strong>Quality of Work</strong></label>
				<div class="radio_section pt-4 pb-4">
					<div class="">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="quality_work" value="4" />
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="quality_work" value="3" />
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="quality_work" value="2" />
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="quality_work" value="1" />
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="qow_com" class="form-label"><strong>Comments</strong></label>
				<div class="">
					<textarea name="qow_com" class="form-control" placehoder="" rows="2"></textarea>
				</div>
			</div>	
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
            	<label class="form-label"><strong>Productivity</strong></label>
				<div class="radio_section pt-4 pb-4">
				
					<div class="">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="productivity" value="4" />
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="productivity" value="3" />
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="productivity" value="2" />
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="productivity" value="1" />
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="prod_com" class="form-label"><strong>Comments</strong></label>
				<div class="">
					<textarea name="prod_com" class="form-control" placehoder="" rows="2"></textarea>
				</div>
			</div>	

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
            	<label class="form-label"><strong>Knowledge of Job</strong></label>
				<div class="radio_section pt-4 pb-4">
					<div class="">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="kldg_job" value="4" />
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="kldg_job" value="3" />
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="kldg_job" value="2" />
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="kldg_job" value="1" />
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="kldg_com" class="form-label"><strong>Comments</strong></label>
				<div class="">
					<textarea name="kldg_com" class="form-control" placehoder="" rows="2"></textarea>
				</div>
			</div>	

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
            			<label class="form-label"><strong>Reliability and Dependability</strong></label>
				<div class="radio_section pt-4 pb-4">
					<div class="c">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="randa" value="4" />
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="randa" value="3" />
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="randa" value="2" />
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="randa" value="1" />
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="randa_com" class="form-label"><strong>Comments</strong></label>
				<div class="c">
					<textarea name="randa_com" class="form-control" placehoder="" rows="2"></textarea>
				</div>
			</div>	

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
            <label class="form-label"><strong>Initiative</strong></label>
				<div class="radio_section pt-4 pb-4">
					<div class="">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="initiative" value="4" />
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="initiative" value="3" />
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="initiative" value="2" />
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="initiative" value="1" />
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="init_com" class="form-label"><strong>Comments</strong></label>
				<div class="">
					<textarea name="init_com" class="form-control" placehoder="" rows="2"></textarea>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
            					<label class="form-label"><strong>Creativity :</strong></label>
				<div class="radio_section pt-4 pb-4">
					<div class="">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="creativity" value="4" />
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="creativity" value="3" />
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="creativity" value="2" />
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="creativity" value="1" />
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="creat_com" class="form-label"><strong>Comments</strong></label>
				<div class="">
					<textarea name="creat_com" class="form-control" placehoder="" rows="2"></textarea>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
            					<label class="form-label"><strong>Working Relationships :</strong></label>
				<div class="radio_section pt-4 pb-4">
					<div class="col-md-12">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="work_rela" value="4" />
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="work_rela" value="3" />
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="work_rela" value="2" />
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="review_period" value="1" />
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="workrela_com" class="form-label"><strong>Comments</strong></label>
				<div class="">
					<textarea name="workrela_com" class="form-control" placehoder="" rows="2"></textarea>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
 <label class="form-label"><strong>Adherence to company polices :</strong></label>
            
				<div class="radio_section pt-4 pb-4">
					<div class="col-md-12">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="adherence" value="4" />
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="adherence" value="3" />
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="adherence" value="2" />
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="adherence" value="1" />
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="adherence_com" class="form-label"><strong>Comments</strong></label>
				<div class="">
					<textarea name="adherence_com" class="form-control" placehoder="" rows="2"></textarea>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
            					<label class="form-label"><strong>Comments on overall organizational performance :</strong></label>
				<div class="radio_section pt-4 pb-4">
					<div class="">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="org_perform" value="4" />
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="org_perform" value="3" />
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="org_perform" value="2" />
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="org_perform" value="1" />
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="org_com" class="form-label"><strong>Comments</strong></label>
				<div class="">
					<textarea name="org_com" class="form-control" placehoder="" rows="2"></textarea>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
            					<label class="form-label"><strong>Overall performance ratings :</strong></label>
				<div class="radio_section pt-4 pb-4">
					<div class="">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="overall" value="4" />
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="overall" value="3" />
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="overall" value="2" />
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="overall" value="1" />
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>
			
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="overall_com" class="form-label"><strong>Comments</strong></label>
				<div class="">
					<textarea name="overall_com" class="form-control" placehoder="" rows="2"></textarea>
				</div>
			</div>

			<div class="col-md-12">
				<div class="row">
				<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="sprv_com" class="form-label">Supervisor comments on overall performance</label>
				<div class="">
					<textarea name="sprv_com" class="form-control" placehoder="" rows="2"></textarea>
				</div>
			</div>
					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<label for="emp_com" class="form-label">Employee Comments</label>
						<div class="">
							<textarea name="emp_com" class="form-control" placehoder="" rows="2"></textarea>
						</div>
					</div>
					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<label for="emp_improve" class="form-label">Specific Action Employee must to Improve with in qualified time</label>
						<div class="">
							<textarea name="emp_improve" class="form-control" placehoder="" rows="2"></textarea>
						</div>
					</div>
					
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Submit
				</button>
			</div>

		</div>
	</div>
</div>
	

	
	

<?php echo form_close(); ?>