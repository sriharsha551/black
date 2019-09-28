<!-- Layout content -->
<div class="layout-content">

    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">

        <h4 class="font-weight-bold py-3 mb-4">
            <span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
            <?php echo $breadcrumb; ?>
        </h4>

        <div class="box card">
            <div class="card-body">
                <div class="box-body card-datatable">
                    <div class="box-tools">
                        <a href="<?php echo site_url('Employee/Increment_Letter'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee Name</th>
                            <th>Employee Id</th>
                            <th>Amount Revised</th>
                            <th>Revised From</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php $Sno=1; foreach ($increaments as $d) {?>
                        <tr>
                            <td><?php echo $Sno++; ?></td>
                            <td><?php echo $d['empName']; ?></td>
                            <td><?php echo $d['empId']; ?></td>
                            <td><?php echo $d['amount']; ?></td>
                            <td><?php echo date("d-m-Y",strtotime($d['revised_from'])); ?></td>
                            <td>
                                <!-- <a href="<?php echo site_url('Department/edit/' . $d['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a> -->
                                <a target='_blank' href="<?php echo site_url('pdf/increments/increment_' . $d['id'].'.pdf'); ?>" class="btn btn-info btn-xs mr-1"><span class="fas fa-eye"></span></a>
                                <a href="<?php echo site_url('Employee/increment_delete/' . $d['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>   
            </div>
        </div>
</div>
<!-- / Content -->