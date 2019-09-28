<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
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
				<div class="box-header with-border">
					<h3 class="box-title">Policy</h3>
				</div>
                <?php echo form_open('Leave/apply',array("class"=>"form-horizontal")); ?>

              
                

                <?php echo form_close(); ?>


                </div>
			</div>
		</div>
	</div>


</div>
<!-- / Content -->