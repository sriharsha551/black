
<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb;?>
</h4>
<div class="card mb-4">
            <h6 class="card-header">Edit</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo form_open('Exe_issue/edit/'.$issue['id']); ?>
					<div class="row clearfix">
						<div class="col-md-6">
						<label for="prj_id" class="form-label"><span class="text-danger">*</span>Project</label>
						<div class='form-group'>
						<select class="form-control" name="prj_id" >
						<!-- <option value='<?=$issue['prj_id'];?>'><?=$issue['prj_name'];?></option> -->
							        <?php foreach($prj_ids as $row) {?>
  							        <!-- <option value='<?php echo $row->id?>'?><?php echo $row->name?></option> -->
									  <option value='<?php echo $row->id?>' <?php echo (($this->input->post('prj_id') ? ($this->input->post('prj_id') == $row->id) : $row->id == $issue['prj_id'])) ? 'selected="selected"' : "" ?> ><?php echo $row->name?></option>

							        <?php }?>
								</select>	
						<span class="text-danger"><?php echo form_error('prj_id');?></span>
						</div>
						</div>
						<div class="col-md-6">
							<label for="attach_link" class="form-label"><span class="text-danger">*</span>Date</label>
							<div class="form-group">
								<input type="text" name="date" value="<?php echo ($this->input->post('date') ? $this->input->post('date') : $issue['date']); ?>" class="form-control" id="date" />
								<span class="text-danger"><?php echo form_error('date');?></span>
							</div>
						</div>
						<div class="col-md-6">
							<label  class="form-label"><span class="text-danger">*</span>Area</label>
							<div class="form-group">
							<select class="form-control" name="area_id" >
							        <?php foreach($area_ids as $row) {?>
									  <option value='<?php echo $row->id?>' <?php echo (($this->input->post('area') ? ($this->input->post('area') == $row->id) : $row->id == $issue['area'])) ? 'selected="selected"' : "" ?> ><?php echo $row->area?></option>
							        <?php }?>
								</select>
								<span class="text-danger"><?php echo form_error('area_id');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label  class="form-label"><span class="text-danger">*</span>Work Description</label>
							<div class="form-group">
								<input type="text" name="work_desc" value="<?php echo ($this->input->post('work_desc') ? $this->input->post('work_desc') : $issue['work_desc']); ?>" class="form-control" id="work_desc" />
								<span class="text-danger"><?php echo form_error('work_desc');?></span>
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
<!-- / Content -->
