<!-- Layout content -->
<div class="layout-content">

    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-2 mb-4">
            <span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
            <?php echo $breadcrumb; ?> 
            <?php
                $GLOBALS['prj_filter_id'] = null;
                if(isset($_SESSION['concept_filter_id']))
                {
                    $GLOBALS['prj_filter_id'] = $_SESSION['concept_filter_id'];
                    unset($_SESSION['concept_filter_id']);
                }
                if(isset($_POST['prj_filter_id']))
                {
                    $GLOBALS['prj_filter_id'] = $_POST['prj_filter_id'];
                }
            ?>
        </h4>
        <div class="box card">
            <div class="card-body">
            <form action="" method="post" name="prj_form">
                <div class="col-md-6">
						<label for="prj_filter_id" class="form-label"><span class="text-danger"></span>Project Filter</label>
						<div class='form-group'>
						<select class="form-control" name="prj_filter_id" onchange="this.form.submit()" >
							<option value=''>select name</option>
							<?php foreach($prj_names as $row) {?>
                            <option value='<?php echo $row->id?>' <?php echo ($row->id == $GLOBALS['prj_filter_id']) ? 'selected="selected"' : "" ?> ><?php echo $row->name?></option>
							<?php }?>
						</select>
						</div>
				</div>
            </form>
                <div class="box-body card-datatable">
                    <div class="box-tools">
                        <a href="<?php echo site_url('Prj_dsg_concept/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Project Name</th>
                            <!-- <th>Design Stage</th> -->
                            <th>Name</th>
                            <th>Attach Link</th>
                            <th>Percentage</th>
                            <th>Review Status</th>
                            <th>Remarks</th>
                            <th>Revisions</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($concepts as $s) {
                            if($s['prj_id'] == $GLOBALS['prj_filter_id']){?>
                        <tr>
                            <td><?php echo $s['id']; ?></td>
                            <td><?php echo $s['prj_name']; ?></td>
                            <!-- <td><?php echo $s['design_stage']; ?></td> -->
                            <td><?php echo $s['name']; ?></td>
                            <td><a href='//<?php echo $s['attach_link']; ?>' target="_blank">Click here</a></td>
                            <td><?php echo $s['percentage']; ?></td>
                            <td><?php echo $s['review_status_name']; ?></td>
                            <td><?php echo $s['remarks']; ?></td>
                            <td><?php echo $s['revisions']; ?></td>
                            <td>
                                <a href="<?php echo site_url('Prj_dsg_concept/edit/' . $s['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('Prj_dsg_concept/remove/' . $s['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php }
                        else{ ?>
                            <tr>
                            <td><?php echo $s['id']; ?></td>
                            <td><?php echo $s['prj_name']; ?></td>
                            <!-- <td><?php echo $s['design_stage']; ?></td> -->
                            <td><?php echo $s['name']; ?></td>
                            <td><a href='//<?php echo $s['attach_link']; ?>' target="_blank">Click here</a></td>
                            <td><?php echo $s['percentage']; ?></td>
                            <td><?php echo $s['review_status_name']; ?></td>
                            <td><?php echo $s['remarks']; ?></td>
                            <td><?php echo $s['revisions']; ?></td>
                            <td>
                                <a href="<?php echo site_url('Prj_dsg_concept/edit/' . $s['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('Prj_dsg_concept/remove/' . $s['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php }
                    }?>
                    </table>
                </div>   
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
</div>