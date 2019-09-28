<!-- Layout content -->
<div class="layout-content">

    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">

        <h4 class="font-weight-bold py-2 mb-4">
            <span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
            <?php echo $breadcrumb;?> 
        </h4>
        <!-- <?php print_r($percentage);?> -->
        <div class="box card">
            <div class="card-body">
                <div class="box-body card-datatable">
                    <div class="box-tools">
                        <a href="<?php echo site_url('Project_List/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                       <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Stage</th>
                            <th>Remarks</th>
                            <th>Percentage</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php
                        $itr = 0; 
                        foreach ($projects as $d) {?>
                        <tr>
                            <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['category']; ?></td>
                            <td><?php echo $d['type']?></td>
                            <td><?php echo $d['name']?></td>     
                            <td><?php echo $d['stage_name']?></td> 
                            <td><?php echo $d['remarks']?></td> 
                            <td><?php echo $percentage[$itr]?></td>
                            <td>
                                <a href="<?php echo site_url('Project_List/edit/' . $d['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('Project_List/remove/' . $d['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php
                        $itr++;
                    }?>
                    </table>
                </div>   
            </div>
        </div>
</div>
<!-- / Content -->