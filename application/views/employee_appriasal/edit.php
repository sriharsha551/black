<?php echo form_open('employee_appriasal/edit/'.$employee_appriasal["id"],array("class"=>"form-horizontal")); ?>
<div class="col-md-12 mt-3">
	<div class="card mb-4">
		<h6 class="card-header">EMPLOYEE APRAISAL</h6>
		<div class="card-body row">
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="empId" class="col-md-12 control-label">Employee ID</label>
				<div class="col-md-12">					
					<input type="text" name="empId" id="empId" value="<?php echo $employee_appriasal["empId"];?>" placeholder="" class="form-control"/>
				</div>
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="date" class="col-md-12 control-label">Employee Name</label>
				<div class="col-md-12">
				<input type="text" name="employee_name" id="employee_name" value="<?php echo $employee["empName"];?>" placeholder="" class="form-control"/>
				</div>
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="review_fre" class="col-md-12 control-label">Position</label>
				<div class="col-md-12">
					<input type="text" name="position" id="position" value="<?php echo $employee["Designation"];?>" placeholder="" class="form-control"/>
				</div>
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="attendance" class="col-md-12 control-label">Department</label>
				<div class="col-md-12">
				<input type="text" name="department" id="department" value="<?php echo $employee["Department"];?>" placeholder="" class="form-control"/>
				</div>
			</div>
			
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="attendance" class="col-md-12 control-label">Present Rate</label>
				<div class="col-md-12">
				<input type="text" name="present_rate" value="<?php echo $employee_appriasal["present_rate"];?>" placeholder="" class="form-control"/>
				</div>
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="attendance" class="col-md-12 control-label">Date of Review</label>
				<div class="col-md-12">
				<input type="text" name="review_date" id="datepicker-inline" value="<?php echo date('d-m-Y',strtotime($employee_appriasal["review_date"]));?>" placeholder="" class="form-control"/>
				</div>
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
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="attendance" value="4" <?php echo ($employee_appriasal['attendance']==4 ? 'checked' : ''); ?>/>
						<span class="custom-control-label">Very Good</span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="attendance" value="3" <?php echo ($employee_appriasal['attendance']==3 ? 'checked' : ''); ?>/>
						<span class="custom-control-label">Good</span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="attendance" value="2" <?php echo ($employee_appriasal['attendance']==2 ? 'checked' : ''); ?>/>
						<span class="custom-control-label">Improvement Needed</span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" name="attendance" value="1" <?php echo ($employee_appriasal['attendance']==1 ? 'checked' : ''); ?>/>
						<span class="custom-control-label">Unsatisfactory</span>
					</label>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="attendance" class="col-md-12 control-label"><strong>Comments</strong></label>
				<div class="col-md-12">
					<textarea name="att_com" class="form-control" placehoder="" rows="2"><?php echo ($this->input->post('att_com') ? $this->input->post('att_com') : $employee_appriasal['att_com']); ?></textarea>
				</div>
			</div>	
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Quality of Work :</strong></label>
					<div class="col-md-12">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="quality_work" value="4" <?php echo ($employee_appriasal['quality_work']==4 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="quality_work" value="3" <?php echo ($employee_appriasal['quality_work']==3 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="quality_work" value="2" <?php echo ($employee_appriasal['quality_work']==2 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="quality_work" value="1" <?php echo ($employee_appriasal['quality_work']==1 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="qow_com" class="col-md-12 control-label"><strong>Comments</strong></label>
				<div class="col-md-12">
					<textarea name="qow_com" class="form-control" placehoder="" rows="2"><?php echo ($this->input->post('qow_com') ? $this->input->post('qow_com') : $employee_appriasal['qow_com']); ?></textarea>
				</div>
			</div>	
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Productivity :</strong></label>
					<div class="col-md-12">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="productivity" value="4" <?php echo ($employee_appriasal['productivity']==4 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="productivity" value="3" <?php echo ($employee_appriasal['productivity']==3 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="productivity" value="2" <?php echo ($employee_appriasal['productivity']==2 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="productivity" value="1" <?php echo ($employee_appriasal['productivity']==1 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="prod_com" class="col-md-12 control-label"><strong>Comments</strong></label>
				<div class="col-md-12">
					<textarea name="prod_com" class="form-control" placehoder="" rows="2"><?php echo ($this->input->post('prod_com') ? $this->input->post('prod_com') : $employee_appriasal['prod_com']); ?></textarea>
				</div>
			</div>	

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Knowledge of Job :</strong></label>
					<div class="col-md-12">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="kldg_job" value="4" <?php echo ($employee_appriasal['kldg_job']==4 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="kldg_job" value="3" <?php echo ($employee_appriasal['kldg_job']==3 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="kldg_job" value="2" <?php echo ($employee_appriasal['kldg_job']==2 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="kldg_job" value="1" <?php echo ($employee_appriasal['kldg_job']==1 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="kldg_com" class="col-md-12 control-label"><strong>Comments</strong></label>
				<div class="col-md-12">
					<textarea name="kldg_com" class="form-control" placehoder="" rows="2"><?php echo ($this->input->post('kldg_com') ? $this->input->post('kldg_com') : $employee_appriasal['kldg_com']); ?></textarea>
				</div>
			</div>	

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Reliability and Dependability :</strong></label>
					<div class="col-md-12">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="randa" value="4" <?php echo ($employee_appriasal['randa']==4 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="randa" value="3" <?php echo ($employee_appriasal['randa']==3 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="randa" value="2" <?php echo ($employee_appriasal['randa']==2 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="randa" value="1" <?php echo ($employee_appriasal['randa']==1 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="randa_com" class="col-md-12 control-label"><strong>Comments</strong></label>
				<div class="col-md-12">
					<textarea name="randa_com" class="form-control" placehoder="" rows="2"><?php echo ($this->input->post('randa_com') ? $this->input->post('randa_com') : $employee_appriasal['randa_com']); ?></textarea>
				</div>
			</div>	

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Initiative :</strong></label>
					<div class="col-md-12">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="initiative" value="4" <?php echo ($employee_appriasal['initiative']==4 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="initiative" value="3" <?php echo ($employee_appriasal['initiative']==3 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="initiative" value="2" <?php echo ($employee_appriasal['initiative']==2 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="initiative" value="1" <?php echo ($employee_appriasal['initiative']==1 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="init_com" class="col-md-12 control-label"><strong>Comments</strong></label>
				<div class="col-md-12">
					<textarea name="init_com" class="form-control" placehoder="" rows="2"><?php echo ($this->input->post('init_com') ? $this->input->post('init_com') : $employee_appriasal['init_com']); ?></textarea>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Creativity :</strong></label>
					<div class="col-md-12">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="creativity" value="4" <?php echo ($employee_appriasal['creativity']==4 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="creativity" value="3" <?php echo ($employee_appriasal['creativity']==3 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="creativity" value="2" <?php echo ($employee_appriasal['creativity']==2 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="creativity" value="1" <?php echo ($employee_appriasal['creativity']==1 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="creat_com" class="col-md-12 control-label"><strong>Comments</strong></label>
				<div class="col-md-12">
					<textarea name="creat_com" class="form-control" placehoder="" rows="2"><?php echo ($this->input->post('creat_com') ? $this->input->post('creat_com') : $employee_appriasal['creat_com']); ?></textarea>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Working Relationships :</strong></label>
					<div class="col-md-12">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="work_rela" value="4" <?php echo ($employee_appriasal['work_rela']==4 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="work_rela" value="3" <?php echo ($employee_appriasal['work_rela']==3 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="work_rela" value="2" <?php echo ($employee_appriasal['work_rela']==2 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="review_period" value="1" <?php echo ($employee_appriasal['work_rela']==1 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="workrela_com" class="col-md-12 control-label"><strong>Comments</strong></label>
				<div class="col-md-12">
					<textarea name="workrela_com" class="form-control" placehoder="" rows="2"><?php echo ($this->input->post('workrela_com') ? $this->input->post('workrela_com') : $employee_appriasal['workrela_com']); ?></textarea>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Adherence to company polices :</strong></label>
					<div class="col-md-12">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="adherence" value="4" <?php echo ($employee_appriasal['adherence']==4 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="adherence" value="3" <?php echo ($employee_appriasal['adherence']==3 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="adherence" value="2" <?php echo ($employee_appriasal['adherence']==2 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="adherence" value="1" <?php echo ($employee_appriasal['adherence']==1 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="adherence_com" class="col-md-12 control-label"><strong>Comments</strong></label>
				<div class="col-md-12">
					<textarea name="adherence_com" class="form-control" placehoder="" rows="2"><?php echo ($this->input->post('adherence_com') ? $this->input->post('adherence_com') : $employee_appriasal['adherence_com']); ?></textarea>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Comments on overall organizational performance :</strong></label>
					<div class="col-md-12">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="org_perform" value="4" <?php echo ($employee_appriasal['org_perform']==4 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="org_perform" value="3" <?php echo ($employee_appriasal['org_perform']==3 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="org_perform" value="2" <?php echo ($employee_appriasal['org_perform']==2 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="org_perform" value="1" <?php echo ($employee_appriasal['org_perform']==1 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="org_com" class="col-md-12 control-label"><strong>Comments</strong></label>
				<div class="col-md-12">
					<textarea name="org_com" class="form-control" placehoder="" rows="2"><?php echo ($this->input->post('org_com') ? $this->input->post('org_com') : $employee_appriasal['org_com']); ?></textarea>
				</div>
			</div>

			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<div class="radio_section pt-2 pb-2">
					<label class="col-md-12 control-label"><strong>Overall performance ratings :</strong></label>
					<div class="col-md-12">
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="overall" value="4" <?php echo ($employee_appriasal['overall']==4 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Very Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="overall" value="3" <?php echo ($employee_appriasal['overall']==3 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Good</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="overall" value="2" <?php echo ($employee_appriasal['overall']==2 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Improvement Needed</span>
						</label>
						<label class="custom-control custom-radio custom-control-inline">
							<input type="radio" class="custom-control-input" name="overall" value="1" <?php echo ($employee_appriasal['overall']==1 ? 'checked' : ''); ?>/>
							<span class="custom-control-label">Unsatisfactory</span>
						</label>
					</div>
				</div>
			</div>
			
			<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="overall_com" class="col-md-12 control-label"><strong>Comments</strong></label>
				<div class="col-md-12">
					<textarea name="overall_com" class="form-control" placehoder="" rows="2"><?php echo ($this->input->post('overall_com') ? $this->input->post('overall_com') : $employee_appriasal['overall_com']); ?></textarea>
				</div>
			</div>

			<div class="col-md-12">
				<div class="row">
				<div class="form-group col-md-6 col-sm-6 col-xs-12">
				<label for="sprv_com" class="col-md-12 control-label">Supervisor comments on overall performance</label>
				<div class="col-md-12">
					<textarea name="sprv_com" class="form-control" placehoder="" rows="2"><?php echo ($this->input->post('sprv_com') ? $this->input->post('sprv_com') : $employee_appriasal['sprv_com']); ?></textarea>
				</div>
			</div>
					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<label for="emp_com" class="col-md-12 control-label">Employee Comments</label>
						<div class="col-md-12">
							<textarea name="emp_com" class="form-control" placehoder="" rows="2"><?php echo ($this->input->post('emp_com') ? $this->input->post('emp_com') : $employee_appriasal['emp_com']); ?></textarea>
						</div>
					</div>
					<div class="form-group col-md-6 col-sm-6 col-xs-12">
						<label for="emp_improve" class="col-md-12 control-label">Specific Action Employee must to Improve with in qualified time</label>
						<div class="col-md-12">
							<textarea name="emp_improve" class="form-control" placehoder="" rows="2"><?php echo ($this->input->post('emp_improve') ? $this->input->post('emp_improve') : $employee_appriasal['emp_improve']); ?></textarea>
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