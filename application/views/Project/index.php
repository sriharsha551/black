<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-1 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>
        <div class="box card">
			<div class="card-body">
				<div class="box-body card-datatable">
					<div class="box-tools">
                    <a href="<?php echo site_url('project/add'); ?>" class="btn btn-success btn-sm float-right mb-2">Add</a>  
					</div>
                    <table class="datatables-demo table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        
                        <th>Project</th>
                        <th>Client</th>
                        <th>Place</th>
                        <th>Enquiry No</th>
                        <th>Project No</th>
                        <th>Mobile1</th>
                        
                        <th>Project Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <?php foreach($projects as $p){ ?>
                    <tr>
                        <td><?php echo $p['id']; ?></td>
                        
                        <td><?php echo $p['project']; ?></td>
                        <td><?php echo $p['client']; ?></td>
                        <td><?php echo $p['place']; ?></td>
                        <td><?php echo $p['enquiry_no']; ?></td>
                        <td><?php echo $p['project_no']; ?></td>
                        <td><?php echo $p['mobile1']; ?></td>
                        
                        <td><?php echo date("d-m-Y",strtotime($p['project_date'])); ?></td>
                        <td><?php if($p['status']==0) echo "On hold"; else if($p['status']==1) echo "On process"; else if($p['status']==2) echo "completed"; else if($p['status']==3) echo "cancelled"; ?></td>
                        <td>
                            <a href="<?php echo site_url('project/edit/'.$p['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a> 
                            <a href="<?php echo site_url('project/view/'.$p['id']); ?>" class="btn btn-success btn-xs mr-1"><span class="fa fa-eye"></span></a>
                            <a href="<?php echo site_url('project/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>


              
			</div>
		</div>
	</div>


</div>
<!-- / Content -->