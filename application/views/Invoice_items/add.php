
<!-- Content -->
<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>
    
		<div class="card mb-4">
            <h6 class="card-header">ADD</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo form_open('Invoice_items/add'); ?>
                   	<div class="row clearfix">
                   
					<div class="col-md-6">
                                <label for="item_name" class="form-label"><span class="text-danger">*</span>Item Name</label>
								<div class="form-group">
								<input type="text" name="item_name" value="<?php echo $this->input->post('item_name'); ?>" class="form-control" id="item_name" />
								<span class="text-danger"><?php echo form_error('item_name');?></span>
					
					</div>
					</div>
					
					<div class="col-md-6">
                                <label for="price" class="form-label"><span class="text-danger">*</span>Price</label>
								<div class="form-group ">
								<input type="text" name="price" value="<?php echo $this->input->post('price'); ?>" class="form-control" id="price" />
								<span class="text-danger"><?php echo form_error('price');?></span>
					
					</div>
					</div>
					<div class="col-md-6">
                                <label for="quality" class="form-label"><span class="text-danger">*</span>Quantity</label>
								<div class="form-group">
								<input type="text" name="quality" value="<?php echo $this->input->post('quality'); ?>" class="form-control" id="quality" />
								<span class="text-danger"><?php echo form_error('quality');?></span>
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
