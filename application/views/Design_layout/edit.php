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
            <h6 class="card-header">Edit</h6>
            <div class="card-body">
                <div class="box-body">
                    <?php echo  form_open_multipart('Design_layout/edit/'.$Design_layout['id']); ?>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prj_id" class="form-label"><span class="text-danger">*</span>Project</label>
                                <select name="prj_id" class="form-control" id="prj_id">
                                    <?php foreach ($proj_list as $proj) { ?>
                                    <option value="<?php echo $proj['id'] ?>"
                                        <?php echo ($Design_layout['prj_id'] == $proj['id']) ? 'selected="selected"' : "" ?>>
                                        <?php echo $proj['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prj_id" class="form-label"><span class="text-danger">*</span>Project</label>
                                <select name="prj_id" class="form-control" id="prj_id">
                                    <?php foreach ($proj_list as $proj) { ?>
                                    <option value="<?php echo $proj['id'] ?>"
                                        <?php echo ($Design_layout['prj_id'] == $proj['id']) ? 'selected="selected"' : "" ?>>
                                        <?php echo $proj['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label"><span class="text-danger">*</span>Name</label>
                                <input type="text" name="name"
                                    value="<?php echo $this->input->post('name') ?  $this->input->post('name') : $Design_layout['name']; ?>"
                                    class="form-control" id="name" />
                                <span class="text-danger"><?php echo form_error('name');?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="attach_name" class="form-label"><span
                                        class="text-danger">*</span>Attachment</label>
                                <input type="file" name="attach_name"
                                    value="<?php echo $this->input->post('attach_name'); ?>" class="form-control"
                                    id="attach_name" />
                                <span class="text-danger"><?php echo form_error('attach_name');?></span>
                                <span class="text-danger"><?php echo $upload_error;?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="percentage" class="form-label"><span
                                        class="text-danger">*</span>Percentage</label>
                                <input type="text" name="percentage"
                                    value="<?php echo $this->input->post('percentage') ? $this->input->post('percentage') : $Design_layout['percentage']; ?>"
                                    class="form-control" id="percentage" />
                                <span class="text-danger"><?php echo form_error('percentage');?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="review_status" class="form-label"><span class="text-danger">*</span>Review
                                    Status</label>
                                <select name="review_status" value="<?php echo $this->input->post('review_status')?>"
                                    class="form-control" id="review_status">
                                    <?php foreach ($review_statuses as $review_status) {?>
                                    <option value="<?php echo $review_status['id'] ?>"
                                        <?php echo ($Design_layout['review_status'] == $review_status['id']) ? 'selected="selected"' : "" ?>>
                                        <?php echo $review_status['review_status_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Edit
                            </button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
        <!-- / Content -->