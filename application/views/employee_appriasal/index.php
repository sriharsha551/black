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
					<table class="datatables-demo table table-striped table-bordered">
						<thead>
						<tr>
							<th>ID</th>
							<th>EmpId</th>
							<th>Review Date</th>
							<th>Result</th>
							<th>Actions</th>
						</tr>
						</thead>
						<?php $Sno=1; foreach($employee_appriasal as $e){ ?>
						<tr>
							<td><?php echo $Sno++; ?></td>
							<td><?php echo $e['empId']; ?></td>
							<td><?php echo date('d-m-Y',strtotime($e['review_date'])); ?></td>
							<th>
							<?php $total = $e['attendance']+$e['quality_work']+$e['productivity']+$e['kldg_job']+$e['randa']+$e['initiative']+$e['creativity']+$e['work_rela']+$e['adherence']+$e['org_perform']+$e['overall'];
							$avg = $total/11;							
							
							if($avg == 4)
								echo "Very Good";
							else if($avg <4 && $avg >=3)
								echo "Good";
							else if($avg <3 && $avg >=2)
								echo "Improvement Needed";
							else if($avg <2 && $avg >=1)
								echo "Unsatisfactory";

						?>
							</th>
							<td>
								<a href="<?php echo site_url('Employee_appriasal/edit/'.$e['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit" title="Edit"></span></a> 
								<a href="<?php echo site_url('Employee_appriasal/view/'.$e['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-eye" title="View"></span></a>
								<!-- <a href="<?php echo site_url('employee_appriasal/remove/'.$e['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash" title="Edit"></span></a> -->
								<!-- <a target="_blank" href="<?php echo site_url('Createpdf/generateAppraisalPDF/' . $e['id']); ?>" class="btn btn-danger btn-xs" title="Generate Appriasal Letter"><span class="fas fa-print"></span></a> -->
							</td>
						</tr>
						<?php } ?>
					</table>
					</div>   
            </div>
        </div>                
	</div>
</div>
