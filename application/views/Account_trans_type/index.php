<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-2 mb-4">
            <span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
            <?php echo $breadcrumb; ?>
        </h4>

        <div class="box card">
            <div class="card-body">
                <div class="box-body card-datatable">
                    <div class="box-tools">
                        <a href="<?php echo site_url('Account_trans_type/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php $index=1;?>
                        <?php foreach ($trans_types as $type) {?>
                        <tr>
                            <td><?php echo $index++; ?></td>
                            <td><?php echo $type['trans_type']; ?></td>
                            <td>
                                <a href="<?php echo site_url('Account_trans_type/edit/' . $type['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('Account_trans_type/remove/' . $type['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php } ?>                    
                    </table>
                </div>   
            </div>
        </div>
    </div>
</div>