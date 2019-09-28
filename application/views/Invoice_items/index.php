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
                    <a href="<?php echo site_url('Invoice_items/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Items names</th>
                            <th>Price</th>
                            <th>Quality</th>
                            <th>Action</th>
                        </tr>
                       </thead>
             <tbody>
                    <?php foreach($inv as $d) {?>
                        <tr>
                            <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['item_name']; ?></td>
                            <td><?php echo $d['price']; ?></td>
                            <td><?php echo $d['quality']; ?></td>

                                <td>
                                    <a href="<?php echo site_url('Invoice_items/edit/' .$d['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                     <a href="<?php echo site_url('Invoice_items/delete/'.$d['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td> 
                            </tr>         
                             <?php } ?>
                    </tbody>
                
            </table>
      </div>
     </div>
     </div>
     </div>
  </div>
  
 