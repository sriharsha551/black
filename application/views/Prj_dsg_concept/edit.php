
<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb; ?>
</h4>

      	<div class="card mb-4">
          <h6 class="card-header">Concept Edit</h6>
          <div class="box card">
                                    <div class="card-body"> 
                                    	<div class="box-body"> 
			<?php echo form_open('Prj_dsg_concept/edit/'.$concept['id']); ?>
		
				<div class="row clearfix">
                        <div class="col-md-6">
							<label for="prj_id" class="form-label"><span class="text-danger">*</span>Project Name</label>
							<div class="form-group">
                                <select class="form-control" name="prj_id" >
							        <?php foreach($prj_names as $row) {?>
  							        <option value='<?php echo $row->id?>' <?php echo ($row->id == $concept['prj_id']) ? 'selected="selected"' : "" ?> ><?php echo $row->name?></option>
							        <?php }?>
						        </select>
							</div>
						</div>
                        <!-- <div class="col-md-6">
							<label for="desing_stage_id" class="form-label"><span class="text-danger">*</span>Design Stage</label>
							<div class="form-group">
                                <select class="form-control" name="design_stage_id" value='<?php echo ($this->input->post('design_stage_id') ? $this->input->post('design_stage_id') : $concept['design_stage_id']);?>' >
							        <?php foreach($dsg_names as $row) {?>
  							        <option value='<?php echo $row->id?>'><?php echo $row->design_stage?></option>
							        <?php }?>
						        </select>
							</div>
						</div> -->
                        <div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Concept Name</label>
							<div class="form-group">
								<input type="text" name="name"  value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $concept['name']); ?>" class="form-control" id="name" />
								<span class="text-danger"><?php echo form_error('name');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="attach_link" class="form-label"><span class="text-danger">*</span>Attach Link</label>
							<div class="form-group">
								<input type="text" name="attach_link"  value="<?php echo ($this->input->post('attach_link') ? $this->input->post('attach_link') : $concept['attach_link']); ?>" class="form-control" id="attach_link" />
								<span class="text-danger"><?php echo form_error('attach_link');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Percentage</label>
							<div class="form-group">
								<input type="text" name="percentage"  value="<?php echo ($this->input->post('percentage') ? $this->input->post('percentage') : $concept['percentage']); ?>" class="form-control" id="percentage" />
								<span class="text-danger"><?php echo form_error('percentage');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="review_status" class="form-label"><span class="text-danger">*</span>Review Status</label>
							<div class="form-group">
							<select name="review_status" value="<?php echo $this->input->post('review_status')?>" class="form-control" id="review_status">
                                	<?php foreach ($review_statuses as $review_status) {?>
                                	<option value="<?php echo $review_status['id'] ?>" <?php echo ($concept['review_status'] == $review_status['id']) ? 'selected="selected"' : "" ?> ><?php echo $review_status['review_status_name'] ?></option>
                                	<?php } ?>
                            	</select>
								<span class="text-danger"><?php echo form_error('review_status');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="remarks" class="form-label"><span class="text-danger">*</span>Remarks</label>
							<div class="form-group">
								<input type="text" name="remarks" value="<?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $concept['remarks']); ?>" class="form-control" id="remarks" />
								<span class="text-danger"><?php echo form_error('remarks');?></span>
							</div>
						</div>
						<label class="checkbox-inline"><input type="checkbox" name="check" value="1">Revision Required</label>

                        <!-- <div class="col-md-6">
							<label for="revisions" class="form-label"><span class="text-danger">*</span>Revisions</label>
							<div class="form-group">
								<input type="text" name="revisions"  value="<?php echo ($this->input->post('revisions') ? $this->input->post('revisions') : $concept['revisions']); ?>" class="form-control" id="revisions" />
								<span class="text-danger"><?php echo form_error('revisions');?></span>
							</div>-->
						</div> 
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>  </div></div>
        


</div>
<!-- / Content -->