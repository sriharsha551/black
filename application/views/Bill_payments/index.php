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
                        <a href="<?php echo site_url('bill_payments/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Bill</th>
                            <th>Coa</th>
                            <th>Paid Date</th>
                            <th>Amount</th>
                            <th>Amount Paid</th>
                            <th>Description</th>
                            <th>Payment Method</th>
                            <th>Remarks</th>
                            <!-- <th>Transaction Type</th> -->
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($bill as $bill) { ?>
                        <tr>
                            <td><?php echo $bill['id']; ?></td>
                            <td><?php echo $bill['bill_id']; ?></td>
                            <td><?php echo $bill['coa_id']; ?></td>
                            <td><?php echo $bill['paid_dt']; ?></td>
                            <td><?php echo $bill['amount']; ?></td>
                            <td><?php echo $bill['amount_paid'];?></td>
                            <td><?php echo $bill['description']; ?></td>
                            <td><?php echo $bill['payment_method']; ?></td>
                            <td><?php echo $bill['remarks']; ?></td>
                            <!-- <td><?php echo $bill['tran_type_id']; ?></td> -->
                            <td>
                                <a href="<?php echo site_url('bill_payments/edit/' . $bill['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('bill_payments/remove/' . $bill['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
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