<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb;?>
			<?php 
                $GLOBALS['proj_id'] = $tnt['prj_id'];
                $GLOBALS['tool_id'] = $tnt['tool_id'];
                $selected = null;
                $selected_tool = null;
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
                if(isset($_POST['tool_id']))
                {
                    $GLOBALS['tool_id'] = $_POST['tool_id'];
                    foreach($machinary as $i){
                        if($i['id'] == $GLOBALS['tool_id']){
                            $selected_tool = $i;
                            $tnt['qty'] = $i['qty'];
                        }
                    }
                }
			?>
		</h4>
    
		<div class="card mb-4">
            <h6 class="card-header">Edit</h6>
			<div class="card-body"> 
				<div class="box-body">
				<form action="" method="post" name="supp_form">
				<div class="row clearfix"> 
                    <div class="col-md-6">
                        <label for="prj_id" class="form-label"><span class="text-danger">*</span>Project Id</label>
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
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Tool</label>
							<div class="form-group">
                                <select class="form-control" name="tool_id" onchange="this.form.submit();">
                                        <option value=''>select name</option>
                                        <?php foreach($machinary as $row) {?>
                                            <option value='<?php echo $row['id']?>' <?php echo ($row['id'] == $GLOBALS['tool_id']) ? 'selected="selected"' : "" ?> ><?php echo $row['id']." - ".$row['tool_name']?></option>    
                                        <?php }?>
                                </select>
                                <span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('tool_id');?></span>
							</div>
                        </div>
				</div>
				</form>
            		<?php echo form_open('Exe_Tools/edit/'.$tnt['id']); ?>

                    <div class="col-md-6" style="display:none">
                            <label for="prj_id" class="form-label"><span class="text-danger">*</span>Project Id</label>
                            <div class='form-group'>
                                <input type="hidden" name="prj_id" value="<?php echo $selected['id'] ? $selected['id'] : $tnt['prj_id']; ?>" class="form-control" id="prj_id" />
                                <span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('prj_id');?></span>
                            </div>
                        </div>
                        <div class="col-md-6" style="display:none">
                            <label for="tool_id" class="form-label"><span class="text-danger">*</span>Tool</label>
                            <div class='form-group'>
                                <input type="hidden" name="tool_id" value="<?php echo $selected_tool['id'] ? $selected_tool['id'] : $tnt['tool_id']; ?>" class="form-control" id="tool_id" />
                                <span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('tool_id');?></span>
                            </div>
                        </div>

                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Quantity</label>
							<div class="form-group">
								<input type="number" name="qty" value="<?php echo ($this->input->post('qty') ? $this->input->post('qty') : $tnt['qty']); ?>" class="form-control" id="qty" />
								<span class="text-danger"><?php if($_SESSION['error']==true)echo form_error('qty');?></span>
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
