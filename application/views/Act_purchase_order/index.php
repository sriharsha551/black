<!-- Layout content -->
<div class="layout-content">

    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-2 mb-4">
            <span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
            <?php echo $breadcrumb; ?> 
    </h4>
        <div class="box card" style="overflow-X:auto">
            <div class="card-body">
                <div class="box-body card-datatable" >
                    <div class="box-tools">
                        <a href="<?php echo site_url('Act_purchase_order/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Purchase Order No.</th>
                            <th>Supplier Id</th>
                            <th>Supplier Name</th>
                            <th>Supplier Email</th>
                            <th>Supplier Phone</th>
                            <th>Supplier Address</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($purchases as $purchases) { ?>
                        <tr>
                            <td><?php echo $purchases['id']; ?></td>
                            <td><?php echo $purchases['ponumber']?></td>
                            <td><?php echo $purchases['sup_id']; ?></td>
                            <td><?php echo $purchases['sup_name']; ?></td>
                            <td><?php echo $purchases['sup_email']; ?></td>
                            <td><?php echo $purchases['sup_phone']; ?></td>
                            <td><?php echo $purchases['sup_address']; ?></td>
                            <td><?php echo $purchases['material_name']; ?></td>
                            <td><?php echo $purchases['description']; ?></td>
                            <td><?php echo $purchases['amount']; ?></td>
                            <td><?php echo $purchases['remarks']; ?></td>
                            <td>
                                <a href="<?php echo site_url('Act_purchase_order/edit/' . $purchases['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('Act_purchase_order/remove/' . $purchases['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
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