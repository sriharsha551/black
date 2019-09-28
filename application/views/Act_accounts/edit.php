 
<!-- Content -->
<!-- Layout content -->
<div class="layout-content">

<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-2 mb-4">
        <span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
        <?php echo $breadcrumb; print_r($status) ?>
    </h4>
    

    <div class="card mb-4">
        <h6 class="card-header">Edit</h6>
        <div class="card-body"> 
            <div class="box-body">  
                <?php echo form_open('Act_accounts/edit/'.$status['id']); ?>
                
                <div class="row clearfix">

                    <div class="col-md-6">
                        <label for="coa_id" class="form-label"><span class="text-danger">*</span>Chart of Account</label>
                        <div class="form-group">
                            <select name="coa_id" class="form-control">
                                <option value="">Select </option>
                                <?php foreach($coa_id as $t) {?>
                                    <option value="<?php echo $t['id'];?>" <?php echo ($status['name'] == $t['name']) ? ' selected="selected"' : "";?> ><?php echo $t['name']?></option>
                                <?php }?>
                            </select>
                            <span class="text-danger"><?php echo form_error('coa_id');?></span>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="name" class="form-label"><span class="text-danger">*</span>Account Name</label>
                        <div class="form-group">
                            <input type="text" name="acc_name" value="<?php echo ($this->input->post('acc_name') ? $this->input->post('acc_name') : $status['acc_name']); ?>" class="form-control" id="acc_name" />
                            <span class="text-danger">
                                <?php
                                    if(isset($err)){
                                        echo $err;
                                    }else{
                                        echo form_error('acc_name');
                                    } 
                                ?>
                            </span>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="bank_name" class="form-label"><span class="text-danger">*</span>Bank Name</label>
                        <div class="form-group">
                            <input type="text" name="bank_name" value="<?php echo ($this->input->post('bank_name') ? $this->input->post('bank_name') : $status['bank_name']); ?>" class="form-control" id="bank_name" />
                            <span class="text-danger">
                                <?php echo form_error('bank_name'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="opening_balance" class="form-label"><span class="text-danger">*</span>Opening Balance</label>
                        <div class="form-group">
                            <input type="number" name="opening_balance" value="<?php echo ($this->input->post('opening_balance') ? $this->input->post('opening_balance') : $status['opening_balance']); ?>" class="form-control" id="opening_balance" />
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <label for="bank_address" class="form-label"><span class="text-danger">*</span>Address</label>
                        <div class="form-group">
                            <input type="text" name="bank_address" value="<?php echo ($this->input->post('bank_address') ? $this->input->post('bank_address') : $status['bank_address']); ?>" class="form-control" id="bank_address" />
                            <span class="text-danger">
                                <?php echo form_error('bank_address'); ?>
                            </span>
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
