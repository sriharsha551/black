
<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb; ?>
</h4>
      	<div class="card mb-4">
          <h6 class="card-header">Category Edit</h6>
            <div class="box card">
                <div class="card-body"> 
                    <div class="box-body"> 
                        <?php echo form_open('Category/edit/'.$category['id']); ?>
                            
                        <div class="row clearfix">
						<div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Category</label>
							<div class="form-group">
								<input type="text" name="name" value="<?php echo ($this->input->post('category') ? $this->input->post('category') : $category['category']); ?>" class="form-control" id="type" />
								<span class="text-danger"><?php echo form_error('name');?></span>
							</div>
						</div>
                        <div class="col-md-6">
                            <label for="type" class="form-label"><span class="text-danger">*</span>Type</label>
                            <div class="form-group">
								<select name="type" class="form-control">
                                    <option value="">Select </option>
                                    <?php foreach($types as $t) {?>
                                        <option value="<?php echo $t['id']?>" <?php echo ($category['type'] == $t['type']) ? ' selected="selected"' : "";?>><?php echo $t['type']?></option>
                                    <?php }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('type');?></span>
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