<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb; ?>
</h4>
      	<div class="card mb-4">
          <h6 class="card-header">SiteVisitPics Edit</h6>
            
            <div class="box card">
                                    <div class="card-body"> 
                                    	<div class="box-body"> 
			<?php echo form_open_multipart('SiteVisitPics/edit/'.$sitevisitPics['id']); ?>
		
				<div class="row clearfix">
				<div class="form-group col-md-6">
					<label class="form-label">ProjectId</label>
						<select class="custom-select" name="project_id" required>
						<span class="text-danger"><?php echo form_error('name');?></span>
						<option value="<?= $sitevisitPics['project_id'];?>" ><?= $sitevisitPics['project_name'];?></option>
						<?php foreach($PROJECTS as $project){?>
                			<option value="<?=$project->id;?>"><?=$project->name;?></option>    
        				<?php }?>
						</select>
						</div>
						<div class="form-group col-md-6">
								<label for="attach_name" class="form-label"><span class="text-danger">*</span>Attachment</label>
								<input type="file" name="attach_name" value="<?php echo ($this->input->post('attach_name')? $this->input->post('attach_name'):$sitevisitPics['name']); ?>" class="form-control" id="attach_name" />
								<span class="text-danger"><?php echo form_error('attach_name');?></span>
							</div>
							<div class="col-md-6">
						<label for="name" class="control-label">Remarks</label>
						<div class="form-group">
							<input type="text" name="remarks" value="<?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $sitevisitPics['remarks']); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>
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