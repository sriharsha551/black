
<!-- Content -->
<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb;?>
			<?php 
				$GLOBALS['supplier_id'] = null;
				$selected = null;
				if(isset($_POST['supp_id']))
					{
						$GLOBALS['supplier_id'] = $_POST['supp_id'];
						foreach($suppliers as $supplier){
							if($supplier->id == $GLOBALS['supplier_id']){
								$selected = $supplier;
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
					<label for="supp_id" class="form-label"><span class="text-danger">*</span>Supplier Id</label>
					<div class='form-group'>
						<select class="form-control" name="supp_id" onchange="this.form.submit();">
							<option value=''>select name</option>
							<?php foreach($suppliers as $row) {?>
							<option value='<?php echo $row->id?>' <?php echo ($row->id == $GLOBALS['supplier_id']) ? 'selected="selected"' : "" ?> ><?php echo $row->id." - ".$row->name?></option>
							<?php }?>
						</select>		
						<span class="text-danger"><?php echo form_error('supp_id');?></span>
					</div>
				</div>
				</div>
				</form>
            		<?php echo form_open('Bills/add'); ?>
					<div class="row clearfix">
					<div class="col-md-6" style="display:none">
					<label for="prj_id" class="form-label"><span class="text-danger">*</span>Supplier Id</label>
					<div class='form-group'>
						<input type="hidden" name="sup_id" value="<?php if(isset($selected)){echo $selected->id;} ?>" class="form-control" id="sup_id" />
						<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('sup_id');?></span>
					</div>
				</div>
                        <div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Supplier Name</label>
							<div class="form-group">
								<input type="text" name="sup_name" value="<?php if(isset($selected)){echo $selected->name;} ?>" class="form-control" id="sup_name" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('sup_name');?></span>
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
							<label for="attach_link" class="form-label"><span class="text-danger">*</span>Supplier Email</label>
							<div class="form-group">
								<input type="text" name="sup_email" value="<?php if(isset($selected))echo $selected->email_id; ?>" class="form-control" id="sup_email" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('sup_email');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Supplier Phone</label>
							<div class="form-group">
								<input type="text" name="sup_phone" value="<?php if(isset($selected))echo $selected->contact_no_1; ?>" class="form-control" id="sup_phone" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('sup_phone');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Supplier Address</label>
							<div class="form-group">
								<input type="text" name="sup_address" value="<?php if(isset($selected))echo $selected->address; ?>" class="form-control" id="sup_address" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('sup_address');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Bill Number</label>
							<div class="form-group">
								<input type="text" name="bill_num" value="<?php echo $this->input->post('bill_num'); ?>" class="form-control" id="bill_num" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('bill_num');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Order Number</label>
							<div class="form-group">
							<select class="form-control" name="order_num">
							<option value=''>select name</option>
							<?php foreach($order_num as $row) {?>
  							<option value='<?php echo $row->id?>'><?php echo $row->ponumber?></option>
							<?php }?>
							</select>
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('order_num');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Bill Status</label>
							<div class="form-group">
							<select class="form-control" name="bill_status">
							<option value=''>select name</option>
							<?php foreach($bill_status as $row) {?>
  							<option value='<?php echo $row->id?>'><?php echo $row->name?></option>
							<?php }?>
							</select>
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('bill_status');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Bill Date</label>
							<div class="form-group">
								<input type="date" name="bill_date" value="<?php echo $this->input->post('bill_date'); ?>" class="form-control" id="bill_date" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('bill_date');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Credit Days</label>
							<div class="form-group">
							<select class="form-control" name="cr_days_id">
							<option value=''>select name</option>
							<?php foreach($credit as $row) {?>
  							<option value='<?php echo $row->id?>'><?php echo $row->name?></option>
							<?php }?>
							</select>
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('cr_days_id');?></span>
							</div>
                        </div>
                        <!-- <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Bill Item</label>
							<div class="form-group">
							<select class="form-control" name="bill_item">
							<option value=''>select name</option>
							<?php foreach($bill_item as $row) {?>
  							<option value='<?php echo $row->id?>'><?php echo $row->item_name?></option>
							<?php }?>
							</select>
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('bill_item');?></span>
							</div> 
                        </div>-->
                        <!-- <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Quantity</label>
							<div class="form-group">
								<input type="text" name="qty" value="<?php echo $this->input->post('qty'); ?>" class="form-control" id="qty" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('qty');?></span>
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
							<select class="form-control" name="tax_id">
							<option value=''>select name</option>
							<?php foreach($tax as $row) {?>
  							<option value='<?php echo $row->id?>'><?php echo $row->name?></option>
							<?php }?>
							</select>
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
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Total Amount</label>
							<div class="form-group">
								<input type="text" name="total_amt" value="<?php echo $this->input->post('total_amt'); ?>" class="form-control" id="total_amt" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('total_amt');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger"></span>Remarks</label>
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



							