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
            <div class="message"><?php echo $this->session->flashdata('message'); ?></div>
                <div class="box-body card-datatable">
                    <div class="box-tools">
                        <a href="<?php echo site_url('Memo/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($memos as $memo) {?>
                        <tr>
                            <td><?php echo $memo['memo_id']; ?></td>
                            <td><?php echo $memo['memo_date']; ?></td>
                            <td><?php echo $memo['memo_type']; ?></td>
                            <td><?php echo $memo['memo_name']; ?></td>
                            <td>
                                <a href="<?php echo site_url('Memo/edit/' . $memo['id']); ?>" class="btn btn-info btn-xs mr-1" title="Edit"><span class="fa fa-edit" ></span></a>
                                <!-- <a href="<?php echo site_url('Memo/remove/' . $memo['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a> -->
                                <a href="<?php echo site_url('Memo/sendmail/' . $memo['id']); ?>" class="btn btn-warning btn-xs mr-1" title="send mails"><span class="fas fa-mail-bulk"></span></a>
                                <a target="_blank" href="<?php echo site_url('Createpdf/generateMEMOPDF/' . $memo['id']); ?>" class="btn btn-danger btn-xs" title="Generate Internal Memo"><span class="fas fa-print"></span></a>

                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>   
            </div>
        </div>
</div>
<!-- / Content -->