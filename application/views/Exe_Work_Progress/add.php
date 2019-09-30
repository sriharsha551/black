<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb;?>
		</h4>
    
		<div class="card mb-4">
            <h6 class="card-header">ADD</h6>
            <div class="card-body"> 
				<div class="box-body">
            		<?php echo form_open('Exe_Work_Progress/add'); ?>
					<div class="row clearfix">
                        <div class="col-md-6" >
                            <label for="prj_id" class="form-label"><span class="text-danger">*</span>Project Id</label>
                            <div class='form-group'>
                                <select class="form-control" name="prj_id" >
                                    <option value=''>select name</option>
                                    <?php foreach($projects as $row) {?>
                                    <option value='<?php echo $row['id']?>'><?php echo $row['id']." - ".$row['name']?></option>
                                    <?php }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('prj_id');?></span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
							<label for="date" class="form-label"><span class="text-danger">*</span>Date</label>
							<div class="form-group">
								<input type="date" name="date" value="<?php echo ($this->input->post('date')); ?>" class="form-control" id="date" />
								<span class="text-danger"><?php echo form_error('date');?></span>
							</div>
                        </div>

                        <div class="col-md-6">
                            <label for="trade_id" class="form-label"><span class="text-danger">*</span>Trades</label>
                            <div class='form-group'>
                                <select class="form-control" name="trade_id" >
                                    <option value=''>select name</option>
                                    <?php foreach($trades as $row) {?>
                                    <option value='<?php echo $row['id']?>'><?php echo $row['id']." - ".$row['trade_name']?></option>
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
                                    <option value='<?php echo $row['id']?>'><?php echo $row['id']." - ".$row['area']?></option>
                                    <?php }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('area_id');?></span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
							<label for="work_description" class="form-label"><span class="text-danger">*</span>Work Description</label>
							<div class="form-group">
								<input type="text" name="work_description" value="<?php echo ($this->input->post('work_description')); ?>" class="form-control" id="work_description" />
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
	</div>
