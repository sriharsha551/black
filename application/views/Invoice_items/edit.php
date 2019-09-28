
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
            <h6 class="card-header">EDIT</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo  form_open('Invoice_items/edit/'.$inv['id']); ?>
                    <div class="row clearfix">
						<div class="col-md-6">
							<div class="form-group">
                                <label for="item_name" class="form-label"><span class="text-danger">*</span>ITEM NAME</label>
								<input type="text" name="item_name" value="<?php echo $this->input->post('item_name')?  $this->input->post('item_name') : $inv['item_name'];; ?>" class="form-control" id="item_name" />
								<span class="text-danger"><?php echo form_error('item_name');?></span>
					
					</div>
					<div class="form-group">
                                <label for="price" class="form-label"><span class="text-danger">*</span>PRICE</label>
								<input type="text" name="price" value="<?php echo $this->input->post('price')?  $this->input->post('price') : $inv['price'];; ?>" class="form-control" id="price" />
								<span class="text-danger"><?php echo form_error('price');?></span>
					
					</div>
					<div class="form-group">
                                <label for="quality" class="form-label"><span class="text-danger">*</span>QUALITY</label>
								<input type="text" name="quality" value="<?php echo $this->input->post('quality')?  $this->input->post('quality') : $inv['quality'];; ?>" class="form-control" id="quality" />
								<span class="text-danger"><?php echo form_error('quality');?></span>
					
					</div>
                		<div class="box-footer">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Sav	</button>
					</div>
            		<?php echo form_close(); ?>
      			</div>
        
     		</div>
		</div>    
	</div>
<!-- / Content -->
