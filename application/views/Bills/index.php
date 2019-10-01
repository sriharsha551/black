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
                        <a href="<?php echo site_url('Bills/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <!-- <th>Supplier Id</th> -->
                            <!-- <th>Supplier Name</th>
                            <th>Supplier Email</th>
                            <th>Supplier Phone</th>
                            <th>Supplier Address</th> -->
                            <th>Bill Number</th>
                            <th>Order Number</th>
                            <th>Project</th>
                            <th>Bill Status</th>
                            <th>Bill Date</th>
                            <th>Credit days</th>
                            <th>Due Date</th>
                            <!-- <th>Bill Item</th> -->
                            <!-- <th>Quantity</th> -->
                            <th>Unit Price</th>
                            <th>Tax Amount</th>
                            <th>Total Amount</th>
                            <!-- <th>Tax</th>
                             <th>Remarks</th> -->
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($bills as $bills) { ?>
                        <tr>
                            <!-- <td><?php echo $bills['id']; ?></td>
                            <td><?php echo $bills['supplier']; ?></td>
                            <td><?php echo $bills['sup_name']; ?></td>
                            <td><?php echo $bills['sup_email']; ?></td>
                            <td><?php echo $bills['sup_phone']; ?></td>
                            <td><?php echo $bills['sup_address']; ?></td> -->
                            <td><a href="<?php echo site_url('Bills/bills_view/'.$bills['id']);?>"><?php echo $bills['bill_num']; ?></a></td>
                            <td><?php echo $bills['order_name']; ?></td>
                            <td><?php echo $bills['prj_name']; ?></td>
                            <td><?php echo $bills['bill_status']; ?></td>
                            <td><a href="<?php echo site_url('Bills/bills_view/'.$bills['id']);?>"><?php echo $bills['bill_date']; ?></a></td>
                            <td><?php echo $bills['cr_days']; ?></td>
                            <!-- <td><?php echo $bills['bill_item']; ?></td> -->
                            <!-- <td><?php echo $bills['qty']; ?></td> -->
                            <td><?php echo $bills['price']; ?></td>
                            <td><?php echo date('Y-m-d',strtotime($bills['bill_date'] . " + " . $bills['days']."days"))?></td>
                            <!-- <td><?php echo $bills['tax']; ?></td>-->
                            <td><?php echo $bills['tax_amt']; ?></td>
                            <td><?php echo $bills['total_amt']; ?></td> 
                            <!-- <td><?php echo $bills['remarks']; ?></td> -->
                            <td>
                                <!-- <a href="<?php echo site_url('Bills/edit/' . $bills['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a> -->
                                <a href="<?php echo site_url('Bills/remove/' . $bills['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
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