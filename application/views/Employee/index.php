<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-3 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>

		<div class="card">            
            <div class="card-datatable table-responsive">
				<table class="datatables-demo table table-striped table-bordered">
					<thead>
					<tr>
						<th>#</th>
						<th>Employee Id</th>
						<th>Employee Date</th>
						<th>Designation</th>
						<th>Department</th>
						<th>Email</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php $Sno=1; foreach($employee as $i){ ?>
					<tr>
						<th><?php echo $Sno++;?></th>
						<td><?php echo $i['empId']; ?></td>
						<td><?php echo $i['empName']; ?></td>
						<td><?php echo $i['designation']; ?></td>
						<td><?php echo $i['department']; ?></td>
						<td><?php echo $i['email']; ?></td>
						<td>
							<a href="<?php echo site_url('Employee/edit/'.$i['id']); ?>" class="btn btn-info btn-xs"><span class="far fa-edit"></span></a> 
							<a href="<?php echo site_url('Employee/remove/'.$i['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
							<a href="<?php echo site_url('Employee/reset/'.$i['id']); ?>" class="btn btn-warning btn-xs"><span class="fas fa-unlock"></span></a>
							
							<a href="<?php echo site_url('Employee_appriasal/add/'.$i['id']); ?>" class="btn btn-primary btn-xs"><span class="fas fa-star-half-alt"></span></a>
						</td>
					</tr>
					<?php } ?>
					
					</tbody>
				</table>
			</div>
        </div>


<hr class="container-m-nx border-light my-4">


</div>
<!-- / Content -->

        