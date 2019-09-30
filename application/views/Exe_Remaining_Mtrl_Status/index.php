<div class="layout-content">

    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">

        <h4 class="font-weight-bold py-2 mb-4">
            <span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
            <?php echo $breadcrumb;?> 
        </h4>

        <div class="box card">
            <div class="card-body">
                <div class="box-body card-datatable">
                    <div class="box-tools">
                        <a href="<?php echo site_url('Exe_Remaining_Mtrl_Status/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>
                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th rowspan = "2">ID</th>
                            <th>Project</th>
                            <th>Material</th>
                            <th>Quantity Ordered</th>
                            <th>Order Date</th>
                            <th>Quantity Recived</th>
                            <th>Recived Date</th>
                            <th>Quantity Utilized</th>
                            <th>Utilized Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($mtrl_status as $d) {?>
                        <tr>
                            <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['name']; ?></td>
                            <td><?php echo $d['material_name']; ?></td>
                            <td><?php echo $d['qty_order']; ?></td>
                            <td><?php echo $d['order_date']; ?></td>
                            <td><?php echo $d['qty_recived']; ?></td>
                            <td><?php echo $d['recived_date']; ?></td>
                            <td><?php echo $d['qty_utilised']; ?></td>
                            <td><?php echo $d['utl_date']; ?></td>
                            <td>
                                <a href="<?php echo site_url('Exe_Remaining_Mtrl_Status/edit/' . $d['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('Exe_Remaining_Mtrl_Status/remove/' . $d['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>   
            </div>
        </div>
</div>