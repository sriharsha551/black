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

        <div class="card">            
            <div class="card-datatable table-responsive">
                <table class="datatables-demo table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Id</th>
                            <th width="10%">Name</th>
                            <th width="10%">Original</th>
                            <th width="10%">Exp (copy)</th>
                            <th width="10%">ID Proof</th>
                            <th width="10%">Edu (copy)</th>
                            <th width="10%">2 Photos</th>
                            <th width="10%">Receipt Generated</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $Sno = 1;foreach ($employee as $i) {?>
                    <tr class="odd gradeX">
                        <th><?php echo $Sno++; ?></th>
                        <td><?php echo $i['empId']; ?></td>
                        <td><?php echo $i['empName']; ?></td>
                        <td><?php if ($i['original_certificate'] == "1") {
                                echo '<i class="fas fa-check"></i>';
                            } else {
                                echo '<i class="fas fa-times"></i>';
                            } ?>
                        </td>
                        <td><?php if ($i['experience_certificate'] == "1") {
                                echo '<i class="fas fa-check"></i>';
                            } else {
                                echo '<i class="fas fa-times"></i>';
                            }
                        ?></td>
                        <td><?php if ($i['id_proof'] == "1") {
                            echo '<i class="fas fa-check"></i>';
                        } else {
                            echo '<i class="fas fa-times"></i>';
                        }
                        ?></td>
                        <td><?php if ($i['education_certificate'] == "1") {
                            echo '<i class="fas fa-check"></i>';
                        } else {
                            echo '<i class="fas fa-times"></i>';
                        }
                        ?></td>
                        <td><?php if ($i['photos'] == "1") {
                            echo '<i class="fas fa-check"></i>';
                        } else {
                            echo '<i class="fas fa-times"></i>';
                        }
                        ?></td>
                        <td><?php if($i['certificate_receipt_generated_on']!="")
                            {
                                echo "<a title='View Receipt' target='_blank' href='".base_url()."pdf/certificates/certificate_".$i['id'].".pdf'>".date("d-m-Y", strtotime($i['certificate_receipt_generated_on']))."</a>"; 
                            } 
                            else    echo ""; ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('Employee/Certificate_Update/' . $i['id']); ?>" class="btn btn-info btn-xs mr-1" title='Edit'><span class="far fa-edit"></span></a>
                            <a target="_blank" href="<?php echo site_url('Createpdf/generateCertificatePDF/' . $i['id']); ?>" class="btn btn-danger btn-xs" title="Generate Recipt"><span class="fas fa-print"></span></a>
                        </td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>

<div class="pull-right">
	<?php echo $this->pagination->create_links(); ?>
</div>

<hr class="container-m-nx border-light my-4">


</div>
<!-- / Content -->

