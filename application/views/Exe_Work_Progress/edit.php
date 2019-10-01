<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
            <?php echo $breadcrumb; 
            ?>
		</h4>
		<div class="card mb-4">
            <h6 class="card-header">Edit</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo form_open('Exe_Work_Progress/edit/'.$req['id']); ?>

					<div class="row clearfix">
                        <div class="col-md-6">
                            <label for="prj_id" class="form-label"><span class="text-danger">*</span>Project</label>
                            <div class="form-group">
								<select name="prj_id" class="form-control">
                                    <option value="">Select </option>
                                    <?php foreach($projects as $t) {?>
                                        <option value="<?php echo $t['id']?>" <?php echo (($this->input->post('prj_id') ? ($this->input->post('prj_id') == $t['id']) : $t['id'] == $req['prj_id'])) ? 'selected="selected"' : "" ?> ><?php echo $t['name']?></option>
                                    <?php }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('prj_id');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="date" class="form-label"><span class="text-danger">*</span>Date</label>
							<div class="form-group">
                            <input type="text" name="date" value="<?php echo ($this->input->post('date') ? $this->input->post('date') : $req['date']); ?>" class="form-control" id="type" />
								<span class="text-danger"><?php echo form_error('date');?></span>
							</div>
						</div>
                        <div class="col-md-6">
                            <label for="trade_id" class="form-label"><span class="text-danger">*</span>Trade</label>
                            <div class="form-group">
								<select name="trade_id" class="form-control">
                                    <option value="">Select </option>
                                    <?php foreach($trades as $t) {?>
                                        <option value="<?php echo $t['id']?>" <?php echo  (($this->input->post('trade_id') ? ($this->input->post('trade_id') == $t['id']) : $t['id'] == $req['trade_id'])) ? 'selected="selected"' : "";?> ><?php echo $t['trade_name']?></option>
                                    <?php }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('trade_id');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
                            <label for="area_id" class="form-label"><span class="text-danger">*</span>Area</label>
                            <div class='form-group'>
                                <select class="form-control" name="area_id" >
                                    <option value=''>select name</option>
                                    <?php foreach($areas as $row) {?>
                                    <option value='<?php echo $row['id']?>'<?php echo (($this->input->post('area_id') ? ($this->input->post('area_id') == $row['id']) : $row['id'] == $req['area_id'])) ? 'selected="selected"' : ""  ?>><?php echo $row['id']." - ".$row['area']?></option>
                                    <?php }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('area_id');?></span>
                            </div>
                        </div>
						<div class="col-md-6">
							<label for="work_description" class="form-label"><span class="text-danger">*</span>Work Description</label>
							<div class="form-group">
                            <input type="text" name="work_description" value="<?php echo ($this->input->post('work_description') ? $this->input->post('work_description') : $req['work_description']); ?>" class="form-control" id="type" />
								<span class="text-danger"><?php echo form_error('work_description');?></span>
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