<!-- joing form -->
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

    <div class="card mb-4">
        <h6 class="card-header">Basic details</h6>
        <div class="card-body">
            <div class=""><?php echo $message;?></div>
            <div class="col-md-12">
            <form action="" method="post" class="row">
                <div class="form-group col-md-6">
                    <label class="form-label">Employee Id</label>
                    <input type="text" class="form-control" placeholder=""name="empId" value="<?php echo $empId;?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Name of the employee</label>
                    <input type="text" class="form-control" placeholder="Email" name="empName" value="" required>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Designation</label>
                    <select class="custom-select" name="Designation" required>
                        <?php foreach($designation as $d){ ?>
                            <option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Department</label>
                    <select class="custom-select" name="Department" required>
                    <?php foreach($department as $d){ ?>
                        <option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
                    <?php } ?>
                    </select>
                </div>
                
                <div class="form-group col-md-6">
                    <label class="form-label">Present Address</label>
                    <textarea class="form-control" placeholder="Present Address" name="presentAddress" id="presentAddress"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label mr-3">Permanent Address</label> <input type="checkbox" id="address_copy"> Same as Present Address
                    <textarea class="form-control" placeholder="Permanent Address" name="permanentAddress" id="permanentAddress"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Contact No</label>
                    <input type="text" class="form-control" placeholder="Employee Phone" name="emp_phone" value="" required>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Email Id</label>
                    <input type="email" class="form-control" placeholder="Email ID" name="email" value="" required>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">I here confirm that i have joined duty on</label>
                    <input type="date" class="form-control" placeholder="Select Date" name="DOJ" value="" required>
                </div>
                
                <div class="col-md-12">
                    <h5 class="card-header col-md-12 mb-3 custom-header">My personal details are as noted below :</h5>

                    
                    <div class="form-group">
                    <label class="form-label mr-4">Gender</label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="gender" value="Male"  id="gender1" >
                            <span class="custom-control-label">Male</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="gender" value="Female"  id="gender2" >
                            <span class="custom-control-label">Female</span>
                        </label>   
                    </div>

                    <label class="form-label">Family Details</label>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Relation</th>
                                <th>Occupation</th>
                                <th>Contact Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="fullName[]" value="" class="form-control" placeholder="Full Name" /></td>
                                <td><input type="text" name="relation[]" value="Father" class="form-control" placeholder="Relation" disabled/></td>
                                <td><input type="text" name="occupation[]" value="" class="form-control" placeholder="Occupation"/></td>
                                <td><input type="text" name="phone[]" value="" class="form-control" placeholder="Mobile Number"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="fullName[]" value="" class="form-control" placeholder="Full Name" /></td>
                                <td><input type="text" name="relation[]" value="Mother" class="form-control" placeholder="Relation" disabled/></td>
                                <td><input type="text" name="occupation[]" value="" class="form-control" placeholder="Occupation"/></td>
                                <td><input type="text" name="phone[]" value="" class="form-control" placeholder="Mobile Number"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="fullName[]" value="" class="form-control" placeholder="Full Name" /></td>
                                <td><input type="text" name="relation[]" value="" class="form-control" placeholder="Relation"/></td>
                                <td><input type="text" name="occupation[]" value="" class="form-control" placeholder="Occupation"/></td>
                                <td><input type="text" name="phone[]" value="" class="form-control" placeholder="Mobile Number"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="fullName[]" value="" class="form-control" placeholder="Full Name" /></td>
                                <td><input type="text" name="relation[]" value="" class="form-control" placeholder="Relation"/></td>
                                <td><input type="text" name="occupation[]" value="" class="form-control" placeholder="Occupation"/></td>
                                <td><input type="text" name="phone[]" value="" class="form-control" placeholder="Mobile Number"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="fullName[]" value="" class="form-control" placeholder="Full Name" /></td>
                                <td><input type="text" name="relation[]" value="" class="form-control" placeholder="Relation"/></td>
                                <td><input type="text" name="occupation[]" value="" class="form-control" placeholder="Occupation"/></td>
                                <td><input type="text" name="phone[]" value="" class="form-control" placeholder="Mobile Number"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="fullName[]" value="" class="form-control" placeholder="Full Name" /></td>
                                <td><input type="text" name="relation[]" value="" class="form-control" placeholder="Relation"/></td>
                                <td><input type="text" name="occupation[]" value="" class="form-control" placeholder="Occupation"/></td>
                                <td><input type="text" name="phone[]" value="" class="form-control" placeholder="Mobile Number"/></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Education Qualification (Start with School leaving certificate or Equivalent)</label>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Qualification</th>
                                <th>University / Institute</th>
                                <th>Year of Passing</th>
                                <th>% of marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="qualification[]" value="" class="form-control" placeholder="Qualification" /></td>
                                <td><input type="text" name="institute[]" value="" class="form-control" placeholder="Institute"/></td>
                                <td><input type="text" name="yearOfPassing[]" value="" class="form-control" placeholder="Year of passing"/></td>
                                <td><input type="text" name="marks[]" value="" class="form-control" placeholder="Total Marks"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="qualification[]" value="" class="form-control" placeholder="Qualification" /></td>
                                <td><input type="text" name="institute[]" value="" class="form-control" placeholder="Institute"/></td>
                                <td><input type="text" name="yearOfPassing[]" value="" class="form-control" placeholder="Year of passing"/></td>
                                <td><input type="text" name="marks[]" value="" class="form-control" placeholder="Total Marks"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="qualification[]" value="" class="form-control" placeholder="Qualification" /></td>
                                <td><input type="text" name="institute[]" value="" class="form-control" placeholder="Institute"/></td>
                                <td><input type="text" name="yearOfPassing[]" value="" class="form-control" placeholder="Year of passing"/></td>
                                <td><input type="text" name="marks[]" value="" class="form-control" placeholder="Total Marks"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="qualification[]" value="" class="form-control" placeholder="Qualification" /></td>
                                <td><input type="text" name="institute[]" value="" class="form-control" placeholder="Institute"/></td>
                                <td><input type="text" name="yearOfPassing[]" value="" class="form-control" placeholder="Year of passing"/></td>
                                <td><input type="text" name="marks[]" value="" class="form-control" placeholder="Total Marks"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="qualification[]" value="" class="form-control" placeholder="Qualification" /></td>
                                <td><input type="text" name="institute[]" value="" class="form-control" placeholder="Institute"/></td>
                                <td><input type="text" name="yearOfPassing[]" value="" class="form-control" placeholder="Year of passing"/></td>
                                <td><input type="text" name="marks[]" value="" class="form-control" placeholder="Total Marks"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="qualification[]" value="" class="form-control" placeholder="Qualification" /></td>
                                <td><input type="text" name="institute[]" value="" class="form-control" placeholder="Institute"/></td>
                                <td><input type="text" name="yearOfPassing[]" value="" class="form-control" placeholder="Year of passing"/></td>
                                <td><input type="text" name="marks[]" value="" class="form-control" placeholder="Total Marks"/></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    <h5 class="card-header col-md-12 mb-3 custom-header">For Administrative Use Only</h5>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Posting Order No.</label>
                    <input type="text" name="PON" value="" class="form-control" placeholder="Posting Order No"/>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Dated :</label>
                    <input type="date" name="POD" value="" class="form-control" placeholder="Posting Order Date"/>
                </div>

                <div class="col-md-12">
                    <h5 class="card-header col-md-12 mb-3 custom-header">Documents Received</h5>   
                </div>     
                <div class="form-group col-md-12">
                    <label class="custom-control custom-checkbox m-0">
                        <input type="checkbox" name="original_certificate" class="custom-control-input"/>
                        <span class="custom-control-label">Original Certificate</span>
                    </label>
                </div>
                <div class="form-group col-md-12">
                    <label class="custom-control custom-checkbox m-0">
                        <input type="checkbox" name="experience_certificate" class="custom-control-input"/>
                        <span class="custom-control-label">Copy of Experience Certificate</span>
                    </label>
                </div>
                <div class="form-group col-md-12">
                    <label class="custom-control custom-checkbox m-0">
                        <input type="checkbox" name="id_proof" class="custom-control-input"/>
                        <span class="custom-control-label">ID Proof</span>
                    </label>
                </div>
                <div class="form-group col-md-12">
                    <label class="custom-control custom-checkbox m-0">
                        <input type="checkbox" name="education_certificate" class="custom-control-input"/>
                        <span class="custom-control-label">Copy of Educational Certificate</span>
                    </label>
                </div>
                <div class="form-group col-md-12">
                    <label class="custom-control custom-checkbox m-0">
                        <input type="checkbox" name="photos" class="custom-control-input"/>
                        <span class="custom-control-label">2 Photographs</span>
                    </label>
                </div>
                <div class="form-group col-md-12">
                    <input type="submit" name="submit" value="submit" class="btn btn-success">
                </div>
            
                </div>
            </div>
        </div>
    </div>
</div>

    

</form>
</div>
<!-- / Content -->
