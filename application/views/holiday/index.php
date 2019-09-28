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
                        <a href="<?php echo site_url('holiday/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>


                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Holiday Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach($holidays as $h){ ?>
                        <tr>
                            <td><?php echo $h['id']; ?></td>
                            <td><?php echo $h['name']; ?></td>
                            <td><?php echo date("d M, Y",strtotime($h['holiday_date'])); ?></td>
                            <td>
                                <a href="<?php echo site_url('holiday/edit/'.$h['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a> 
                                <a href="<?php echo site_url('holiday/remove/'.$h['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>   
            </div>
        </div>
</div>
<!-- / Content -->
