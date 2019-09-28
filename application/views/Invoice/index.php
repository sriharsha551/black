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
                        <a href="<?php echo site_url('Invoice/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <!-- <th>ID</th>
                            <th>Customer Id</th> -->
                            <th>Invoice Number</th>
                            <th>Order Number</th>
                            <th>Invoice Date</th>
                            <th>Total Amount</th>
                            <th>Invoice Status</th>
                            <th>Credit days</th>
                            <th>Customer Name</th>
                            <th>Due Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($invoice as $invoice) { ?>
                        <tr>
                            <td><a href="<?php echo site_url('Invoice/invoice_view/'.$invoice['id']);?>"><?php echo $invoice['invoice_num']; ?></a></td>
                            <td><?php echo $invoice['order_num']; ?></td>
                            <td><a href="<?php echo site_url('Invoice/invoice_view/'.$invoice['id']);?>"><?php echo $invoice['invoice_date']; ?></a> </td> 
                            <td><?php echo $invoice['total_amount']; ?></td> 
                            <td><?php echo $invoice['invoice_status']; ?></td>
                            <td><?php echo $invoice['cr_days']; ?></td>
                            <td><?php echo $invoice['customer_name']; ?></td>
                            <td><?php echo date('Y-m-d',strtotime($invoice['invoice_date'] . " + " . $invoice['days']."days"))?></td>
                            <td>
                                <a href="<?php echo site_url('invoice/delete/' . $invoice['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
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