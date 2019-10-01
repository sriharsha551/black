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
                        <a href="<?php echo site_url('Exe_client_request/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Project</th>
                            <th>Date</th>
                            <th>Material</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($requests as $request) { ?>
                        <tr>
                            <td><?php echo $request['id']; ?></td>
                            <td><?php echo $request['prj_name']; ?></td>
                            <td><?php echo $request['date_req']; ?></td>
                            <td><?php echo $request['material_name']; ?></td>
                            <td><?php echo $request['quantity']; ?></td>
                            <td>
                                <a href="<?php echo site_url('Exe_client_request/edit/' . $request['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('Exe_client_request/remove/' . $request['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
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