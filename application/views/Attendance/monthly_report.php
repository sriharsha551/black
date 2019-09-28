<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-1 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>

		<div class="card mb-4">
         <h6 class="card-header">Monthly Report</h6>
			<div class="card-body">
				<div class="box-body row">
                    <div class="form-group col-md-5">
						<label for="from_date" class="form-label">Select Year</label>
						<div class="">
                            <select class="form-control" id="pick_year" name="pick_year">
                                <?php 
                                $current = date("Y");
                                for($i = 1; $i <=10 ; $i++,$current-- )
                                {?>
                                    <option><?php echo $current;?></option>
                                    <?php
                                }?>
                            </select>
							
						</div>
					</div>
				
					
					
					<div class="form-group col-md-2">
                        <label for="" class="form-label"></label>
						<div class="">
							<button type="button" id="get_monthly_report" class="btn btn-success">Submit</button>
						</div>
                    </div>
                </div>
                <div class="box-body row" id="load_report">

                </div>   
			</div>

		</div>
	</div>
</div>
<!-- / Content -->
