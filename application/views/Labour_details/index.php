<!-- Layout content -->
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
                        <a href="<?php echo site_url('Labour_details/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                     <table class="datatables-demo table table-striped table-bordered">
                
                        <thead>
                        <tr>
                        <col>
                        <colgroup span="2"></colgroup>
                            <th>Id</th>
                            <th>Project</th>
                            <th>Trade</th>
                            <th colspan="2">Hours</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                         <th>general </th>
                         <th>Over time</th>
                         <th></th>
                         <th></th>
                         </tr>
                          

                        </thead>
                        <?php foreach ($labour as $d) {?>
                        <tr>
                            <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['name']; ?></td>
                            <td><?php echo $d['trade_name']; ?></td>
                            <td><?php echo $d['general_time']; ?></td>
                            <td><?php echo $d['over_time']; ?></td>
                            <td><?php echo $d['date']; ?></td>

                            <td>
                                <a href="<?php echo site_url('Labour_details/edit/' . $d['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('Labour_details/remove/' . $d['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>   
            </div>
        </div>
</div>
</div>