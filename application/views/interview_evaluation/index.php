<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
		<div id="display_message"></div>
			<div class="box-tools">
				<a href="<?php echo site_url('/'); ?>Interview_evaluation/add" class="btn btn-success btn-sm float-right mb-2">Add</a> 
			</div>
			<table class="datatables-demo table table-striped table-bordered">
				<thead>
				<tr>
				<th width="5%">#</th>					
					<th width="15%">Candidate Name</th>
					<th width="15%">Job Title</th>
					<th width="10%">Name Of Interviewer</th>
					<th width="10%">Result</th>		
					<th width="10%">Date Of Interview</th>
					<th width="10%">Status</th>
					<th width="15%">Actions</th>
				</tr>
				</thead>
				<tbody>
				<?php $sno=1; foreach($interview_evaluation as $i){ ?>
				<tr>
					<th><?php echo $sno++;?></th>					
					<td><?php echo $i['candidate_name']; ?></td>
					<td><?php echo $i['job_title']; ?></td>
					<td><?php echo $i['name_of_interviewer']; ?></td>
					<td>
						<?php $total = $i['job_knowledge']+$i['maturity']+$i['experience']+$i['resilience']+$i['leadership']+$i['communication']+$i['motivation']+$i['intelligence']+$i['personality'];
						$avg = $total/9;
						if($avg==5)
							echo "Excellent";
						else if($avg <5 && $avg >=4)
							echo "Good";
						else if($avg <4 && $avg >=3)
							echo "Average";
						else if($avg <3 && $avg >=2)
							echo "Satifactory";
						else if($avg <2 && $avg >=1)
							echo "Poor";

						?>
					</td>
					
					<td><?php echo date("d-m-Y",strtotime($i['date_of_interview'])); ?></td>
					<td>
						<select name="interview_status" id="interviewstatus_<?php echo $i['id'];?>" class="interview_status custom-select"> 
							<option value="0" <?php echo ($i['interview_status'] == 0) ? ' selected="selected"' : "";?>>On Hold</option>
							<option value="1" <?php echo ($i['interview_status'] == 1) ? ' selected="selected"' : "";?>>Seleted</option>
							<option value="2" <?php echo ($i['interview_status'] == 2) ? ' selected="selected"' : "";?>>Rejected</option>
						</select> 
					</td>
					<td>
						<a href="<?php echo site_url('Interview_evaluation/edit/'.$i['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-edit" title="Edit"></span> </a> 
						<a href="<?php echo site_url('Interview_evaluation/remove/'.$i['id']); ?>" class="btn btn-danger btn-xs" title="Delete"><span class="fa fa-trash"></span></a>
						<a href="<?php echo site_url('Interview_evaluation/view/'.$i['id']); ?>" class="btn btn-success btn-xs" title="Offer Letter"><span class="far fa-eye"></span> </a>
						</td>
				</tr>
				<?php } ?>
				
				</tbody>
			</table>

		</div>   
	</div>
</div>



</div>
<!-- / Content -->

        