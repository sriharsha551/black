<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Layout content -->
<div class="layout-content">

<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-1 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb; ?>
</h4>

									<div class="box card">
                                    <div class="card-body">
										<div class="box-header with-border">
												<h3 class="box-title">Interview Evaluation Add</h3>
										</div>
										<div class="box-body">
												<?php echo $message;?>										

												<?php echo form_open('admin/interview_evaluation/add'); ?>
												<div class="box-body">
													<div class="row clearfix">
                                          
													<div class="col-md-6">
															<label for="candidate_name" class="control-label"><span class="text-danger">*</span>Candidate Name</label>
															<div class="form-group">
																<input type="text" name="candidate_name" value="<?php echo $this->input->post('candidate_name'); ?>" class="form-control" id="candidate_name" />
																<span class="text-danger"><?php echo form_error('candidate_name');?></span>
															</div>
														</div>

														<div class="col-md-6">
														<label for="date_of_interview" class="control-label"><span class="text-danger">*</span>Date Of Interview</label>
															<div class="form-group">
																<input type="text" name="date_of_interview" value="<?php echo $this->input->post('date_of_interview'); ?>" class="form-control" id="date_of_interview" />
																<span class="text-danger"><?php echo form_error('date_of_interview');?></span>
															</div>
														</div>
														<div class="col-md-12 evaluation_radio_block">
															<div class="row">
																<div class="col-md-2">
																	<strong>Maturity</strong>
																</div>
																<div class="col-md-10">
																	<ul class="form-group form-inline custom-radio-group">
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="job_knowledge" value="1"  id="job_knowledge1" >
																				<span class="custom-control-label"><strong>Execellent</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="job_knowledge" value="2"  id="job_knowledge2" >
																				<span class="custom-control-label"><strong>Good</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="job_knowledge" value="3"  id="job_knowledge3" >
																				<span class="custom-control-label"><strong>Average</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="job_knowledge" value="4"  id="job_knowledge4" >
																				<span class="custom-control-label"><strong>Satisfactory</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="job_knowledge" value="5"  id="job_knowledge5" >
																				<span class="custom-control-label"><strong>Poor</strong></span>
																			</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>

														<div class="col-md-12 evaluation_radio_block">
															<div class="row">
																<div class="col-md-2">
																	<strong>Experience</strong>
																</div>
																<div class="col-md-10">
																	<ul class="form-group form-inline custom-radio-group">
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="experience" value="1"  id="experience1" >
																				<span class="custom-control-label"><strong>Execellent</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="experience" value="2"  id="experience2" >
																				<span class="custom-control-label"><strong>Good</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="experience" value="3"  id="experience3" >
																				<span class="custom-control-label"><strong>Average</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="experience" value="4"  id="experience4" >
																				<span class="custom-control-label"><strong>Satisfactory</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="experience" value="5"  id="experience5" >
																				<span class="custom-control-label"><strong>Poor</strong></span>
																			</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>

														<div class="col-md-12 evaluation_radio_block">
															<div class="row">
																<div class="col-md-2">
																	<strong>Resilience</strong>
																</div>
																<div class="col-md-10">
																	<ul class="form-group form-inline custom-radio-group">
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="resilience" value="1"  id="resilience1" >
																				<span class="custom-control-label"><strong>Execellent</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="resilience" value="2"  id="resilience2" >
																				<span class="custom-control-label"><strong>Good</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="resilience" value="3"  id="resilience3" >
																				<span class="custom-control-label"><strong>Average</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="resilience" value="4"  id="resilience4" >
																				<span class="custom-control-label"><strong>Satisfactory</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="resilience" value="5"  id="resilience5" >
																				<span class="custom-control-label"><strong>Poor</strong></span>
																			</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>

														<div class="col-md-12 evaluation_radio_block">
															<div class="row">
																<div class="col-md-2">
																	<strong>Leadership</strong>
																</div>
																<div class="col-md-10">
																	<ul class="form-group form-inline custom-radio-group">
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="leadership" value="1"  id="leadership1" >
																				<span class="custom-control-label"><strong>Execellent</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="leadership" value="2"  id="leadership2" >
																				<span class="custom-control-label"><strong>Good</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="leadership" value="3"  id="leadership3" >
																				<span class="custom-control-label"><strong>Average</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="leadership" value="4"  id="leadership4" >
																				<span class="custom-control-label"><strong>Satisfactory</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="leadership" value="5"  id="leadership5" >
																				<span class="custom-control-label"><strong>Poor</strong></span>
																			</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														
														<div class="col-md-12 evaluation_radio_block">
															<div class="row">
																<div class="col-md-2">
																	<strong>Communication</strong>
																</div>
																<div class="col-md-10">
																	<ul class="form-group form-inline custom-radio-group">
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="communication" value="1"  id="communication1" >
																				<span class="custom-control-label"><strong>Execellent</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="communication" value="2"  id="communication2" >
																				<span class="custom-control-label"><strong>Good</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="communication" value="3"  id="communication3" >
																				<span class="custom-control-label"><strong>Average</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="communication" value="4"  id="communication4" >
																				<span class="custom-control-label"><strong>Satisfactory</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="communication" value="5"  id="communication5" >
																				<span class="custom-control-label"><strong>Poor</strong></span>
																			</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>


														<div class="col-md-12 evaluation_radio_block">
															<div class="row">
																<div class="col-md-2">
																	<strong>Motivation</strong>
																</div>
																<div class="col-md-10">
																	<ul class="form-group form-inline custom-radio-group">
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="motivation" value="1"  id="motivation1" >
																				<span class="custom-control-label"><strong>Execellent</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="motivation" value="2"  id="motivation2" >
																				<span class="custom-control-label"><strong>Good</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="motivation" value="3"  id="motivation3" >
																				<span class="custom-control-label"><strong>Average</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="motivation" value="4"  id="motivation4" >
																				<span class="custom-control-label"><strong>Satisfactory</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="motivation" value="5"  id="motivation5" >
																				<span class="custom-control-label"><strong>Poor</strong></span>
																			</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													
														<div class="col-md-12 evaluation_radio_block">
															<div class="row">
																<div class="col-md-2">
																	<strong>Intelligence</strong>
																</div>
																<div class="col-md-10">
																	<ul class="form-group form-inline custom-radio-group">
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="intelligence" value="1"  id="intelligence1" >
																				<span class="custom-control-label"><strong>Execellent</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="intelligence" value="2"  id="intelligence2" >
																				<span class="custom-control-label"><strong>Good</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="intelligence" value="3"  id="intelligence3" >
																				<span class="custom-control-label"><strong>Average</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="intelligence" value="4"  id="intelligence4" >
																				<span class="custom-control-label"><strong>Satisfactory</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="intelligence" value="5"  id="intelligence5" >
																				<span class="custom-control-label"><strong>Poor</strong></span>
																			</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>

														<div class="col-md-12 evaluation_radio_block">
															<div class="row">
																<div class="col-md-2">
																	<strong>Personality</strong>
																</div>
																<div class="col-md-10">
																	<ul class="form-group form-inline custom-radio-group">
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="personality" value="1"  id="personality1" >
																				<span class="custom-control-label"><strong>Execellent</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="personality" value="2"  id="personality2" >
																				<span class="custom-control-label"><strong>Good</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="personality" value="3"  id="personality3" >
																				<span class="custom-control-label"><strong>Average</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="personality" value="4"  id="personality4" >
																				<span class="custom-control-label"><strong>Satisfactory</strong></span>
																			</label>
																		</li>
																		<li class="custom-radio-item">
																			<label class="custom-control custom-radio">
																				<input type="radio" class="custom-control-input" name="personality" value="5"  id="personality5" >
																				<span class="custom-control-label"><strong>Poor</strong></span>
																			</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													
					
														<div class="col-md-6">
															<label for="job_title" class="control-label"><span class="text-danger">*</span>Job Title</label>
															<div class="form-group">
																<input type="text" name="job_title" value="<?php echo $this->input->post('job_title'); ?>" class="form-control" id="job_title" />
																<span class="text-danger"><?php echo form_error('job_title');?></span>
															</div>
														</div>
														<div class="col-md-6">
															<label for="name_of_interviewer" class="control-label">Name Of Interviewer</label>
															<div class="form-group">
																<input type="text" name="name_of_interviewer" value="<?php echo $this->input->post('name_of_interviewer'); ?>" class="form-control" id="name_of_interviewer" />
															</div>
														</div>
														<div class="col-md-6">
															<label for="interview_status" class="control-label">Interview Status</label>
															<div class="form-group">
																<input type="text" name="interview_status" value="<?php echo $this->input->post('interview_status'); ?>" class="form-control" id="interview_status" />
															</div>
														</div>
														<div class="col-md-6">
															<label for="strong_areas_in_candidate" class="control-label">Strong Areas In Candidate</label>
															<div class="form-group">
																<textarea name="strong_areas_in_candidate" class="form-control" id="strong_areas_in_candidate"><?php echo $this->input->post('strong_areas_in_candidate'); ?></textarea>
															</div>
														</div>
														<div class="col-md-6">
															<label for="weak_areas_in_candidate" class="control-label">Weak Areas In Candidate</label>
															<div class="form-group">
																<textarea name="weak_areas_in_candidate" class="form-control" id="weak_areas_in_candidate"><?php echo $this->input->post('weak_areas_in_candidate'); ?></textarea>
															</div>
														</div>
														<div class="col-md-6">
															<label for="comments_of_interviewer" class="control-label">Comments Of Interviewer</label>
															<div class="form-group">
																<textarea name="comments_of_interviewer" class="form-control" id="comments_of_interviewer"><?php echo $this->input->post('comments_of_interviewer'); ?></textarea>
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
