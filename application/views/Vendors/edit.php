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
            		<?php echo  form_open_multipart('Vendors/edit/'.$vendors['id']); ?>
                    <div class="row clearfix">
                 <div class="col-md-6">
                             
							 <label for="tool_id" class="col-md-6"><span class="text-danger">*</span>Machinary Name</label>
							 <div class="form-group">
							<select name="tool_id" class="form-control" id="tool_id"  required>
							 <option value="">Select tools</option>
							 <?php foreach ($machinary as $coa) { ?>
							 <option value="<?php echo $coa['id']; ?>" <?php echo ($vendors['tool_id'] == $coa['id']) ? 'selected="selected"' : ""; ?> ><?php echo $coa['tool_name']; ?></option>
							 <?php } ?>
						 </select>
						 <span class="text-danger"><?php echo form_error('tool_id');?></span>
				  </div>
				  </div>	

			 <div class="col-md-6">
					 
                                <label for="vendor_name" class="form-label"><span class="text-danger">*</span>Vendor Name</label>
								<div class="form-group">
								<input type="text" name="vendor_name" value="<?php echo $this->input->post('vendor_name')?$this->input->post('vendor_name') : $vendors['vendor_name']; ?>" class="form-control" id="vendor_name" />
								<span class="text-danger"><?php echo form_error('vendor_name');?></span>
				       </div>
					   </div>
					   <div class="col-md-6">         
								<label for="vendor_email" class="form-label"><span class="text-danger">*</span>Vendor Email</label>
								<div class="form-group">
								<input type="text" name="vendor_email" value="<?php echo $this->input->post('vendor_email')?$this->input->post('vendor_email') : $vendors['vendor_email']; ?>" class="form-control" id="vendor_email" />
								<span class="text-danger"><?php echo form_error('vendor_email');?></span>
					 </div>
					 </div>
					
                       
                     <div class="col-md-6">
                                <label for="vendor_phone" class="form-label"><span class="text-danger">*</span>Vendor Phone</label>
							<div class="form-group">		
								<input type="textarea" name="vendor_phone" value="<?php echo $this->input->post('vendor_phone')?$this->input->post('vendor_phone') : $vendors['vendor_phone']; ?>" class="form-control" id="vendor_phone" />
								<span class="text-danger"><?php echo form_error('vendor_phone');?></span>
		                    </div>
                            </div>

                                 <div class="col-md-6">
                                <label for="vendor_address" class="form-label"><span class="text-danger">*</span>Vendors Address</label>
							<div class="form-group">		
								<input type="textarea" name="vendor_address" value="<?php echo $this->input->post('vendor_address')?$this->input->post('vendor_address') : $vendors['vendor_address']; ?>" class="form-control" id="vendor_address" />
								<span class="text-danger"><?php echo form_error('vendor_address');?></span>
		                    </div>
                            </div>
 
                             <div class="col-md-6">
                                <label for="units" class="form-label"><span class="text-danger">*</span>Units</label>
							<div class="form-group">		
								<input type="textarea" name="units" value="<?php echo $this->input->post('units')?$this->input->post('units') : $vendors['units']; ?>" class="form-control" id="units" />
								<span class="text-danger"><?php echo form_error('units');?></span>
		                    </div>
                            </div> 
                            	 <div class="col-md-6">
                                <label for="price" class="form-label"><span class="text-danger">*</span>Price</label>
							<div class="form-group">		
								<input type="textarea" name="price" value="<?php echo $this->input->post('price')?$this->input->post('price') : $vendors['price']; ?>" class="form-control" id="price" />
								<span class="text-danger"><?php echo form_error('price');?></span>
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

