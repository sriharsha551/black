
<!-- Content -->
<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb;?>
			<?php 
				$GLOBALS['Customer_id'] = null;
				$selected = null;
				if(isset($_POST['customer_id']))
					{
						$GLOBALS['Customer_id'] = $_POST['customer_id'];
						foreach($Customers as $Customer){
							if($Customer->id == $GLOBALS['Customer_id']){
								$selected = $Customer;
								$_SESSION['error'] = false;
							}
						}
					} 
			?>
		</h4>
    
		<div class="card mb-4">
            <h6 class="card-header">ADD</h6>
			<div class="card-body"> 
				<div class="box-body">
				<form action="" method="post" name="supp_form">
				<div class="row clearfix"> 
				<div class="col-md-6">
					<label for="customer_id" class="form-label"><span class="text-danger">*</span>Customer Id</label>
					<div class='form-group'>
						<select class="form-control" name="customer_id"  onchange="this.form.submit();">
							<option value=''>select name</option>
							<?php foreach($Customers as $row) {?>
							<option value='<?php echo $row->id?>' <?php echo ($row->id == $GLOBALS['Customer_id']) ? 'selected="selected"' : "" ?> ><?php echo $row->id." - ".$row->name?></option>
							<?php }?>
						</select>		
						<span class="text-danger"><?php echo form_error('customer_id');?></span>
					</div>
				</div>
				</div>
				</form>
            		<?php echo form_open('Invoice/add'); ?>
					<div class="row clearfix">
					<div class="col-md-6" style="display:none">
					<label for="prj_id" class="form-label"><span class="text-danger">*</span>Customer Id</label>
					<div class='form-group'>
						<input type="hidden" name="customer_id" value="<?php if(isset($selected)){echo $selected->id;} ?>" class="form-control" id="customer_id" />
						<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('customer_id');?></span>
					</div>
				</div>
                        <div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Customer Name</label>
							<div class="form-group">
								<input type="text" name="customer_name" value="<?php if(isset($selected)){echo $selected->name;} ?>" class="form-control" id="customer_name" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('customer_name');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="attach_link" class="form-label"><span class="text-danger">*</span>Customer Email</label>
							<div class="form-group">
								<input type="text" name="customer_email" value="<?php if(isset($selected))echo $selected->email; ?>" class="form-control" id="customer_email" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('customer_email');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Customer Phone</label>
							<div class="form-group">
								<input type="text" name="customer_phone" value="<?php if(isset($selected))echo $selected->phone; ?>" class="form-control" id="customer_phone" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('customer_phone');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Customer Address</label>
							<div class="form-group">
								<input type="text" name="customer_address" value="<?php if(isset($selected))echo $selected->address; ?>" class="form-control" id="customer_address" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('customer_address');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Invoice Number</label>
							<div class="form-group">
								<input type="text" name="invoice_num" value="<?php echo $this->input->post('invoice_num'); ?>" class="form-control" id="invoice_num" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('invoice_num');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Order Number</label>
							<div class="form-group">
							<select class="form-control" name="order_num" required>
							<option value=''>Select Name</option>
							<?php foreach($order_num as $row) {?>
								<option value="<?php echo $row->id;?>" <?php echo $this->input->post('order_num') == $row->id? 'selected="selected"' : ""; ?>>
										<?php echo $row->ponumber;?>
									</option>
								
							<?php }?>
							</select>
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('order_num');?></span>
							</div>
                        </div>
						<div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Invoice Status</label>
							<div class="form-group">
							<select class="form-control" name="invoice_status" required>
							<option value=''>select name</option>
							<?php foreach($inv_status as $row) {?>
							  <option value="<?php echo $row->id;?>" <?php echo $this->input->post('invoice_status') == $row->id? 'selected="selected"' : ""; ?>>
										<?php echo $row->name;?>
									</option>
							<?php }?>
							</select>
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('invoice_status');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Invoice Date</label>
							<div class="form-group">
								<input type="date" name="invoice_date" value="<?php echo $this->input->post('invoice_date'); ?>" class="form-control" id="inv_dt" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('invoice_date');?></span>
							</div>
                        </div>
            
						<div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Credit Days</label>
							<div class="form-group">
							<select class="form-control" name="cr_days_id" required>
							<option value=''>select name</option>
							<?php foreach($credit as $row) {?>
  							<!-- <option value='<?php echo $row->id?>'><?php echo $row->name?></option> -->
							  <option value="<?php echo $row->id;?>" <?php echo $this->input->post('cr_days_id') == $row->id? 'selected="selected"' : ""; ?>>
										<?php echo $row->name;?>
									</option>
							<?php }?>
							</select>
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('cr_days_id');?></span>
							</div>
						</div>	
            

						<div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Invoice Item</label>
							<div class="form-group">
							<select class="form-control" name="invoice_item" required>
							<option value=''>select name</option>
							<?php foreach($invoice_item as $row) {?>
							  <option value="<?php echo $row->id;?>" <?php echo $this->input->post('invoice_item') == $row->id? 'selected="selected"' : ""; ?>>
										<?php echo $row->item_name;?>
									</option>
							<?php }?>
							</select>
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('invoice_item');?></span>
							</div>
                        </div>
 
                        <!-- <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Quantity</label>
							<div class="form-group">
								<input type="text" name="quantity" value="<?php echo $this->input->post('quantity'); ?>" class="form-control" id="quantity" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('quantity');?></span>
							</div>
                        </div> -->
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Unit Price</label>
							<div class="form-group">
								<input type="text" name="price" value="<?php echo $this->input->post('price'); ?>" class="form-control" id="price" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('price');?></span>
							</div>
                        </div>

						<div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Tax</label>
							<div class="form-group">
							<select class="form-control" name="tax_id" required>
							<option value=''>select name</option>
							<?php foreach($tax as $row) {?>
							  <option value="<?php echo $row->id;?>" <?php echo $this->input->post('tax_id') == $row->id? 'selected="selected"' : ""; ?>>
										<?php echo $row->name;?>
									</option>
							<?php }?>
							</select>
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('tax_id');?></span>
							</div>
                        </div>


                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Tax Amount</label>
							<div class="form-group">
								<input type="text" name="tax_amount" value="<?php echo $this->input->post('tax_amount'); ?>" class="form-control" id="tax_amount" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('tax_amount');?></span>
							</div>
                        </div>


						<div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Total Amount</label>
							<div class="form-group">
								<input type="text" name="total_amount" value="<?php echo $this->input->post('total_amount'); ?>" class="form-control" id="total_amount" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('total_amount');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Remarks</label>
							<div class="form-group">
								<input type="text" name="remarks" value="<?php echo $this->input->post('remarks'); ?>" class="form-control" id="remarks" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('remarks');?></span>
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



							