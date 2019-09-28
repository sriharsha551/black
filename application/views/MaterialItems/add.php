
<!-- Content -->
<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
			<?php
				
				$GLOBALS['prj_filter_id'] = null;
				
				$GLOBALS['name'] = null;
				$GLOBALS['dimensions'] = null;
				$GLOBALS['qty']= null;
                if(isset($_POST['count']))
                {
					
                    $GLOBALS['prj_filter_id'] = $_POST['count'];
					
					$GLOBALS['name'] = $_POST['name'];
					$GLOBALS['dimensions'] = $_POST['dimensions'];
					$GLOBALS['qty'] = $_POST['qty'];

				}
            ?>
		</h4>
    
		<div class="card mb-4">
            <h6 class="card-header">ADD</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo form_open('MaterialItems/add'); ?>
					
					<div class="row clearfix">
						<div class="col-md-6">
						<label class="form-label">Material Category</label>
						<span class="text-danger">*</span>
						<select class="custom-select" name="category_id" required>
						<option value="">Select Category</option>
						<?php foreach($MATERIALS as $material){?>
                			<option value="<?= $material['id'];?>"><?=$material['material_category'];?></option>    
        				<?php }?>
						</select>
						</div>
					
						<div class="form-group col-md-6">
						<label class="form-label">Material Name</label>
						<input type="text" class="form-control" name="name" value="<?=$GLOBALS['name']?>" required>
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Dimensions </label>
							<input type="text" class="form-control" placeholder="" name="dimensions" value="<?=$GLOBALS['dimensions']?>" required>
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Quantity </label>
							<input type="text" class="form-control" placeholder="" name="qty" value="<?=$GLOBALS['qty']?>" required>
						</div>
						
                <div class="col-md-6">
						<label for="prj_filter_id" class="form-label"><span class="text-danger"></span>No. of Suppliers</label>
						<div class='form-group'>
						<input type="number" class="form-control" placeholder="" value="<?=$GLOBALS['prj_filter_id']?>"name="count" onchange="this.form.submit()"  >						
					
						</div>
				</div>
			<?php if(isset($_POST['count'])){
				for($i=0;$i<$_POST['count'];$i++)
				{
				?>
				
						<div class="form-group col-md-6">	
							<label class="form-label">Supplier Name</label>
						<select class="custom-select" name='supplier[<?=$i;?>]' required>
						<option value="">Select Supplier</option>
						<?php foreach($SUPPLIER as $supplier){?>
                			<option value="<?=$supplier['id'];?>"><?=$supplier['name'];?></option>    
        				<?php }?>
						</select>
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Price </label>
							<input type="text" class="form-control" placeholder='' name='price[<?=$i;?>]' value="" required>
						</div>
						<?php if($i==$_POST['count']-1 ){?>
						<div class="form-group col-md-6">
							<label for="name" class="form-label">Remarks</label>
								<input type="text" name="remarks" value="<?php echo $this->input->post('remarks'); ?>" class="form-control" />
								<span class="text-danger"><?php echo form_error('remarks');?></span>
							</div>
						<?php }?>
							<?php }}?>
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
