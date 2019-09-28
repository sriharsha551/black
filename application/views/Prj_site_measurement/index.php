<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-2 mb-4">
            <span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
            <?php echo $breadcrumb; ?>
            <?php
                $GLOBALS['prj_filter_id'] = null;
                if(isset($_SESSION['measurement_filter_id']))
                {
                    $GLOBALS['prj_filter_id'] = $_SESSION['measurement_filter_id'];
                    unset($_SESSION['measurement_filter_id']);
                }
                if(isset($_POST['prj_filter_id']))
                {
                    $GLOBALS['prj_filter_id'] = $_POST['prj_filter_id'];
                }
            ?>
        </h4>

        <div class="box card">
            <div class="card-body">
            <form action="" method="post" name="prj_form">
                <div class="col-md-6">
						<label for="prj_filter_id" class="form-label"><span class="text-danger"></span>Project Filter</label>
						<div class='form-group'>
						<select class="form-control" name="prj_filter_id" onchange="this.form.submit()" >
							<option value=''>select name</option>
							<?php foreach($prj_names as $row) {?>
                                <option value='<?php echo $row['id']?>' <?php echo ($row['id'] == $GLOBALS['prj_filter_id']) ? 'selected="selected"' : "" ?> ><?php echo $row['name']?></option>
							<?php }?>
						</select>
						</div>
				</div>
            </form>
                <div class="box-body card-datatable">
                    <div class="box-tools">
                    <a href="<?php echo site_url('Prj_site_measurements/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Project Name</th>
                            <th>Name</th>
                            <th>Attachments</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                       </thead>
             <tbody>
                    <?php foreach($site as $d) {
                        if($d['prj_id'] == $GLOBALS['prj_filter_id']){?>                  
                        <tr>
                        <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['prj_name']; ?></td>
                            <td><?php echo $d['name']; ?></td>
                            <td><a href="<?php echo site_url('Prj_site_measurements/image_view/'.$d['id']);?>"><?php echo $d['attach_name']; ?></a></td>
                            <td><?php echo $d['remarks']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('Prj_site_measurements/edit/' .$d['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                     <a href="<?php echo site_url('Prj_site_measurements/delete/'.$d['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td> 
                            </tr>         
                            <?php }
                        else{ ?>
                            <tr>
                        <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['prj_name']; ?></td>
                            <td><?php echo $d['name']; ?></td>
                            <td><a href="<?php echo site_url('Prj_site_measurements/image_view/'.$d['id']);?>"><?php echo $d['attach_name']; ?></a></td>
                            <td><?php echo $d['remarks']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('Prj_site_measurements/edit/' .$d['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                     <a href="<?php echo site_url('Prj_site_measurements/delete/'.$d['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td> 
                            </tr>
                        <?php }
                    }?>                                     
                 </tbody>
                
            </table>
      </div>
     </div>
     </div>
     </div>
  </div>
  
 