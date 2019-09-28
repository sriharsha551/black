
<!-- Content -->
<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>
    
		<div class="card mb-4">
            <h6 class="card-header">ADD</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo form_open_multipart('MaterialSpecification/add'); ?>
					
					<div class="row clearfix">
						<div class="form-group col-md-6">
						<label class="form-label">Project Name</label>
						<select class="custom-select" name="project_id" required>
						<option value="">Select project</option>
						<span class="text-danger"><?php echo form_error('project_id');?></span>
						<?php foreach($PROJECTS as $project){?>
                			<option value="<?=$project->id;?>"><?=$project->name;?></option>    
        				<?php }?>
						</select>
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Category Name</label>
						<select class="custom-select" name="material_cat_id" required>
						<option value="">Select Category</option>
						<span class="text-danger"><?php echo form_error('material_cat_id');?></span>
						<?php foreach($CATEGORIES as $category){?>
                			<option value="<?=$category->id;?>"><?=$category->material_category;?></option>    
        				<?php }?>
						</select>
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Item Name</label>
						<select class="custom-select" name="material_item_id" required>
						<option value="">Select Item</option>
						<span class="text-danger"><?php echo form_error('material_item_id');?></span>
						<?php foreach($ITEMS as $item){?>
                			<option value="<?=$item->id;?>"><?=$item->material_name;?></option>    
        				<?php }?>
						</select>
						</div>
						<div class="form-group col-md-6">
						<label for="attach_name" class="form-label">Design Image</label>
						<input type="file" name="attach_name_design" value="<?php echo $this->input->post('attach_name_design'); ?>" class="form-control" id="attach_name_design" />
						<span class="text-danger"><?php echo form_error('attach_name_design');?></span>
						</div>
						<div class="form-group col-md-6">
						<label for="attach_name" class="form-label">Actual Image</label>
						<input type="file" name="attach_name" value="<?php echo $this->input->post('attach_name'); ?>" class="form-control" id="attach_name" />
						<span class="text-danger"><?php echo form_error('attach_name');?></span>
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">details</label>
						<input type="text" class="form-control" name="details" value="" required>
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Quantity</label>
						<input type="text" class="form-control" name="quantity" value="" required>
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Price</label>
						<input type="text" class="form-control" name="price" value="" required>
						</div>
						<div class="form-group col-md-6">
						<label class="form-label">Supplier</label>
						<select class="custom-select" name="supplier_id" required>
						<option value="">Select Supplier</option>
						<span class="text-danger"><?php echo form_error('supplier_id');?></span>
						<?php foreach($SUPPLIERS as $supplier){?>
                			<option value="<?=$supplier->id;?>"><?=$supplier->name;?></option>    
        				<?php }?>
						</select>
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
