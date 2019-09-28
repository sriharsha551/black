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
                        <a href="<?php echo site_url('Invoice_payments/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Invoice Num</th>
                            <!-- <th>Coa Id</th> -->
                            <th>Paid Date</th>
                            <th>Amount</th>
                            <th>Amount Recieved </th>
                            <th>Description</th>
                            <th>Pay Method</th>
                            <th>Remarks</th>
                            <th>Transaction Type</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($invoice as $invoice) { ?>
                        <tr>
                            <td><?php echo $invoice['id']; ?></td>
                            <td><?php echo $invoice['inv_id']; ?></td>
                            <!-- <td><?php echo $invoice['coa_id']; ?></td> -->
                            <td><?php echo $invoice['paid_dt']; ?></td>
                            <td><?php echo $invoice['amount']; ?></td>
                            <td><?php echo $invoice['amount_recieved']; ?></td>
                            <td><?php echo $invoice['description']; ?></td>
                            <td><?php echo $invoice['pay_method']; ?></td>
                            <td><?php echo $invoice['remarks']; ?></td>
                            <td><?php echo $invoice['tran_type_id']; ?></td>
                            <td>
                                <a href="<?php echo site_url('Invoice_payments/edit/' . $invoice['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('Invoice_payments/remove/' . $invoice['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
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