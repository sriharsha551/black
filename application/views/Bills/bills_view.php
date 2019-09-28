
<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb;?>
	<?php 
		$GLOBALS['supplier_id'] = null;
		$selected = null;
		foreach($suppliers as $supplier)
		{
			if($supplier->id == $bills['sup_id'])
			{
				$selected = $supplier;
			}
		}
		if(isset($_POST['supp_id']))
		{
			$GLOBALS['supplier_id'] = $_POST['supp_id'];
			foreach($suppliers as $supplier){
				if($supplier->id == $GLOBALS['supplier_id']){
					$selected = $supplier;
					$_SESSION['edit_error'] = false;
				}
			}
		}
	?>
</h4>
<div class="card mb-4">
            <h6 class="card-header">Edit</h6>
			<div class="card-body"> 
				<div class="box-body"> 
				<form action="" method="post">
				<div class="row clearfix">
				<div class="col-md-6">
				<label for="sup_id" class="form-label"><span class="text-danger">*</span>Supplier Id</label>
				<div class="form-group">
				<select class="form-control" name="supp_id" onchange = "this.form.submit();" disabled>
						<?php foreach($suppliers as $row) {?>
  							<option value='<?php echo $row->id?>' <?php echo ($row->id == $selected->id) ? 'selected="selected"' : "" ?> ><?php echo $row->id.' - ' .$row->name?></option>
						<?php }?>
				</select>
				</div>
				</div>
				</div>
				</form>
            		<!-- <?php echo form_open('Bills/edit/'.$bills['id']); ?> -->
					<div class="row clearfix">
						<div class="col-md-6" style = "display:none">
						<label for="sup_id" class="form-label"><span class="text-danger">*</span>Supplier Id</label>
						<div class='form-group'>
						<input type="hidden" name="sup_id" value="<?php echo $selected->id ? $selected->id : $bills['sup_id']; ?>" class="form-control" id="sup_id" />
						</div>
						</div>
                        <div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Supplier Name</label>
							<div class="form-group">
								<input type="text" name="sup_name" value="<?php echo $selected->name ? $selected->name : $bills['sup_name']; ?>" class="form-control" id="sup_name" disabled/>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="attach_link" class="form-label"><span class="text-danger">*</span>Supplier Email</label>
							<div class="form-group">
								<input type="text" name="sup_email" value="<?php echo $selected->email_id ? $selected->email_id : $bills['sup_email']; ?>" class="form-control" id="sup_email" disabled/>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Supplier Phone</label>
							<div class="form-group">
								<input type="text" name="sup_phone" value="<?php echo $selected->contact_no_1 ? $selected->contact_no_1 : $bills['sup_phone']; ?>" class="form-control" id="sup_phone" disabled/>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Supplier Address</label>
							<div class="form-group">
								<input type="text" name="sup_address" value="<?php echo $selected->address ? $selected->address : $bills['sup_address']; ?>" class="form-control" id="sup_address" disabled/>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Bill Number</label>
							<div class="form-group">
								<input type="text" name="bill_num" value="<?php echo ($this->input->post('bill_num') ? $this->input->post('bill_num') : $bills['bill_num']); ?>" class="form-control" id="bill_num" disabled/>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Order Number</label>
							<div class="form-group">
							<select class="form-control" name="order_num" disabled >
							<?php foreach($order_num as $row) {?>
  							<option value='<?php echo $row->id?>' <?php echo ($row->id == $bills['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->ponumber?></option>
							<?php }?>
							</select>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Bill Status</label>
							<div class="form-group">
							<select class="form-control" name="bill_status" disabled >
							<?php foreach($bill_status as $row) {?>
  							<option value='<?php echo $row->id?>' <?php echo ($row->id == $bills['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->name?></option>
							<?php }?>
							</select>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Bill Date</label>
							<div class="form-group">
								<input type="date" name="bill_date" value="<?php echo ($this->input->post('bill_date') ? $this->input->post('bill_date') : $bills['bill_date']); ?>" class="form-control" id="bill_date" disabled/>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Credit Days</label>
							<div class="form-group">
							<select class="form-control" name="cr_days_id" disabled >
							<?php foreach($credit as $row) {?>
  							<option value='<?php echo $row->id?>' <?php echo ($row->id == $bills['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->name?></option>
							<?php }?>
							</select>
							</div>
                        </div>
                        <!-- <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Bill Item</label>
							<div class="form-group">
								<input type="text" name="bill_item" value="<?php echo ($this->input->post('bill_item') ? $this->input->post('bill_item') : $bills['bill_item']); ?>" class="form-control" id="bill_item" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('bill_item');?></span>
							</div>
                        </div> -->
                        <!-- <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Quantity</label>
							<div class="form-group">
								<input type="text" name="qty" value="<?php echo ($this->input->post('qty') ? $this->input->post('qty') : $bills['qty']); ?>" class="form-control" id="qty" disabled/>
							</div>
                        </div> -->
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Unit Price</label>
							<div class="form-group">
								<input type="text" name="price" value="<?php echo ($this->input->post('price') ? $this->input->post('price') : $bills['price']); ?>" class="form-control" id="price" disabled/>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Tax</label>
							<div class="form-group">
							<select class="form-control" name="tax_id" disabled >
							<?php foreach($tax as $row) {?>
  							<option value='<?php echo $row->id?>' <?php echo ($row->id == $bills['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->name?></option>
							<?php }?>
							</select>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Tax Amount</label>
							<div class="form-group">
								<input type="text" name="tax_amt" value="<?php echo ($this->input->post('tax_amt') ? $this->input->post('tax_amt') : $bills['tax_amt']); ?>" class="form-control" id="tax_amt" disabled/>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Remarks</label>
							<div class="form-group">
								<input type="text" name="remarks" value="<?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $bills['remarks']); ?>" class="form-control" id="remarks" disabled/>
							</div>
                        </div>
					</div>
					
					<div class="box-footer">
						<button type="submit" class="btn btn-success" onclick="window.location.href='<?php echo base_url('Bills/edit/').$bills['id']?>'">
							<i class="fa fa-check"></i> Edit
						</button>
					</div>
            		<!-- <?php echo form_close(); ?> -->
      			</div>
    </div>
</div>
</div>
