<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb;?>
	<?php 
		$GLOBALS['customer_id'] = null;
		$selected = null;
		foreach($Customers as $customer)
		{
			if($customer->id == $invoices['customer_id'])
			{
				$selected = $customer;
			}
		}
		if(isset($_POST['supp_id']))
		{
			$GLOBALS['customer_id'] = $_POST['supp_id'];
			foreach($Customers as $customer){
				if($customer->id == $GLOBALS['customer_id']){
					$selected = $customer;
					$_SESSION['edit_error'] = false;
				}
			}
		}
	?>
</h4>
<div class="card mb-4">
            <h6 class="card-header">Invoice</h6>
			<div class="card-body"> 
				<div class="box-body"> 
				<form action="" method="post">
				<div class="row clearfix">
				<div class="col-md-6">
				<label for="customer_id" class="form-label"><span class="text-danger">*</span>Customer Id</label>
				<div class="form-group">
				<select class="form-control" name="supp_id" onchange = "this.form.submit() ;"disabled >
						<?php foreach($Customers as $row) {?>
  							<option value='<?php echo $row->id?>' <?php echo ($row->id == $selected->id) ? 'selected="selected"' : "" ?> ><?php echo $row->id.' - ' .$row->name?></option>
						<?php }?>
				</select>
				</div>
				</div>
				</div>
				</form>
            		<!-- <?php echo form_open('Invoice/invoice_view/'.$invoices['id']); ?> -->
					<div class="row clearfix">
						<div class="col-md-6" style = "display:none">
						<label for="customer_id" class="form-label"><span class="text-danger">*</span>Customer Id</label>
						<div class='form-group'>
						<input type="hidden" name="customer_id" value="<?php echo $selected->id ? $selected->id : $invoices['customer_id']; ?>" class="form-control" id="customer_id"  disabled
						 />
						</div>
						</div>
                        <div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Customer Name</label>
							<div class="form-group">
								<input type="text" name="customer_name" value="<?php echo $selected->name ? $selected->name : $invoices['customer_name']; ?>" class="form-control" id="customer_name" disabled />
							</div>
						</div>
                        <div class="col-md-6">
							<label for="attach_link" class="form-label"><span class="text-danger">*</span>Customer Email</label>
							<div class="form-group">
								<input type="text" name="customer_email" value="<?php echo $selected->email ? $selected->email : $invoices['customer_email']; ?>" class="form-control" id="customer_email" disabled />
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Customer Phone</label>
							<div class="form-group">
								<input type="text" name="customer_phone" value="<?php echo $selected->phone ? $selected->phone : $invoices['customer_phone']; ?>" class="form-control" id="customer_phone" disabled />
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Customer Address</label>
							<div class="form-group">
								<input type="text" name="customer_address" value="<?php echo $selected->address ? $selected->address : $invoices['customer_address']; ?>" class="form-control" id="customer_address" disabled/>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Invoice Number</label>
							<div class="form-group">
								<input type="text" name="invoice_num" value="<?php echo ($this->input->post('invoice_num') ? $this->input->post('invoice_num') : $invoices['invoice_num']); ?>" class="form-control" id="invoice_num" disabled />
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Order Number</label>
							<div class="form-group">
							<select class="form-control" name="order_num" disabled >
							<?php foreach($order_num as $row) {?>
  							<option value='<?php echo $row->id?>' <?php echo ($row->id == $invoices['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->ponumber?></option>
							<?php }?>
							</select>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Invoice Status</label>
							<div class="form-group">
							<select class="form-control" name="invoice_status" disabled >
							<?php foreach($invoice_status as $row) {?>
  							<option value='<?php echo $row->id?>' <?php echo ($row->id == $invoices['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->name?></option>
							<?php }?>
							</select>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Invoice Date</label>
							<div class="form-group">
								<input type="text" name="invoice_date" value="<?php echo ($this->input->post('invoice_date') ? $this->input->post('invoice_date') : $invoices['invoice_date']); ?>" class="form-control" id="invoice_date" disabled />
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Credit Days id</label>
							<div class="form-group">
							<select class="form-control" name="cr_days_id" disabled >
							<?php foreach($credit as $row) {?>
  							<option value='<?php echo $row->id?>' <?php echo ($row->id == $invoices['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->name?></option>
							<?php }?>
							</select>
							</div>
                        </div>
                        
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Invoice Item</label>
							<div class="form-group">
							<select class="form-control" name="invoice_item" disabled >
							<?php foreach($invoice_item as $row) {?>
  							<option value='<?php echo $row->id?>' <?php echo ($row->id == $invoices['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->item_name?></option>
							<?php }?>
							</select>
							</div>
                        </div>

                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Quantity</label>
							<div class="form-group">
								<input type="text" name="quantity" value="<?php echo ($this->input->post('quantity') ? $this->input->post('quantity') : $invoices['quantity']); ?>" class="form-control" id="quantity" disabled />
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Price</label>
							<div class="form-group">
								<input type="text" name="price" value="<?php echo ($this->input->post('price') ? $this->input->post('price') : $invoices['price']); ?>" class="form-control" id="price" disabled />
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Tax</label>
							<div class="form-group">
							<select class="form-control" name="tax_id" disabled >
							<?php foreach($tax as $row) {?>
  							<option value='<?php echo $row->id?>' <?php echo ($row->id == $invoices['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->name?></option>
							<?php }?>
							</select>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Tax Amount</label>
							<div class="form-group">
								<input type="text" name="tax_amount" value="<?php echo ($this->input->post('tax_amount') ? $this->input->post('tax_amount') : $invoices['tax_amount']); ?>" class="form-control" id="tax_amount" disabled />
							</div>
                        </div>
						<div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Total Amount</label>
							<div class="form-group">
								<input type="text" name="total_amount" value="<?php echo ($this->input->post('total_amount') ? $this->input->post('total_amount') : $invoices['total_amount']); ?>" class="form-control" id="total_amount" disabled />
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Remarks</label>
							<div class="form-group">
								<input type="text" name="remarks" value="<?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $invoices['remarks']); ?>" class="form-control" id="remarks" disabled/>
							</div>
                        </div>
					</div>
					
					<div class="box-footer">
						<button type="submit" class="btn btn-success" onclick="window.location.href='<?php echo base_url('Invoice/edit/').$invoices['id']?>'">
							<i class="fa fa-check"></i> Edit
						</button>
					</div>
            		<!-- <?php echo form_close(); ?> -->
      			</div>
    </div>
</div>
</div>
