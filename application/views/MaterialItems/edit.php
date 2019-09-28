<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb; ?>
</h4>
      	<div class="card mb-4">
          <h6 class="card-header">MaterialItems Edit</h6>
            
            <div class="box card">
                                    <div class="card-body"> 
                                    	<div class="box-body"> 
			<?php echo form_open('MaterialItems/edit/'.$MaterialItems['id']); ?>
		
				<div class="row clearfix">
				<div class="form-group col-md-6">
					
					<label class="form-label"> Category</label>
						<select class="custom-select" name="material_cat_id" required>
						<option value="<?= $MaterialItems['material_cat_id'];?>" ><?= $MaterialItems['category'];?></option>
						<?php foreach($MATERIALS as $material){?>
                			<option value="<?=$material['id'];?>"><?=$material['material_category'];?></option>    
        				<?php }?>
						</select>
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Material Name</label>
						<input type="text" class="form-control" placeholder="" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $MaterialItems['material_name']); ?>" id="name">
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Price</label>
							<input type="text" class="form-control" placeholder="" name="price" value="<?php echo ($this->input->post('price') ? $this->input->post('price') : $MaterialItems['price']); ?>"  >
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Dimensions</label>
							<input type="text" class="form-control" placeholder="" name="dimensions" value="<?php echo ($this->input->post('dimensions') ? $this->input->post('dimensions') : $MaterialItems['dimensions']); ?>"  >
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Quantity</label>
							<input type="text" class="form-control" placeholder="" name="qty" value="<?php echo ($this->input->post('qty') ? $this->input->post('qty') : $MaterialItems['qty']); ?>"  >
						</div>
						<div class="form-group col-md-6">	
							<label class="form-label">Supplier</label>
						<select class="custom-select" name="supplier" required>
						<option value="<?=$MaterialItems['supplier_id']?>" ><?=$MaterialItems['supplier']?></option>
						<?php foreach($SUPPLIER as $supplier){?>
                			<option value="<?=$supplier['id'];?>"><?=$supplier['name'];?></option>    
        				<?php }?>
						</select>
						</div>
						<div class="col-md-6">
						<label for="name" class="control-label">Remarks</label>
						<div class="form-group">
							<input type="text" name="remarks" value="<?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $MaterialItems['remarks']); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>

				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>  </div></div>
        


</div>
<!-- / Content -->