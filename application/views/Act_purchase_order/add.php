
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
                $GLOBALS['item_id'] = null;
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
                if(isset($_POST['items']))
                {

                    $GLOBALS['item_id'] = $_POST['items'];
                    foreach($items as $i){
                        if($i['id'] == $GLOBALS['item_id']){
                            $selected_item = $i;
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
                    <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Items</label>
							<div class="form-group">
                                <select class="form-control" name="items" onchange="this.form.submit();">
                                        <option value=''>select name</option>
                                        <?php foreach($items as $row) {?>
                                            <?php
                                                if($row['supplier_id'] == $GLOBALS['supplier_id']){
                                            ?>
                                                <option value='<?php echo $row['id']?>' <?php echo ($row['id'] == $GLOBALS['item_id']) ? 'selected="selected"' : "" ?> ><?php echo $row['id']." - ".$row['material_name']?></option>
                                                <?php }?>
                                        <?php }?>
                                </select>
                                <span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('items');?></span>
							</div>
                        </div>
				</div>
				</form>
            		<?php echo form_open('Act_purchase_order/add'); ?>
					<div class="row clearfix">
                            <div class="col-md-6" style="display:none">
                            <label for="prj_id" class="form-label"><span class="text-danger">*</span>Supplier Id</label>
                            <div class='form-group'>
                                <input type="hidden" name="sup_id" value="<?php if(isset($selected)){echo $selected->id;} ?>" class="form-control" id="sup_id" />
                                <span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('sup_id');?></span>
                            </div>
                        </div>
                        <div class="col-md-6" style="display:none">
                            <label for="prj_id" class="form-label"><span class="text-danger">*</span>Items</label>
                            <div class='form-group'>
                                <input type="hidden" name="items" value="<?php if(isset($selected)){echo $selected->id;} ?>" class="form-control" id="items" />
                                <span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('items');?></span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Purchase Number</label>
							<div class="form-group">
								<input type="text" name="ponumber" value="<?php echo $this->input->post('ponumber'); ?>" class="form-control" id="ponumber" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('ponumber');?></span>
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
							<label for="percentage" class="form-label"><span class="text-danger"></span>Description</label>
							<div class="form-group">
								<input type="text" name="description" value="<?php echo $this->input->post('description'); ?>" class="form-control" id="description" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('description');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Amount</label>
							<div class="form-group">
								<input type="text" name="amount" value="<?php if(isset($selected_item))echo ($selected_item['price']*$selected_item['qty']); ?>" class="form-control" id="amount" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('amount');?></span>
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



							