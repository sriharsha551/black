
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
            		<?php echo form_open('Invoice_payments/edit/'.$invoice['id']); ?>
					<div class="row clearfix">
						<div class="col-md-6">
						<label for="prj_id" class="form-label"><span class="text-danger">*</span>Invoice_Id</label>
						<div class='form-group'>
						<select class="form-control" name="inv_id" >
							        <?php foreach($inv_ids as $row) {?>
  							        <option value='<?php echo $row->id?>' <?php echo ($row->id == $invoice['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->invoice_num?></option>
							        <?php }?>
								</select>						
								<span class="text-danger"><?php echo form_error('inv_id');?></span>
						</div>
						</div>
                        <div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Coa Id</label>
							<div class="form-group">
							<select class="form-control" name="coa_id" >
							        <?php foreach($coa_ids as $row) {?>
  							        <option value='<?php echo $row->id?>' <?php echo ($row->id == $invoice['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->name?></option>
							        <?php }?>
								</select>	
								<span class="text-danger"><?php echo form_error('coa_id');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="attach_link" class="form-label"><span class="text-danger">*</span>Paid Date</label>
							<div class="form-group">
								<input type="text" name="paid_dt" value="<?php echo ($this->input->post('paid_dt') ? $this->input->post('paid_dt') : $invoice['paid_dt']); ?>" class="form-control" id="paid_dt" />
								<span class="text-danger"><?php echo form_error('paid_dt');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Amount</label>
							<div class="form-group">
								<input type="text" name="amount" value="<?php echo ($this->input->post('amount') ? $this->input->post('amount') : $invoice['amount']); ?>" class="form-control" id="amount" />
								<span class="text-danger"><?php echo form_error('amount');?></span>
							</div>
						</div>
						<div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Amount Recieved</label>
							<div class="form-group">
								<input type="text" name="amount_recieved" value="<?php echo ($this->input->post('amount_recieved') ? $this->input->post('amount_recieved') : $invoice['amount_recieved']); ?>" class="form-control" id="amount_recieved" />
								<span class="text-danger"><?php echo form_error('amount_recieved');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Description</label>
							<div class="form-group">
								<input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $invoice['description']); ?>" class="form-control" id="description" />
								<span class="text-danger"><?php echo form_error('description');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Pay Method</label>
							<div class="form-group">
							<select class="form-control" name="pay_method" >
							        <?php foreach($pay_ids as $row) {?>
  							        <option value='<?php echo $row->id?>' <?php echo ($row->id == $invoice['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->name?></option>
							        <?php }?>
								</select>
								<span class="text-danger"><?php echo form_error('pay_method');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Remarks</label>
							<div class="form-group">
								<input type="text" name="remarks" value="<?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $invoice['remarks']); ?>" class="form-control" id="remarks" />
								<span class="text-danger"><?php echo form_error('remarks');?></span>
							</div>
                        </div>
                        <!-- <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Transaction Type</label>
							<div class="form-group">
							<select class="form-control" name="tran_type_id" >
							        <?php foreach($tran_ids as $row) {?>
  							        <option value='<?php echo $row->id?>' <?php echo ($row->id == $invoice['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->name?></option>
							        <?php }?>
								</select>
								<span class="text-danger"><?php echo form_error('tran_type_id');?></span>
							</div>
                        </div>
					</div> -->
					
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
