<!-- Layout content -->
<div class="layout-content">

    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">

        <h4 class="font-weight-bold py-3 mb-4">
            <span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
            <?php echo $breadcrumb; ?>
        </h4>

        <div class="box card">
            <div class="card-body">
                <div class="box-body card-datatable">
                    <div class="box-tools">
                        <a href="<?php echo site_url('MOM/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($moms as $mom) {?>
                        <tr>
                            <td><?php echo $mom['meeting_id']; ?></td>
                            <td><?php echo $mom['meeting_date']; ?></td>
                            <td><?php echo $mom['title']; ?></td>
                            <td><?php echo $mom['location']; ?></td>
                            <td>
                                <a href="<?php echo site_url('MOM/edit/' . $mom['id']); ?>" class="btn btn-info btn-xs mr-1" title="Edit"><span class="fa fa-edit" ></span></a>
                                <!-- <a href="<?php echo site_url('MOM/remove/' . $mom['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a> -->
                                <!-- <a href="<?php echo site_url('MOM/remove/' . $mom['id']); ?>" class="btn btn-warning btn-xs mr-1" title="send mails"><span class="fas fa-mail-bulk"></span></a>
                                <a target="_blank" href="<?php echo site_url('Createpdf/generateMEMOPDF/' . $mom['id']); ?>" class="btn btn-danger btn-xs" title="Generate Internal MOM"><span class="fas fa-print"></span></a>
 -->
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>   
            </div>
        </div>
</div>
<!-- / Content -->