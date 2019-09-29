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
            		<?php echo  form_open_multipart('Transaction/edit/'.$tran_list['id']); ?>
                    <div class="row clearfix">
						<div class="col-md-6">
                                <label for="date_transaction" class="form-label"><span class="text-danger">*</span>Date of transaction</label>
								<div class="form-group">
								<input type="date" name="date_transaction" value="<?php echo $this->input->post('date_transaction')?$this->input->post('date_transaction') : $tran_list['date_transaction']; ?>" class="form-control" id="date_transaction" />
								<span class="text-danger"><?php echo form_error('date_transaction');?></span>
								
				    </div>
					</div>

                 <div class="col-md-6">
                             
							 <label for="coa_id" class="col-md-6"><span class="text-danger">*</span>Chart of Accounts name</label>
							 <div class="form-group">
							<select name="coa_id" class="form-control" id="coa_id"  required>
							 <option value="">Select coa</option>
							 <?php foreach ($coa_list as $coa) { ?>
							 <option value="<?php echo $coa['id']; ?>" <?php echo ($tran_list['coa_id'] == $coa['id']) ? 'selected="selected"' : ""; ?> ><?php echo $coa['name']; ?></option>
							 <?php } ?>
						 </select>
						 <span class="text-danger"><?php echo form_error('coa_id');?></span>


				  </div>
				  </div>
				  <div class="col-md-6">
                             
							 <label for="prj_id" class="col-md-6"><span class="text-danger">*</span>Project</label>
								 <div class="form-group">
									 <select name="prj_id" class="form-control" id="prj_id"  required>
														 <option value="">Select Project</option>
														 <?php foreach ($prj_list as $prj) { ?>
														 <option value="<?php echo $prj['id']; ?>" <?php echo ($this->input->post('prj_id') == $prj['id'] || $tran_list['prj_id'] == $prj['id'] ) ? 'selected="selected"' : ""; ?> ><?						php echo $prj['name']; ?></option>
														 <?php } ?>
													</select> 
								  </div>
						 </div>
				  <div class="col-md-6">
                             
							 <label for="inv_id" class="col-md-6"><span class="text-danger">*</span>Invoice name</label>
							 <div class="form-group">
							<select name="inv_id" class="form-control" id="inv_id"  required>
							 <option value="">Select invoice</option>
							 <?php foreach ($inv_list as $coa) { ?>
							 <option value="<?php echo $coa['id']; ?>" <?php echo ($tran_list['inv_id'] == $coa['id']) ? 'selected="selected"' : ""; ?> ><?php echo $coa['customer_name']; ?></option>
							 <?php } ?>
						 </select>
						 <span class="text-danger"><?php echo form_error('inv_id');?></span>


				  </div>
				  </div>

				  <div class="col-md-6">
                             
							 <label for="bill_id" class="col-md-6"><span class="text-danger">*</span>Bill name</label>
							 <div class="form-group">
							<select name="bill_id" class="form-control" id="bill_id"  required>
							 <option value="">Select invoice</option>
							 <?php foreach ($bill_list as $coa) { ?>
							 <option value="<?php echo $coa['id']; ?>" <?php echo ($tran_list['bill_id'] == $coa['id']) ? 'selected="selected"' : ""; ?> ><?php echo $coa['sup_name']; ?></option>
							 <?php } ?>
						 </select>
						 <span class="text-danger"><?php echo form_error('inv_id');?></span>


				  </div>
				  </div> 
		



			
				  <div class="col-md-6">
					 
                                <label for="purpose" class="form-label"><span class="text-danger">*</span>Purpose</label>
								<div class="form-group">
								<input type="text" name="purpose" value="<?php echo $this->input->post('purpose')?$this->input->post('purpose') : $tran_list['purpose']; ?>" class="form-control" id="purpose" />
								<span class="text-danger"><?php echo form_error('purpose');?></span>
				       </div>
					   </div>
					   <div class="col-md-6">         
								<label for="available_amt" class="form-label"><span class="text-danger">*</span>Available amount</label>
								<div class="form-group">
								<input type="text" name="available_amt" value="<?php echo $this->input->post('available_amt')?$this->input->post('available_amt') : $tran_list['available_amt']; ?>" class="form-control" id="available_amt" />
								<span class="text-danger"><?php echo form_error('available_amt');?></span>
					 </div>
					 </div>
					 <div class="col-md-6">
                                <label for="remarks" class="form-label"><span class="text-danger">*</span>Remarks</label>
							<div class="form-group">		
								<input type="textarea" name="remarks" value="<?php echo $this->input->post('remarks')?$this->input->post('remarks') : $tran_list['remarks']; ?>" class="form-control" id="remarks" />
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
	</div>

