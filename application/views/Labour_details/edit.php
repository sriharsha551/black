<div class="layout-content">

	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>
    
		<div class="card mb-4">
            <h6 class="card-header">edit</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo  form_open_multipart('Labour_details/edit/'.$labours['id']); ?>
                    <div class="row clearfix">
                 <div class="col-md-6">                     
							 <label for="prj_id" class="col-md-6"><span class="text-danger">*</span>Project Name</label>
							 <div class="form-group">
							<select name="prj_id" class="form-control" id="prj_id"  required>
							 <option value="">Select projects</option>
							 <?php foreach ($prj as $b) { ?>
							 <option value="<?php echo $b['id']; ?>" <?php echo ($labours['prj_id'] == $b['id']) ? 'selected="selected"' : ""; ?> ><?php echo $b['name']; ?></option>
							 <?php } ?>
						 </select>
						 <span class="text-danger"><?php echo form_error('prj_id');?></span>
				       </div>
				       </div>	
                        <div class="col-md-6">
                             
							 <label for="trade_id" class="col-md-6"><span class="text-danger">*</span>Trade Name</label>
							 <div class="form-group">
							<select name="trade_id" class="form-control" id="trade_id"  required>
							 <option value="">Select Trade</option>
							 <?php foreach ($trade as $b) { ?>
							 <option value="<?php echo $b['id']; ?>" <?php echo ($labours['trade_id'] == $b['id']) ? 'selected="selected"' : ""; ?> ><?php echo $b['trade_name']; ?></option>
							 <?php } ?>
						 </select>
						 <span class="text-danger"><?php echo form_error('trade_id');?></span>
			        	  </div>
		         		  </div>	
                         <div class="col-md-6">
                           <label for="general_time" class="form-label"><span class="text-danger">*</span>General Hours</label>
							<div class="form-group">		
								<input type="textarea" name="general_time" value="<?php echo $this->input->post('general_time')?$this->input->post('general_time') : $labours['general_time']; ?>" class="form-control" id="general_time" />
								<span class="text-danger"><?php echo form_error('general_time');?></span>
		                    </div>
                            </div>
                            <div class="col-md-6">
                           <label for="over_time" class="form-label"><span class="text-danger">*</span>Overtime Hours</label>
							<div class="form-group">		
								<input type="textarea" name="over_time" value="<?php echo $this->input->post('over_time')?$this->input->post('over_time') : $labours['over_time']; ?>" class="form-control" id="over_time" />
								<span class="text-danger"><?php echo form_error('over_time');?></span>
		                    </div>
                            </div>
                            <div class="col-md-6">
                           <label for="date" class="form-label"><span class="text-danger">*</span>Date</label>
							<div class="form-group">		
								<input type="date" name="date" value="<?php echo $this->input->post('date')?$this->input->post('date') : $labours['date']; ?>" class="form-control" id="date" />
								<span class="text-danger"><?php echo form_error('date');?></span>
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

