<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb; ?>
</h4>
      	<div class="card mb-4">
          <h6 class="card-header">MaterialSpecification Edit</h6>
            
            <div class="box card">
                                    <div class="card-body"> 
                                    	<div class="box-body"> 
			<?php echo form_open_multipart('MaterialSpecification/edit/'.$MaterialSpecification['id']); ?>
		
				<div class="row clearfix">
				<div class="form-group col-md-6">
					<label class="form-label">Project Name</label>
						<select class="custom-select" name="project_id" required>
						<span class="text-danger"><?php echo form_error('name');?></span>
						<option value="<?= $MaterialSpecification['project_id'];?>" ><?= $MaterialSpecification['project_name'];?></option>
						<?php foreach($PROJECTS as $project){?>
                			<option value="<?=$project->id;?>"><?=$project->name;?></option>    
        				<?php }?>
						</select>
						</div>
				<div class="form-group col-md-6">
					<label class="form-label">Category Name</label>
						<select class="custom-select" name="material_cat_id" required>
						<span class="text-danger"><?php echo form_error('material_cat_id');?></span>
						<option value="<?= $MaterialSpecification['material_cat_id'];?>" ><?= $MaterialSpecification['category_name'];?></option>
						<?php foreach($CATEGORIES as $category){?>
                			<option value="<?=$category->id;?>"><?=$category->material_category;?></option>    
        				<?php }?>
						</select>
						</div>
						<div class="form-group col-md-6">
					<label class="form-label">Item Name</label>
						<select class="custom-select" name="material_item_id" required>
						<span class="text-danger"><?php echo form_error('material_item_id');?></span>
						<option value="<?= $MaterialSpecification['material_item_id'];?>" ><?= $MaterialSpecification['item_name'];?></option>
						<?php foreach($ITEMS as $item){?>
                			<option value="<?=$item->id;?>"><?=$item->material_name;?></option>    
        				<?php }?>
						</select>
						</div>
						<div class="form-group col-md-6">
								<label for="attach_name" class="form-label"><span class="text-danger">*</span>Design Image</label>
								<input type="file" name="attach_name_design" value="<?php echo ($this->input->post('attach_name_design')? $this->input->post('attach_name_design'):$MaterialSpecification['material_design_image']); ?>" class="form-control" id="attach_name_design" />
								<span class="text-danger"><?php echo form_error('attach_name_design');?></span>
							</div>
						<div class="form-group col-md-6">
								<label for="attach_name" class="form-label"><span class="text-danger">*</span>Actual Image</label>
								<input type="file" name="attach_name" value="<?php echo ($this->input->post('attach_name')? $this->input->post('attach_name'):$MaterialSpecification['material_actual_image']); ?>" class="form-control" id="attach_name" />
								<span class="text-danger"><?php echo form_error('attach_name');?></span>
							</div>
							<div class="col-md-6">
						<label for="name" class="control-label">Details</label>
						<div class="form-group">
							<input type="text" name="details" value="<?php echo ($this->input->post('details') ? $this->input->post('details') : $MaterialSpecification['details']); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('details');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="name" class="control-label">Quantity</label>
						<div class="form-group">
							<input type="text" name="quantity" value="<?php echo ($this->input->post('quantity') ? $this->input->post('quantity') : $MaterialSpecification['quantity']); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('quantity');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="name" class="control-label">Price</label>
						<div class="form-group">
							<input type="text" name="price" value="<?php echo ($this->input->post('price') ? $this->input->post('price') : $MaterialSpecification['price']); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('price');?></span>
						</div>
					</div>
					<div class="form-group col-md-6">
					<label class="form-label">Supplier Name</label>
						<select class="custom-select" name="supplier_id" required>
						<span class="text-danger"><?php echo form_error('supplier_id');?></span>
						<option value="<?= $MaterialSpecification['supplier_id'];?>" ><?= $MaterialSpecification['supplier_name'];?></option>
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
		</div>  </div></div>
        


</div>
<!-- / Content -->