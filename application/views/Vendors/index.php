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
                        <a href="<?php echo site_url('Vendors/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Machinary</th>
                            <th>Vendors Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($Vendors as $d) {?>
                        <tr>
                            <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['tool_name']; ?></td>
                            <td><?php echo $d['vendor_name']; ?></td>
                            <td><?php echo $d['vendor_email']; ?></td>
                            <td><?php echo $d['vendor_phone']; ?></td>
                            <td><?php echo $d['vendor_address']; ?></td>
                            <td><?php echo $d['units']; ?></td>
                            <td><?php echo $d['price']; ?></td>

                            <td>
                                <a href="<?php echo site_url('Vendors/edit/' . $d['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('Vendors/remove/' . $d['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>   
            </div>
        </div>
</div>
<!-- / Content -->