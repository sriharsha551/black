<!-- Layout content -->
<div class="layout-content">

    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-2 mb-4">
            <span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
            <?php echo $breadcrumb; ?> 
    </h4>
        <div class="box card">
            <div class="card-body">
                <div class="box-body card-datatable">
                    <div class="box-tools">
                        <a href="<?php echo site_url('Exe_tools_rent/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Project</th>
                            <th>Tool</th>
                            <th>Hire Start Date</th>
                            <th>Hire End Date</th>
                            <th>Number Of Days</th>
                            <th>Number Of Hours</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($tools_rents as $tools_rent) { ?>
                        <tr>
                            <td><?php echo $tools_rent['id']; ?></td>
                            <td><?php echo $tools_rent['prj_name']; ?></td>
                            <td><?php echo $tools_rent['tool_name']; ?></td>
                            <td><?php echo $tools_rent['hire_start']; ?></td>
                            <td><?php echo $tools_rent['hire_end']; ?></td>
                            <td><?php echo $tools_rent['no_of_days'];?></td>
                            <td><?php echo $tools_rent['no_of_hours']; ?></td>
                            <td><?php echo $tools_rent['remarks']; ?></td>
                            <td>
                                <a href="<?php echo site_url('Exe_tools_rent/edit/' . $tools_rent['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('Exe_tools_rent/remove/' . $tools_rent['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </table>
                </div>   
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
</div>