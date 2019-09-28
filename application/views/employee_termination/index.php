<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
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
 <div class="box-tools"><a href="<?php echo site_url('Employee_termination/add'); ?>" class="tn btn-success btn-sm float-right mb-2">Add</a> </div>
<table class="datatables-demo table table-striped table-bordered">
    <thead>
    <tr>
		<th>Sno</th>
		<th>Employee Id</th>
		<th>Name</th>
		<th>Termination Date</th>
		<th>Termination Reason</th>
		<th>Actions</th>
    </tr>
    </thead>
	<?php foreach($employee_termination as $e){ ?>
    <tr>
		<td><?php echo $e['id']; ?></td>
		<td><?php echo $e['empId']; ?></td>
		<td><?php echo $e['empName']; ?></td>
		<td><?php echo date("d-m-Y",strtotime($e['termination_date'])); ?></td>
		<td><?php echo $e['termination_reason']; ?></td>
		<td>
            <a title="Edit" href="<?php echo site_url('Employee_termination/edit/'.$e['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a> 
            <a title="Delete" href="<?php echo site_url('Employee_termination/remove/'.$e['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
			<a title="Generate letter" target='_blank' href="<?php echo site_url('Createpdf/generateReleavingPDF/' . $e['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fas fa-print"></span></a>
		</td>
    </tr>
	<?php } ?>
</table>

</div>
</div>
</div>
</div>
</div>