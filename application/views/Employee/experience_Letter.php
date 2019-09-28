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
						<th>Employee Name</th>						
						<th>Email</th>
                        <th>DOJ</th>
                        <th>Generated</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php $Sno=1; foreach($employee as $i){ ?>
					<tr>
						<th><?php echo $Sno++;?></th>
						<td><?php echo $i['empId']; ?></td>
						<td><?php echo $i['empName']; ?></td>						
						<td><?php echo $i['email']; ?></td>
                        <td><?php echo date("d-m-Y",strtotime($i['DOJ'])); ?></td>
                        <td><?php if($i['offer_letter_generated_on']!="")
                            {
                                echo "<a title='View Experience Letter' target='_blank' href='".base_url()."pdf/experience/experience_".$i['id'].".pdf'>".date("d-m-Y", strtotime($i['experience_letter_generated_on']))."</a>"; 
                            } 
                            else    echo ""; ?></td>
						<td>							
							<a href="<?php echo site_url('Employee/view/'.$i['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fas fa-eye"></span></a>
							<a target="_blank" href="<?php echo site_url('Createpdf/generateExperiencePDF/' . $i['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fas fa-print"></span></a>
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

        