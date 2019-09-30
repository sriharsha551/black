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
            		<?php echo form_open('Exe_Mtrl_Request/add'); ?>
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
                            <label for="mtrl_id" class="form-label"><span class="text-danger">*</span>Material</label>
                            <div class='form-group'>
                                <select class="form-control" name="mtrl_id" >
                                    <option value=''>select name</option>
                                    <?php foreach($materials as $row) {?>
                                    <option value='<?php echo $row['id']?>'><?php echo $row['id']." - ".$row['material_name']?></option>
                                    <?php }?>
                                </select>
                                
                                <span class="text-danger"><?php echo form_error('mtrl_id');?></span>
                            </div>
                        </div>

                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Quantity</label>
							<div class="form-group">
								<input type="number" name="qty" value="<?php echo ($this->input->post('qty')); ?>" class="form-control" id="qty" />
								<span class="text-danger"><?php echo form_error('qty');?></span>
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
