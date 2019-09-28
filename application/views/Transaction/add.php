
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
            		<?php echo form_open_multipart('Transaction/add'); ?>
                   	<div class="row clearfix">
					<div class="col-md-6">
                                <label for="date_transaction" class="col-md-6"><span class="text-danger">*</span>Date of transaction</label>
			
								<input type="date" name="date_transaction" value="<?php echo $this->input->post('date_transaction'); ?>" class="form-control" id="date_transaction" />
								<span class="text-danger"><?php echo form_error('date_transaction');?></span>
								

					</div>
					<div class="col-md-6">
                             
								<label for="coa_id" class="col-md-6"><span class="text-danger">*</span>Chart of Accounts name</label>
								<div class="form-group">
							   <select name="coa_id" class="form-control" id="coa_id"  required>
                                <option value="">Select coa</option>
                                <?php foreach ($coa_list as $coa) { ?>
                                <option value="<?php echo $coa['id']; ?>" <?php echo ($this->input->post('coa_id') == $coa['id']) ? 'selected="selected"' : ""; ?> ><?php echo $coa['name']; ?></option>
                                <?php } ?>
                            </select>

					 </div>
					 </div>
				     	        <div class="col-md-6">
                                <label for="purpose" class="form-group"><span class="text-danger">*</span>Purpose</label>
								<div class='form-group'>
								<input type="text" name="purpose" value="<?php echo $this->input->post('purpose'); ?>" class="form-control" id="purpose" />
								<span class="text-danger"><?php echo form_error('purpose');?></span>
							    </div>
								</div>
	
								<div class="col-md-6">
                                <label for="payment_amt" class="form-group"><span class="text-danger">*</span>Payment amount</label>
								 <div class='form-group'>
								<input type="text" name="payment_amt" value="<?php echo $this->input->post('payment_amt'); ?>" class="form-control" id="payment_amt" />
								<span class="text-danger"><?php echo form_error('payment_amt');?></span>
				                 </div>
								 </div>


								 <div class="col-md-6">
                                <label for="remarks" class="col-md-6"><span class="text-danger">*</span>Remarks</label>
								<div class="form-group">
								<input type="textarea" name="remarks" value="<?php echo $this->input->post('remarks'); ?>" class="form-control" id="remarks" />
								<span class="text-danger"><?php echo form_error('remarks');?></span>
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


<!-- / Content -->
