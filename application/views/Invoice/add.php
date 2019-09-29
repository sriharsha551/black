
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
				if(isset($_POST['supp_id']))
					{
						$GLOBALS['Customer_id'] = $_POST['supp_id'];
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
					<label for="supp_id" class="form-label"><span class="text-danger">*</span>Customer Id</label>
					<div class='form-group'>
						<select class="form-control" name="supp_id" onchange="this.form.submit();">
							<option value=''>select name</option>
							<?php foreach($Customers as $row) {?>
							<option value='<?php echo $row->id?>' <?php echo ($row->id == $GLOBALS['Customer_id']) ? 'selected="selected"' : "" ?> ><?php echo $row->id." - ".$row->name?></option>
							<?php }?>
						</select>		
						<span class="text-danger"><?php echo form_error('supp_id');?></span>
					</div>
				</div>
				</div>
				</form>
            		<?php echo form_open('Invoice/add'); ?>
					<div class="row clearfix">
					<div class="col-md-6" style="display:none">
					<label for="prj_id" class="form-label"><span class="text-danger">*</span>Customer Id</label>
					<div class='form-group'>
						<input type="hidden" name="cut_id" value="<?php if(isset($selected)){echo $selected->id;} ?>" class="form-control" id="cut_id" />
						<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('cut_id');?></span>
					</div>
				</div>
                        <div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Customer Name</label>
							<div class="form-group">
								<input type="text" name="cut_name" value="<?php if(isset($selected)){echo $selected->name;} ?>" class="form-control" id="cut_name" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('cut_name');?></span>
							</div>
						</div>
						<div class="col-md-6">
                        	<label for="prj_id" class="col-md-6"><span class="text-danger">*</span>Project</label>
								<div class="form-group">
									<select name="prj_id" class="form-control" id="prj_id"  required>
                                		<option value="">Select Project</option>
                                		<?php foreach ($prj_list as $prj) { ?>
                                		<option value="<?php echo $prj['id']; ?>" <?php echo (($this->input->post('prj_id') == $prj['id'])) ? 'selected="selected"' : ""; ?> ><?php echo $prj['name']; ?></option>
                                		<?php } ?>
                           			</select> 
		 						</div>
						</div>
                        <div class="col-md-6">
							<label for="attach_link" class="form-label"><span class="text-danger">*</span>Customer Email</label>
							<div class="form-group">
								<input type="text" name="cut_email" value="<?php if(isset($selected))echo $selected->email_id; ?>" class="form-control" id="cut_email" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('cut_email');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Customer Phone</label>
							<div class="form-group">
								<input type="text" name="cut_phone" value="<?php if(isset($selected))echo $selected->contact_no_1; ?>" class="form-control" id="cut_phone" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('cut_phone');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Customer Address</label>
							<div class="form-group">
								<input type="text" name="cut_address" value="<?php if(isset($selected))echo $selected->address; ?>" class="form-control" id="cut_address" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('cut_address');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>invoice Number</label>
							<div class="form-group">
								<input type="text" name="inv_num" value="<?php echo $this->input->post('inv_num'); ?>" class="form-control" id="inv_num" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('inv_num');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Order Number</label>
							<div class="form-group">
								<input type="text" name="order_num" value="<?php echo $this->input->post('order_num'); ?>" class="form-control" id="order_num" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('order_num');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Invoice Status</label>
							<div class="form-group">
								<input type="text" name="inv_status" value="<?php echo $this->input->post('inv_status'); ?>" class="form-control" id="inv_status" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('inv_status');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Invoice Date</label>
							<div class="form-group">
								<input type="date" name="inv_dt" value="<?php echo $this->input->post('inv_dt'); ?>" class="form-control" id="inv_dt" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('inv_dt');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Credit Days id</label>
							<div class="form-group">
								<input type="text" name="cr_days_id" value="<?php echo $this->input->post('cr_days_id'); ?>" class="form-control" id="cr_days_id" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('cr_days_id');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Invoice Item</label>
							<div class="form-group">
								<input type="text" name="invoice_item" value="<?php echo $this->input->post('invoice_item'); ?>" class="form-control" id="invoice_item" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('invoice_item');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Quantity</label>
							<div class="form-group">
								<input type="text" name="qty" value="<?php echo $this->input->post('qty'); ?>" class="form-control" id="qty" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('qty');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Price</label>
							<div class="form-group">
								<input type="text" name="price" value="<?php echo $this->input->post('price'); ?>" class="form-control" id="price" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('price');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Tax</label>
							<div class="form-group">
								<input type="text" name="tax_id" value="<?php echo $this->input->post('tax_id'); ?>" class="form-control" id="tax_id" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('tax_id');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Tax Amount</label>
							<div class="form-group">
								<input type="text" name="tax_amt" value="<?php echo $this->input->post('tax_amt'); ?>" class="form-control" id="tax_amt" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('tax_amt');?></span>
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



							