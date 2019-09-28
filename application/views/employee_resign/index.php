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
 <div class="box-tools"><a href="<?php echo site_url('Employee_resign/add'); ?>" class="tn btn-success btn-sm float-right mb-2">Add</a> </div>
<table class="datatables-demo table table-striped table-bordered">
    <thead>
    <tr>
		<th>Sno</th>
		<th>Employee Id</th>
		<th>Name</th>
		<th>Resign Date</th>
		<th>Resign Reason</th>
		<th>Actions</th>
    </tr>
    </thead>
	<?php foreach($employee_resign as $e){ ?>
    <tr>
		<td><?php echo $e['id']; ?></td>
		<td><?php echo $e['empId']; ?></td>
		<td><?php echo $e['empName']; ?></td>
		<td><?php echo date("d-m-Y",strtotime($e['resign_date'])); ?></td>
		<td><?php echo $e['resign_reason']; ?></td>
		<td>
            <a href="<?php echo site_url('employee_resign/edit/'.$e['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a> 
            <a href="<?php echo site_url('employee_resign/remove/'.$e['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
			<a title="Resignation Letter" target='_blank' href="<?php echo site_url('Createpdf/generateReleavingPDF/' . $e['id']); ?>" class="btn btn-primary btn-xs mr-1"><span class="fas fa-print"></span></a>
        </td>
    </tr>
	<?php } ?>
</table>

</div>
</div>
</div>
</div>
</div>