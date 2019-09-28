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
                <div class="box-body card-datatable" style="overflow-x:auto">
                    <div class="box-tools">
                        <a href="<?php echo site_url('MaterialSpecification/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>
                    <table class="datatables-demo table table-striped table-bordered" >
                        <thead >
                        <tr>
                            <th>Id</th>
                            <th>Project Name</th>
                            <th>Material Category</th>
                            <th>Material Item</th>
                            <th>Design Image</th>
                            <th>Actual Image</th>
                            <th>Details</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Supplier</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($MaterialSpecification as $d) {?>
                        <tr>
                            <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['name']; ?></td>
                            <td><?php echo $d['material_category']; ?></td>
                            <td><?php echo $d['material_name']; ?></td>
                            <td><a href="<?php echo site_url('MaterialSpecification/image_view1/'.$d['id']);?>"><?php echo $d['material_design_image']; ?></a></td>
                            <td><a href="<?php echo site_url('MaterialSpecification/image_view/'.$d['id']);?>"><?php echo $d['material_actual_image']; ?></a></td>
                            <td><?php echo $d['details']; ?></td>
                            <td><?php echo $d['quantity']; ?></td>
                            <td><?php echo $d['price']; ?></td>
                            <td><?php echo $d['supplier_name']; ?></td>

                            <td>
                                <a href="<?php echo site_url('MaterialSpecification/edit/' . $d['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('MaterialSpecification/remove/' . $d['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>   
            </div>
        </div>
</div>
<!-- / Content -->