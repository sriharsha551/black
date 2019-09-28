<!-- Layout content -->
<div class="layout-content">

    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">

        <h4 class="font-weight-bold py-2 mb-4">
            <span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
            <?php echo $breadcrumb; ?>
            <?php
                $GLOBALS['category_id'] = null;
                if(isset($_SESSION['visit_filter_id']))
                {
                    $GLOBALS['category_id'] = $_SESSION['visit_filter_id'];
                    unset($_SESSION['visit_filter_id']);
                }
                if(isset($_POST['category_id']))
                {
                   
                    $GLOBALS['category_id'] = $_POST['category_id'];
                }
            ?>
        </h4>

        <div class="box card">
            <div class="card-body">
            <form action="" method="post" name="prj_form">
                <div class="col-md-6">
						<label for="category_id" class="form-label"><span class="text-danger"></span>Category Filter</label>
						<div class='form-group'>
						<select class="form-control" name="category_id" onchange="this.form.submit()" >
							<option value=''>select name</option>
							<?php foreach($MATERIALS as $row) {?>
                                <option value='<?php echo $row['id']?>' <?php echo ($row['id'] == $GLOBALS['category_id']) ? 'selected="selected"' : "" ?> ><?php echo $row['material_category']?></option>
							<?php }?>
						</select>
						</div>
				</div>
            </form>
                <div class="box-body card-datatable">
                    <div class="box-tools">
                        <a href="<?php echo site_url('MaterialItems/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <?$_POST['category_id']==''?>
                        <tr>
                            <th>ID</th>
                            <th>Material Category</th>
                            <th>Material Name</th>
                            <th>Price</th>
                            <th>Dimensions</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                            <th>REMARKS</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($MaterialItems as $d) {
                            if($d['material_cat_id'] == $GLOBALS['category_id']){?>
                        <tr>
                            <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['material_category']; ?></td>
                            <td><?php echo $d['material_name']; ?></td>
                            <td><?php echo $d['price']; ?></td>
                            <td><?php echo $d['dimensions']; ?></td>
                            <td><?php echo $d['qty'];?></td>
                            <td><?php echo $d['name'];?></td>
                            <td><?php echo $d['remarks']; ?></td>
                            <td>
                                <a href="<?php echo site_url('MaterialItems/edit/' . $d['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('MaterialItems/remove/' . $d['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                            <?php }
                        else{?>
                        <tr>
                        <td><?php echo $d['id']; ?></td>
                        <td><?php echo $d['material_category']; ?></td>
                        <td><?php echo $d['material_name']; ?></td>
                        <td><?php echo $d['price']; ?></td>
                        <td><?php echo $d['dimensions']; ?></td>
                        <td><?php echo $d['qty'];?></td>
                        <td><?php echo $d['name'];?></td>
                        <td><?php echo $d['remarks']; ?></td>
                        <td>
                            <a href="<?php echo site_url('MaterialItems/edit/' . $d['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                            <a href="<?php echo site_url('MaterialItems/remove/' . $d['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                        <?php }    
                        }?>
                    </table>
                </div>   
            </div>
        </div>
</div>
<!-- / Content -->