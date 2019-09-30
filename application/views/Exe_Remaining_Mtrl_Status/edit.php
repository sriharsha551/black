<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb;?>
            <?php 
                $GLOBALS['proj_id'] = null;
                $GLOBALS['item_id'] = null;
                $GLOBALS['purchase_id'] = null;
                $selected = null;
                $purchase = null;
				if(isset($_POST['prj_id']))
                {
                    $GLOBALS['proj_id'] = $_POST['prj_id'];
                    foreach($projects as $pro){
                        if($pro['id'] == $GLOBALS['proj_id']){
                            $selected = $pro;
                            $_SESSION['error'] = false;
                        }
                    }
                }
                if(isset($_POST['mtrl_id']))
                {
                    $GLOBALS['item_id'] = $_POST['mtrl_id'];
                    foreach($items as $i){
                        if($i['id'] == $GLOBALS['item_id']){
                            $selected_item = $i;
                        }
                    }
                }

                if(isset($GLOBALS['item_id']) && isset($GLOBALS['proj_id']))
                {
                    foreach($purchases as $p){
                        if(($p['prj_id']==$GLOBALS['proj_id']) && ($p['items']==$GLOBALS['item_id']))
                        {
                            $purchase = $p;
                        }
                    }
                }

                echo (form_error('prj_id')); 

			?>
		</h4>
    
		<div class="card mb-4">
            <h6 class="card-header">ADD</h6>
			<div class="card-body"> 
				<div class="box-body">
				<form action="" method="post" name="supp_form">
				<div class="row clearfix"> 
                    <div class="col-md-6">
                        <label for="prj_id" class="form-label"><span class="text-danger">*</span>Project</label>
                        <div class='form-group'>
                            <select class="form-control" name="prj_id" onchange="this.form.submit();">
                                <option value=''>select name</option>
                                <?php foreach($projects as $row) {?>
                                <option value='<?php echo $row['id']?>' <?php echo ($row['id'] == $GLOBALS['proj_id']) ? 'selected="selected"' : "" ?> ><?php echo $row['id']." - ".$row['name']?></option>
                                <?php }?>
                            </select>		
                            <span class="text-danger"><?php echo form_error('prj_id');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Items</label>
							<div class="form-group">
                                <select class="form-control" name="mtrl_id" onchange="this.form.submit();">
                                        <option value=''>select name</option>
                                        <?php foreach($items as $row) {?>
                                            <?php
                                                if($row['prj_id'] == $GLOBALS['proj_id']){
                                            ?>
                                                <option value='<?php echo $row['id']?>' <?php echo ($row['id'] == $GLOBALS['item_id']) ? 'selected="selected"' : "" ?> ><?php echo $row['id']." - ".$row['material_name']?></option>
                                                <?php }?>
                                        <?php }?>
                                </select>
                                <span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('mtrl_id');?></span>
							</div>
                        </div>
				</div>
				</form>
            		<?php echo form_open('Exe_Remaining_Mtrl_Status/add'); ?>
					<div class="row clearfix">
                            <div class="col-md-6" style="display:none">
                            <label for="prj_id" class="form-label"><span class="text-danger">*</span>Project</label>
                            <div class='form-group'>
                                <input type="hidden" name="prj_id" value="<?php if(isset($purchase)){echo $purchase['id'];} ?>" class="form-control" id="prj_id" />
                                <span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('prj_id');?></span>
                            </div>
                        </div>
                        <div class="col-md-6" style="display:none">
                            <label for="mtrl_id" class="form-label"><span class="text-danger">*</span>Items</label>
                            <div class='form-group'>
                                <input type="hidden" name="mtrl_id" value="<?php if(isset($purchase)){echo $purchase['id'];} ?>" class="form-control" id="mtrl_id" />
                                <span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('mtrl_id');?></span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
							<label for="ponumber" class="form-label"><span class="text-danger">*</span>Purchase Number</label>
							<div class="form-group">
								<input type="text" name="ponumber" value="<?php if(isset($purchase)){echo $purchase['ponumber'];} ?>" class="form-control" id="ponumber" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('ponumber');?></span>
							</div>
                        </div>

                        <div class="col-md-6">
							<label for="qty_order" class="form-label"><span class="text-danger">*</span>Quantity Ordered</label>
							<div class="form-group">
								<input type="text" name="qty_order" value="<?php if(isset($purchase)){echo $purchase['qty'];} ?>" class="form-control" id="qty_order" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('qty_order');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="order_date" class="form-label"><span class="text-danger">*</span>Ordered Date</label>
							<div class="form-group">
								<input type="date" name="order_date" value="<?php echo $this->input->post('order_date'); ?>" class="form-control" id="order_date" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('order_date');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="qty_recived" class="form-label"><span class="text-danger">*</span>Quantity Recived</label>
							<div class="form-group">
								<input type="text" name="qty_recived" value="<?php echo $this->input->post('qty_recived');  ?>" class="form-control" id="qty_recived" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('qty_recived');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="recived_date" class="form-label"><span class="text-danger">*</span>Recived Date</label>
							<div class="form-group">
								<input type="date" name="recived_date" value="<?php echo $this->input->post('recived_date');  ?>" class="form-control" id="recived_date" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('recived_date');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="qty_utilised" class="form-label"><span class="text-danger">*</span>Quantity Utilized</label>
							<div class="form-group">
								<input type="text" name="qty_utilised" value="<?php echo $this->input->post('qty_utilised'); ?>" class="form-control" id="qty_utilised" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('qty_utilised');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="utl_date" class="form-label"><span class="text-danger">*</span>Utilized Date</label>
							<div class="form-group">
								<input type="date" name="utl_date" value="<?php echo $this->input->post('utl_date');  ?>" class="form-control" id="utl_date" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('utl_date');?></span>
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