<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">
		<h4 class="font-weight-bold py-1 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>

		<div class="card mb-4">
          <h6 class="card-header">Interview Evaluation Edit</h6>
			<div class="card-body">
				<div class="box-body">
					<?php echo $message; ?>

					<?php echo form_open('Interview_evaluation/edit/'.$interview_evaluation['id']); ?>
						<div class="box-body">
							<div class="row clearfix">
								<div class="col-md-6">
									<label for="candidate_name" class="form-label"><span class="text-danger">*</span>Candidate Name</label>
									<div class="form-group">
										<input type="text" name="candidate_name" value="<?php echo ($this->input->post('candidate_name') ? $this->input->post('candidate_name') : $interview_evaluation['candidate_name']); ?>" class="form-control" id="candidate_name" />
										<span class="text-danger"><?php echo form_error('candidate_name'); ?></span>
									</div>
								</div>
								<div class="col-md-6">
									<label for="date_of_interview" class="form-label"><span class="text-danger">*</span>Date Of Interview</label>
									<div class="form-group">
										<input type="text" name="date_of_interview" value="<?php echo $this->input->post('date_of_interview') ? $this->input->post('date_of_interview') : date('d-m-Y',strtotime($interview_evaluation['date_of_interview'])); ?>" class="form-control" id="datepicker-inline" />
										<span class="text-danger"><?php echo form_error('date_of_interview'); ?></span>
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">
								
									<div class="form-group">
									<label for="maturity" class="control-label"><strong>Job Knowledge</strong></label>
									<label class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="job_knowledge" value="5"  id="job_knowledge1" <?php echo ($interview_evaluation['job_knowledge']==5 ? 'checked' : ''); ?>>
										<span class="custom-control-label">Execellent</span>
									</label>
									<label class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="job_knowledge" value="4"  id="job_knowledge2" <?php echo ($interview_evaluation['job_knowledge']==4 ? 'checked' : ''); ?>>
										<span class="custom-control-label">Good</span>
									</label>
									<label class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="job_knowledge" value="3"  id="job_knowledge3" <?php echo ($interview_evaluation['job_knowledge']==3 ? 'checked' : ''); ?>>
										<span class="custom-control-label">Average</span>
									</label>
									<label class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="job_knowledge" value="2"  id="job_knowledge4" <?php echo ($interview_evaluation['job_knowledge']==2 ? 'checked' : ''); ?>>
										<span class="custom-control-label">Satisfactory</span>
									</label>
									<label class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="job_knowledge" value="1"  id="job_knowledge5" <?php echo ($interview_evaluation['job_knowledge']==1 ? 'checked' : ''); ?>>
										<span class="custom-control-label">Poor</span>
									</label>

									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">

									<div class="form-group">
										<label for="maturity" class="control-label"><strong>Maturity</strong></label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="maturity" value="5"  id="maturity1" <?php echo ($interview_evaluation['maturity']==5 ? 'checked' : ''); ?>/><span class="custom-control-label">Execellent</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="maturity" value="4"  id="maturity2" <?php echo ($interview_evaluation['maturity']==4 ? 'checked' : ''); ?>/><span class="custom-control-label">Good</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="maturity" value="3"  id="maturity3" <?php echo ($interview_evaluation['maturity']==3 ? 'checked' : ''); ?>/><span class="custom-control-label">Average</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="maturity" value="2"  id="maturity4" <?php echo ($interview_evaluation['maturity']==2 ? 'checked' : ''); ?>/><span class="custom-control-label">Satisfactory</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="maturity" value="1"  id="maturity5" <?php echo ($interview_evaluation['maturity']==1 ? 'checked' : ''); ?>/><span class="custom-control-label">Poor</span>
										</label>
									
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">

									<div class="form-group">
										<label for="experience" class="control-label"><strong>Experience</strong></label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="experience" value="5"  id="" <?php echo ($interview_evaluation['experience']==5 ? 'checked' : ''); ?>/><span class="custom-control-label">Execellent</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="experience" value="4"  id="" <?php echo ($interview_evaluation['experience']==4 ? 'checked' : ''); ?>/><span class="custom-control-label">Good</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="experience" value="3"  id="" <?php echo ($interview_evaluation['experience']==3 ? 'checked' : ''); ?>/><span class="custom-control-label">Average</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="experience" value="2"  id="" <?php echo ($interview_evaluation['experience']==2 ? 'checked' : ''); ?>/><span class="custom-control-label">Satisfactory</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="experience" value="1"  id="" <?php echo ($interview_evaluation['experience']==1 ? 'checked' : ''); ?>/><span class="custom-control-label">Poor</span>
										</label>											
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">

									<div class="form-group">
										<label for="resilience" class="control-label"><strong>Resilience</strong></label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="resilience" value="5"  id="" <?php echo ($interview_evaluation['resilience']==5 ? 'checked' : ''); ?>/><span class="custom-control-label">Execellent</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="resilience" value="4"  id="" <?php echo ($interview_evaluation['resilience']==4 ? 'checked' : ''); ?>/><span class="custom-control-label">Good</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="resilience" value="3"  id="" <?php echo ($interview_evaluation['resilience']==3 ? 'checked' : ''); ?>/><span class="custom-control-label">Average</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="resilience" value="2"  id="" <?php echo ($interview_evaluation['resilience']==2 ? 'checked' : ''); ?>/><span class="custom-control-label">Satisfactory</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="resilience" value="1"  id="" <?php echo ($interview_evaluation['resilience']==1 ? 'checked' : ''); ?>/><span class="custom-control-label">Poor</span>
										</label>
										
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">

									<div class="form-group">
										<label for="leadership" class="control-label"><strong>Leadership</strong></label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="leadership" value="5"  id="" <?php echo ($interview_evaluation['leadership']==5 ? 'checked' : ''); ?>/><span class="custom-control-label">Execellent</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="leadership" value="4"  id="" <?php echo ($interview_evaluation['leadership']==4 ? 'checked' : ''); ?>/><span class="custom-control-label">Good</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="leadership" value="3"  id="" <?php echo ($interview_evaluation['leadership']==3 ? 'checked' : ''); ?>/><span class="custom-control-label">Average</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="leadership" value="2"  id="" <?php echo ($interview_evaluation['leadership']==2 ? 'checked' : ''); ?>/><span class="custom-control-label">Satisfactory</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="leadership" value="1"  id="" <?php echo ($interview_evaluation['leadership']==1 ? 'checked' : ''); ?>/><span class="custom-control-label">Poor</span>
										</label>
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">
									<div class="form-group">
										<label for="communication" class="control-label"><strong>Communication</strong></label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="communication" value="5"  id="" <?php echo ($interview_evaluation['communication']==5 ? 'checked' : ''); ?>/><span class="custom-control-label">Execellent</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="communication" value="4"  id="" <?php echo ($interview_evaluation['communication']==4 ? 'checked' : ''); ?>/><span class="custom-control-label">Good</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="communication" value="3"  id="" <?php echo ($interview_evaluation['communication']==3 ? 'checked' : ''); ?>/><span class="custom-control-label">Average</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="communication" value="2"  id="" <?php echo ($interview_evaluation['communication']==2 ? 'checked' : ''); ?>/><span class="custom-control-label">Satisfactory</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="communication" value="1"  id="" <?php echo ($interview_evaluation['communication']==1 ? 'checked' : ''); ?>/><span class="custom-control-label">Poor</span>
										</label>
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">
									<div class="form-group">
										<label for="motivation" class="control-label"><strong>Motivation</strong></label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="motivation" value="5"  id="" <?php echo ($interview_evaluation['motivation']==5 ? 'checked' : ''); ?>/><span class="custom-control-label">Execellent</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="motivation" value="4"  id="" <?php echo ($interview_evaluation['motivation']==4 ? 'checked' : ''); ?>/><span class="custom-control-label">Good</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="motivation" value="3"  id="" <?php echo ($interview_evaluation['motivation']==3 ? 'checked' : ''); ?>/><span class="custom-control-label">Average</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="motivation" value="2"  id="" <?php echo ($interview_evaluation['motivation']==2 ? 'checked' : ''); ?>/><span class="custom-control-label">Satisfactory</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="motivation" value="1"  id="" <?php echo ($interview_evaluation['motivation']==1 ? 'checked' : ''); ?>/><span class="custom-control-label">Poor</span>
										</label>
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">
									<div class="form-group">
										<label for="intelligence" class="control-label"><strong>Intelligence</strong></label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="intelligence" value="5"  id="" <?php echo ($interview_evaluation['intelligence']==5 ? 'checked' : ''); ?>/><span class="custom-control-label">Execellent</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="intelligence" value="4"  id="" <?php echo ($interview_evaluation['intelligence']==4 ? 'checked' : ''); ?>/><span class="custom-control-label">Good</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="intelligence" value="3"  id="" <?php echo ($interview_evaluation['intelligence']==3 ? 'checked' : ''); ?>/><span class="custom-control-label">Average</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="intelligence" value="2"  id="" <?php echo ($interview_evaluation['intelligence']==2 ? 'checked' : ''); ?>/><span class="custom-control-label">Satisfactory</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="intelligence" value="1"  id="" <?php echo ($interview_evaluation['intelligence']==1 ? 'checked' : ''); ?>/><span class="custom-control-label">Poor</span>
										</label>
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">
									<div class="form-group">
										<label for="personality" class="control-label"><strong>Personality</strong></label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="personality" value="5"  id="" <?php echo ($interview_evaluation['personality']==5 ? 'checked' : ''); ?>/><span class="custom-control-label">Execellent</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="personality" value="4"  id="" <?php echo ($interview_evaluation['personality']==4 ? 'checked' : ''); ?>/><span class="custom-control-label">Good</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="personality" value="3"  id="" <?php echo ($interview_evaluation['personality']==3 ? 'checked' : ''); ?>/><span class="custom-control-label">Average</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="personality" value="2"  id="" <?php echo ($interview_evaluation['personality']==2 ? 'checked' : ''); ?>/><span class="custom-control-label">Satisfactory</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" name="personality" value="1"  id="" <?php echo ($interview_evaluation['personality']==1 ? 'checked' : ''); ?>/><span class="custom-control-label">Poor</span>
										</label>
									</div>
								</div>
								<div class="col-md-6">
									<label for="job_title" class="form-label"><span class="text-danger">*</span>Job Title</label>
									<div class="form-group">
										<input type="text" name="job_title" value="<?php echo ($this->input->post('job_title') ? $this->input->post('job_title') : $interview_evaluation['job_title']); ?>" class="form-control" id="job_title" />
										<span class="text-danger"><?php echo form_error('job_title'); ?></span>
									</div>
								</div>
								<div class="col-md-6">
									<label for="name_of_interviewer" class="form-label">Name Of Interviewer</label>
									<div class="form-group">
										<input type="text" name="name_of_interviewer" value="<?php echo ($this->input->post('name_of_interviewer') ? $this->input->post('name_of_interviewer') : $interview_evaluation['name_of_interviewer']); ?>" class="form-control" id="name_of_interviewer" />
									</div>
								</div>
								<div class="col-md-6">
									<label for="interview_status" class="form-label">Interview Status</label>
									<div class="form-group">
										<select name="interview_status" class="form-control" id="interview_status" >
											<option value="">Select</option>
											<option value="0" <?php echo ($interview_evaluation['interview_status'] == 0) ? ' selected="selected"' : "";?> >On Hold</option>
											<option value="1" <?php echo ($interview_evaluation['interview_status'] == 1) ? ' selected="selected"' : "";?>>Selected</option>
											<option value="2" <?php echo ($interview_evaluation['interview_status'] == 2) ? ' selected="selected"' : "";?>>Rejected</option>
										</select> 
										
									</div>
								</div>
								<div class="col-md-6">
									<label for="strong_areas_in_candidate" class="form-label">Strong Areas In Candidate</label>
									<div class="form-group">
										<textarea name="strong_areas_in_candidate" class="form-control" id="strong_areas_in_candidate"><?php echo ($this->input->post('strong_areas_in_candidate') ? $this->input->post('strong_areas_in_candidate') : $interview_evaluation['strong_areas_in_candidate']); ?></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<label for="weak_areas_in_candidate" class="form-label">Weak Areas In Candidate</label>
									<div class="form-group">
										<textarea name="weak_areas_in_candidate" class="form-control" id="weak_areas_in_candidate"><?php echo ($this->input->post('weak_areas_in_candidate') ? $this->input->post('weak_areas_in_candidate') : $interview_evaluation['weak_areas_in_candidate']); ?></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<label for="comments_of_interviewer" class="form-label">Comments Of Interviewer</label>
									<div class="form-group">
										<textarea name="comments_of_interviewer" class="form-control" id="comments_of_interviewer"><?php echo ($this->input->post('comments_of_interviewer') ? $this->input->post('comments_of_interviewer') : $interview_evaluation['comments_of_interviewer']); ?></textarea>
									</div>
								</div>

							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-check"></i> Save
							</button>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- / Content -->
