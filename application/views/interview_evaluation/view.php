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
          <h6 class="card-header">Interview Evaluation</h6>
			<div class="card-body">
				<div class="box-body">
					
                    <a class="btn btn-success btn-sm float-right mb-2" href="<?php echo site_url('Interview_evaluation'); ?>">
                         Back
                    </a>

						<div class="box-body">
							<div class="row clearfix">
								<div class="col-md-6">
									<label for="candidate_name" class="form-label">Candidate Name : </label> <?php echo ($this->input->post('candidate_name') ? $this->input->post('candidate_name') : $interview_evaluation['candidate_name']); ?>
									
								</div>
								<div class="col-md-6">
									<label for="date_of_interview" class="form-label">Date Of Interview : </label>  
									<?php echo $this->input->post('date_of_interview') ? $this->input->post('date_of_interview') : date('d-m-Y',strtotime($interview_evaluation['date_of_interview'])); ?>
								</div>
                                <div class="col-md-6">
									<label for="job_title" class="form-label">Job Title : </label> 
									<?php echo ($this->input->post('job_title') ? $this->input->post('job_title') : $interview_evaluation['job_title']); ?>
								</div>
                                <div class="col-md-6">
									<label for="name_of_interviewer" class="form-label">Name Of Interviewer : </label> 
									<?php echo ($this->input->post('name_of_interviewer') ? $this->input->post('name_of_interviewer') : $interview_evaluation['name_of_interviewer']); ?>
								</div>
                                
								<div class="col-md-12 evaluation_radio_block">
								
									<div class="form-group">
									<label for="maturity" class="control-label"><strong>Job Knowledge</strong></label>
                                    <?php
                                    for($i=5; $i>=1; $i--)
                                    {
                                        if($i<$interview_evaluation['job_knowledge']){
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
									
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">

									<div class="form-group">
										<label for="maturity" class="control-label"><strong>Maturity</strong></label>
                                        <?php
                                        for($i=5; $i>=1; $i--)
                                        {
                                            if($i<$interview_evaluation['maturity']){
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
									
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">
									<div class="form-group">
										<label for="experience" class="control-label"><strong>Experience</strong></label>
										<?php
                                        for($i=5; $i>=1; $i--)
                                        {
                                            if($i<$interview_evaluation['experience']){
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
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">

									<div class="form-group">
										<label for="resilience" class="control-label"><strong>Resilience</strong></label>
                                        <?php
                                        for($i=5; $i>=1; $i--)
                                        {
                                            if($i<$interview_evaluation['resilience']){
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
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">

									<div class="form-group">
										<label for="leadership" class="control-label"><strong>Leadership</strong></label>
                                        <?php
                                        for($i=5; $i>=1; $i--)
                                        {
                                            if($i<$interview_evaluation['leadership']){
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
										
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">
									<div class="form-group">
										<label for="communication" class="control-label"><strong>Communication</strong></label>
                                        <?php
                                        for($i=5; $i>=1; $i--)
                                        {
                                            if($i<$interview_evaluation['communication']){
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
										
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">
									<div class="form-group">
										<label for="motivation" class="control-label"><strong>Motivation</strong></label>
                                        <?php
                                        for($i=5; $i>=1; $i--)
                                        {
                                            if($i<$interview_evaluation['motivation']){
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
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">
									<div class="form-group">
										<label for="intelligence" class="control-label"><strong>Intelligence</strong></label>
                                        <?php
                                        for($i=5; $i>=1; $i--)
                                        {
                                            if($i<$interview_evaluation['intelligence']){
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
										
									</div>
								</div>
								<div class="col-md-12 evaluation_radio_block">
									<div class="form-group">
										<label for="personality" class="control-label"><strong>Personality</strong></label>
                                        <?php
                                        for($i=5; $i>=1; $i--)
                                        {
                                            if($i<$interview_evaluation['personality']){
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
                                        <?php echo ($this->input->post('strong_areas_in_candidate') ? $this->input->post('strong_areas_in_candidate') : $interview_evaluation['strong_areas_in_candidate']); ?>
									</div>
								</div>
								<div class="col-md-6">
									<label for="weak_areas_in_candidate" class="form-label">Weak Areas In Candidate</label>
									<?php echo ($this->input->post('weak_areas_in_candidate') ? $this->input->post('weak_areas_in_candidate') : $interview_evaluation['weak_areas_in_candidate']); ?>
								</div>
								<div class="col-md-6">
									<label for="comments_of_interviewer" class="form-label">Comments Of Interviewer</label>
									<?php echo ($this->input->post('comments_of_interviewer') ? $this->input->post('comments_of_interviewer') : $interview_evaluation['comments_of_interviewer']); ?>
								</div>

							</div>
						</div>
						<div class="box-footer">
							
						</div>
				
				</div>
			</div>
		</div>
	</div>
</div>
<!-- / Content -->
