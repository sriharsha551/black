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
                    <a href="<?php echo site_url('Suppliers/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL ID</th>
                            <th>CONTACT NUMBER</th>
                            <th>ALTERNATIVE NUMBER</th>
                            <th>ADDRESS</th>
                            <th>LOCATION</th>
                            <th>DELETE STATUS</th>
                           
                        </tr>
                       </thead>
             <tbody>
                    <?php foreach($sup as $d) {?>
                        <tr>
                            <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['name']; ?></td>
                            <td><?php echo $d['email_id']; ?></td>
                            <td><?php echo $d['contact_no_1']; ?></td>
                            <td><?php echo $d['contact_no_2']; ?></td>
                            <td><?php echo $d['address']; ?></td>
                            <td><?php echo $d['location']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('Suppliers/edit/' .$d['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                     <a href="<?php echo site_url('Suppliers/delete/'.$d['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
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
  
 