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
            		<?php echo form_open('Exe_Mtrl_Request/edit/'.$req['id']); ?>

					<div class="row clearfix">
                        <div class="col-md-6">
                            <label for="prj_id" class="form-label"><span class="text-danger">*</span>Project</label>
                            <div class="form-group">
								<select name="prj_id" class="form-control">
                                    <option value="">Select </option>
                                    <?php foreach($projects as $t) {?>
                                        <option value="<?php echo $t['id']?>" <?php echo ($req['prj_id'] == $t['id']) ? ' selected="selected"' : "";?> ><?php echo $t['name']?></option>
                                    <?php }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('prj_id');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
                            <label for="mtrl_id" class="form-label"><span class="text-danger">*</span>Material</label>
                            <div class="form-group">
								<select name="mtrl_id" class="form-control">
                                    <option value="">Select </option>
                                    <?php foreach($materials as $t) {?>
                                        <option value="<?php echo $t['id']?>" <?php echo ($req['mtrl_id'] == $t['id']) ? ' selected="selected"' : "";?> ><?php echo $t['material_name']?></option>
                                    <?php }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('mtrl_id');?></span>
							</div>
                        </div>
						<div class="col-md-6">
							<label for="qty" class="form-label"><span class="text-danger">*</span>Quantity</label>
							<div class="form-group">
                            <input type="number" name="qty" value="<?php echo ($this->input->post('qty') ? $this->input->post('qty') : $req['qty']); ?>" class="form-control" id="type" />
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