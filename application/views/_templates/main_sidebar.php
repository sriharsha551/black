<!-- Layout sidenav -->
<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">

  <!-- Brand demo (see assets/css/demo/demo.css) -->
  <div class="app-brand demo">
    <span class="app-brand-logo demo bg-primary">
      <p>P</p>
    </span>
    <a href="index.html" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Purple</a>
    <a href="javascript:void(0)" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
      <i class="ion ion-md-menu align-middle"></i>
    </a>
  </div>

  <div class="sidenav-divider mt-0"></div>

  <!-- Links -->
  <ul class="sidenav-inner py-1">
  <?php if ($this->ion_auth->is_admin()) {?>
    <!-- Dashboards -->
    <li class="sidenav-item <?php if ($this->uri->segment(1) == "") {echo "active";}?>">
      <a href="<?php echo site_url('/'); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-md-speedometer"></i>
        <div>Dashboards</div>
      </a>
    </li> 
    <!-- HR -->
    <li class="sidenav-item <?php if ($this->uri->segment(1) == "Employee" || $this->uri->segment(1) == "Employee_appriasal" || $this->uri->segment(1) == "Employee_resign" || $this->uri->segment(1) == "Employee_termination" || $this->uri->segment(1) == "Interview_evaluation" || $this->uri->segment(1) == "Employee_attendance" || $this->uri->segment(1) == "Memo" || $this->uri->segment(1) == "MOM" || $this->uri->segment(1) == "holiday" || $this->uri->segment(1) == "Hr_policy" || $this->uri->segment(1) == "project" || $this->uri->segment(1) == "Project_List" || $this->uri->segment(1) == "Leave" || $this->uri->segment(1) == "Designation" || $this->uri->segment(1) == "Department" || $this->uri->segment(1) == "Leave_type" || $this->uri->segment(1) == "visitor" || $this->uri->segment(1) == "Type" || $this->uri->segment(1) == "Status" || $this->uri->segment(1) == "Stage" || $this->uri->segment(1) == "Category" || $this->uri->segment(1) == "Prj_Review")  {echo "open active";}?>" >
      <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-people"></i>
        <div>Human Resources</div>
      </a>
      <ul class="sidenav-menu">

         <!-- employee -->
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Employee" || $this->uri->segment(1) == "Employee_appriasal" || $this->uri->segment(1) == "Employee_resign" || $this->uri->segment(1) == "Employee_termination") {echo "open active";}?>" >
          <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-people"></i>
            <div>Employees</div>
          </a>

          <ul class="sidenav-menu">

            <li class="sidenav-item <?php if ($this->uri->segment(2) == "Joining") {echo "active";}?>">
              <a href="<?php echo site_url('Employee/Joining'); ?>" class="sidenav-link">
                <div>Joining Form</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Employee" && ($this->uri->segment(2) == "" || $this->uri->segment(2) == "edit")) {echo "active";}?>">
              <a href="<?php echo site_url('Employee'); ?>" class="sidenav-link">
                <div> Employees</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Employee_appriasal") {echo "active";}?>">
              <a href="<?php echo site_url('Employee_appriasal'); ?>" class="sidenav-link">
                <div>Performance Appraisal</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Employee_resign") {echo "active";}?>">
              <a href="<?php echo site_url('Employee_resign'); ?>" class="sidenav-link">
                <div>Resignation</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Employee_termination") {echo "active";}?>">
              <a href="<?php echo site_url('Employee_termination'); ?>" class="sidenav-link">
                <div>Termination</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(2) == "Certificate" || $this->uri->segment(2) == "Certificate_Update") {echo "active";}?>">
              <a href="<?php echo site_url('Employee/Certificate'); ?>" class="sidenav-link">
                <div>Certificate Receipt</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(2) == "Offer_Letter") {echo "active";}?>">
              <a href="<?php echo site_url('Employee/Offer_Letter'); ?>" class="sidenav-link">
                <div>Offer Letter</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(2) == "Increment_Letter" || $this->uri->segment(2) == "Increments_list") {echo "active";}?>">
              <a href="<?php echo site_url('Employee/Increments_list'); ?>" class="sidenav-link">
                <div>Increment Letter</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(2) == "Appraisal_Letter" || $this->uri->segment(2) == "Appraisal_list") {echo "active";}?>">
              <a href="<?php echo site_url('Employee/Appraisal_list'); ?>" class="sidenav-link">
                <div>Appraisal Letter</div>
              </a>
            </li>
            
            <li class="sidenav-item <?php if ($this->uri->segment(2) == "Experience_Letter") {echo "active";}?>">
              <a href="<?php echo site_url('Employee/Experience_Letter'); ?>" class="sidenav-link">
                <div>Experience Letter</div>
              </a>
            </li>
            <!-- <li class="sidenav-item <?php if ($this->uri->segment(2) == "Termination_Letter") {echo "active";}?>">
              <a href="<?php echo site_url('Employee/Termination_Letter'); ?>" class="sidenav-link">
                <div>Termination Letter</div>
              </a>
            </li> -->
          </ul>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Interview_evaluation") {echo "active";}?>">
          <a href="<?php echo site_url('Interview_evaluation'); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-ios-person-add d-block"></i>
            <div>Interview Evalution</div>
          </a>
        </li>

        <!-- Attendance -->
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Employee_attendance") {echo "open active";}?>">
          <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-eye"></i>
            <div>Attendance</div>
          </a>

          <ul class="sidenav-menu">
            <li class="sidenav-item <?php if ($this->uri->segment(2) == "TakeAttendance") {echo "active";}?>">
              <a href="<?php echo site_url('Employee_attendance/TakeAttendance'); ?>" class="sidenav-link">
                <div>Take Attendance</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(2) == "CheckAttendance") {echo "active";}?>">
              <a href="<?php echo site_url('Employee_attendance/CheckAttendance'); ?>" class="sidenav-link">
                <div>Daily Attendance Report</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(2) == "DailyReport") {echo "active";}?>">
              <a href="<?php echo site_url('Employee_attendance/DailyReport'); ?>" class="sidenav-link">
                <div>Monthly Attendance Report</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(2) == "MonthlyReport") {echo "active";}?>">
              <a href="<?php echo site_url('Employee_attendance/MonthlyReport'); ?>" class="sidenav-link">
                <div>Overall Attendance Report</div>
              </a>
            </li>

          </ul>
        </li>

        <!-- Office -->
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Memo" || $this->uri->segment(1) == "Hr_policy" || $this->uri->segment(1) == "MOM") {echo "open active";}?>">
          <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-business"></i>
            <div>Office</div>
          </a>

          <ul class="sidenav-menu">
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Memo") {echo "active";}?>">
              <a href="<?php echo site_url('Memo'); ?>" class="sidenav-link">
                <div>Internal Memo</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "MOM") {echo "active";}?>">
              <a href="<?php echo site_url('MOM'); ?>" class="sidenav-link">
                <div>MOM</div>
              </a>
            </li>
            <li class="sidenav-item">
              <a href="<?php echo site_url('holiday'); ?>" class="sidenav-link">
                <div>Holiday List</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Hr_policy") {echo "active";}?>">
              <a href="<?php echo site_url('Hr_policy'); ?>" class="sidenav-link">
                <div>HR Policy</div>
              </a>
            </li>
          </ul>
        </li>

        <!--  Projects -->
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "project" || $this->uri->segment(1) == "Project_List") {echo "open active";}?>">
          <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-md-business"></i>
            <div>Projects</div>
          </a>

          <ul class="sidenav-menu">
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "project" ) {echo "active";}?>">
              <a href="<?php echo site_url('project'); ?>" class="sidenav-link">
                <div>Enquries</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Project_List") {echo "active";}?>">
              <a href="<?php echo site_url('Project_List'); ?>" class="sidenav-link">
                <div>Projects Summary</div>
              </a>
            </li>
            <li class="sidenav-item">
              <a href="tables_datatables.html" class="sidenav-link">
                <div>HR Percentage</div>
              </a>
            </li>
            <li class="sidenav-item">
              <a href="tables_bootstrap-table.html" class="sidenav-link">
                <div>HR Percentage Report</div>
              </a>
            </li>

          </ul>
        </li>

        <!--  Pay roles -->
        <li class="sidenav-item">
          <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-calculator"></i>
            <div>Pay Roles</div>
          </a>

          <ul class="sidenav-menu">
            <li class="sidenav-item">
              <a href="icons_font-awesome.html" class="sidenav-link">
                <div>Employee Salary info</div>
              </a>
            </li>

          </ul>
        </li>

        <!--  Leave Management -->
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Leave") {echo "open active";}?>" >
          <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-paper"></i>
            <div>Leave Management</div>
          </a>

          <ul class="sidenav-menu">
            <li class="sidenav-item <?php if ($this->uri->segment(2) == "apply") {echo "active";}?>">
              <a href="<?php echo site_url('Leave/apply'); ?>" class="sidenav-link">
                <div>Leave Form</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Leave" && $this->uri->segment(2) == "") {echo "active";}?>">
              <a href="<?php echo site_url('Leave'); ?>" class="sidenav-link">
                <div>Applied Leaves</div>
              </a>
            </li>
            <li class="sidenav-item">
              <a href="<?php echo site_url('Leave'); ?>" class="sidenav-link">
                <div>Leave Summary Report</div>
              </a>
            </li>
            <li class="sidenav-item">
              <a href="<?php echo site_url('Leave/Policy'); ?>" class="sidenav-link">
                <div>Leave Policy</div>
              </a>
            </li>
          </ul>
        </li>

        <!--  Settings -->
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Designation" || $this->uri->segment(1) == "Department" || $this->uri->segment(1) == "Leave_type" || $this->uri->segment(1) == "holiday" ||$this->uri->segment(1) == "visitor" ) {echo "open active";}?>" >
          <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon fas fa-tools"></i>
            <div>Settings</div>
          </a>

          <ul class="sidenav-menu">
            <!-- Designation -->
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Designation") {echo "open active";}?>">
              <a href="<?php echo site_url('Designation'); ?>" class="sidenav-link">
                <i class="sidenav-icon ion ion-md-person d-block"></i>
                <div>Designation</div>

              </a>
            </li>

            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Department") {echo "open active";}?>">
              <a href="<?php echo site_url('Department'); ?>" class="sidenav-link"><i class="sidenav-icon oi oi-book d-block"></i>
                <div>Department</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Leave_type") {echo "open active";}?>">
              <a href="<?php echo site_url('Leave_type'); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-ios-calendar d-block"></i>
                <div>Leave Type</div>
              </a>
            </li>
          
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "visitor") {echo "open active";}?>">
              <a href="<?php echo site_url('visitor'); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-md-calendar d-block"></i>
                <div>Visitors</div>
              </a>
            </li>
          </ul>
        </li>

        <!-- Project Settings -->
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Type" || $this->uri->segment(1) == "Status" || $this->uri->segment(1) == "Stage" || $this->uri->segment(1) == "Category" || $this->uri->segment(1) == "Prj_Review") {echo "open active";}?>">
          <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon fas fa-cogs"></i>
            <div>Project Settings</div>
          </a>

          <ul class="sidenav-menu">
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Type") {echo "active";}?>">
              <a href="<?php echo site_url('Type'); ?>" class="sidenav-link">
                <div>Project Type</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Status") {echo "active";}?>">
              <a href="<?php echo site_url('Status'); ?>" class="sidenav-link">
                <div>Project Status</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Stage") {echo "active";}?>">
              <a href="<?php echo site_url('Stage'); ?>" class="sidenav-link">
                <div>Project Stage</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Category") {echo "active";}?>">
              <a href="<?php echo site_url('Category'); ?>" class="sidenav-link">
                <div>Project Category</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Prj_Review") {echo "active";}?>">
              <a href="<?php echo site_url('Prj_Review'); ?>" class="sidenav-link">
                <div>Review Status</div>
              </a>
            </li>

          </ul>
        </li>
      </ul>
    </li>

    <!-- Accounts -->
    <li class="sidenav-item" >
      <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-people"></i>
        <div>Accounts</div>
      </a>
      <ul class="sidenav-menu">

        <li class="sidenav-item <?php if ($this->uri->segment(2) == "Joining") {echo "active";}?>">
          <a href="<?php echo site_url('Employee/Joining'); ?>"class="sidenav-link sidenav-toggle">
            <div>sub1</div>
          </a>
          <ul class="sidenav-menu">

            <li class="sidenav-item <?php if ($this->uri->segment(2) == "Joining") {echo "active";}?>">
              <a href="<?php echo site_url('Employee/Joining'); ?>" class="sidenav-link">
                <div>subsub1</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Employee" && ($this->uri->segment(2) == "" || $this->uri->segment(2) == "edit")) {echo "active";}?>">
              <a href="<?php echo site_url('Employee'); ?>" class="sidenav-link">
                <div>subsub2</div>
              </a>
            </li>
          </ul>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Employee" && ($this->uri->segment(2) == "" || $this->uri->segment(2) == "edit")) {echo "active";}?>">
          <a href="<?php echo site_url('Employee'); ?>" class="sidenav-link">
            <div> sub2</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Account_groups") {echo "open active";}?>">
          <a href="<?php echo site_url('Account_groups'); ?>" class="sidenav-link">
            <div>Account Groups</div>
          </a>
      </li>
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "Account_types") {echo "open active";}?>">
          <a href="<?php echo site_url('Account_types'); ?>" class="sidenav-link">
            <div>Account Types</div>
          </a>
      </li>
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "Account_coa") {echo "open active";}?>">
          <a href="<?php echo site_url('Account_coa'); ?>" class="sidenav-link">
            <div>COA</div>
          </a>
      </li>
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "Credit_days") {echo "open active";}?>">
          <a href="<?php echo site_url('Credit_days'); ?>" class="sidenav-link">
            <div>Credit Days</div>
          </a>
      </li>
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "Account_items") {echo "open active";}?>">
          <a href="<?php echo site_url('Account_items'); ?>" class="sidenav-link">
            <div>Items</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Act_accounts") {echo "open active";}?>">
          <a href="<?php echo site_url('Act_accounts'); ?>" class="sidenav-link">
            <div>Accounts</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Account_customer") {echo "open active";}?>">
          <a href="<?php echo site_url('Account_customer'); ?>" class="sidenav-link">
            <div>Customers</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Invoice_items") {echo "open active";}?>">
          <a href="<?php echo site_url('Invoice_items'); ?>" class="sidenav-link">
            <div>Invoice Items</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Account_inv_status") {echo "open active";}?>">
          <a href="<?php echo site_url('Account_inv_status'); ?>" class="sidenav-link">
            <div>Invoice Status</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Account_payment_method") {echo "open active";}?>">
          <a href="<?php echo site_url('Account_payment_method'); ?>" class="sidenav-link">
            <div>Payment Methods</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Invoice") {echo "open active";}?>">
          <a href="<?php echo site_url('Invoice'); ?>" class="sidenav-link">
            <div>Invoices</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(2) == "Invoice_payments") {echo "open active";}?>">
          <a href="<?php echo site_url('Invoice_payments'); ?>" class="sidenav-link">
            <div>Invoice Payments</div>
          </a>
        </li>  
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Act_purchase_order") {echo "open active";}?>">
          <a href="<?php echo site_url('Act_purchase_order'); ?>" class="sidenav-link">
            <div>Purchased Orders</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Act_bill_status") {echo "open active";}?>">
          <a href="<?php echo site_url('Act_bill_status'); ?>" class="sidenav-link">
            <div>Bill Status</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Bills" && $this->uri->segment(2) == "") {echo "open active";}?>">
          <a href="<?php echo site_url('Bills'); ?>" class="sidenav-link">
            <div>Bills</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Bill_payments" && $this->uri->segment(2) == "") {echo "open active";}?>">
          <a href="<?php echo site_url('Bill_payments'); ?>" class="sidenav-link">
            <div>Bill Payments</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Act_tax") {echo "open active";}?>">
          <a href="<?php echo site_url('Act_tax'); ?>" class="sidenav-link">
            <div>Tax</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Transaction") {echo "open active";}?>">
          <a href="<?php echo site_url('Transaction'); ?>" class="sidenav-link">
            <div>Transactions</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Design -->
    <li class="sidenav-item <?php if (  $this->uri->segment(1) == "SiteVisit" || $this->uri->segment(1) == "SiteVisitPics" || $this->uri->segment(1) == "Prj_site_measurements" || $this->uri->segment(1) == "Prj_dsg_stage" || $this->uri->segment(1) == "Prj_dsg_concept" || $this->uri->segment(1) == "Prj_dsg_render" || $this->uri->segment(1) == "Design_layout" || $this->uri->segment(1) == "Design_ddrawings")  {echo "open active";}?>" >
      <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-people"></i>
        <div>Design</div>
      </a>
      <ul class="sidenav-menu">
        <!-- Site Management -->
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "SiteVisit" || $this->uri->segment(1) == "SiteVisitPics" || $this->uri->segment(1) == "Prj_site_measurements") {echo "open active";}?>">
          <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon fas fa-cogs"></i>
            <div>Site Management</div>
          </a>

          <ul class="sidenav-menu">
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "SiteVisit") {echo "active";}?>">
              <a href="<?php echo site_url('SiteVisit'); ?>" class="sidenav-link">
                <div>Site Visit</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "SiteVisitPics") {echo "active";}?>">
              <a href="<?php echo site_url('SiteVisitPics'); ?>" class="sidenav-link">
                <div>Site Visit Pictures</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Prj_site_measurements") {echo "active";}?>">
              <a href="<?php echo site_url('Prj_site_measurements'); ?>" class="sidenav-link">
                <div>Site Measurements</div>
              </a>
            </li>

          </ul>
        </li>

        <!--Project Design-->  
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Prj_dsg_stage" || $this->uri->segment(1) == "Prj_dsg_concept" || $this->uri->segment(1) == "Prj_dsg_render" || $this->uri->segment(1) == "Design_layout" || $this->uri->segment(1) == "Design_ddrawings") {echo "open active";}?>" >
          <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-paper"></i>
            <div>Design</div>
          </a>

          <ul class="sidenav-menu">
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Prj_dsg_stage") {echo "active";}?>">
              <a href="<?php echo site_url('Prj_dsg_stage'); ?>" class="sidenav-link">
                <div>Stages Config</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Prj_dsg_concept") {echo "active";}?>">
              <a href="<?php echo site_url('Prj_dsg_concept'); ?>" class="sidenav-link">
                <div>Concept</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Prj_dsg_render" ) {echo "active";}?>">
              <a href="<?php echo site_url('Prj_dsg_render'); ?>" class="sidenav-link">
                <div>Render</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Design_layout") {echo "active";}?>">
              <a href="<?php echo site_url('Design_layout'); ?>" class="sidenav-link">
                <div>Layout</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Design_ddrawings" && $this->uri->segment(2) == "") {echo "active";}?>">
              <a href="<?php echo site_url('Design_ddrawings'); ?>" class="sidenav-link">
                <div>Detailed Drawings</div>
              </a>
            </li>
          </ul>
        </li>
        
      </ul>
    </li>

    <!-- Procurement -->
    <li class="sidenav-item <?php if (  $this->uri->segment(1) == "MaterialCategory" || $this->uri->segment(1) == "Suppliers" || $this->uri->segment(1) == "MaterialItems" || $this->uri->segment(1) == "MaterialSpecification" || $this->uri->segment(1) == "Prj_Mtrl_Status" || $this->uri->segment(1) == "Prj_Mtrl_Payment" || $this->uri->segment(1) == "Prj_Mtrl_OrderType" )  {echo "open active";}?>" >
      <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-people"></i>
        <div>Procurement</div>
      </a>
      <ul class="sidenav-menu">

        <!--Material-->
        <li class="sidenav-item <?php if (  $this->uri->segment(1) == "MaterialCategory" || $this->uri->segment(1) == "Suppliers" || $this->uri->segment(1) == "MaterialItems" || $this->uri->segment(1) == "MaterialSpecification" || $this->uri->segment(1) == "Prj_Mtrl_Status" || $this->uri->segment(1) == "Prj_Mtrl_Payment" || $this->uri->segment(1) == "Prj_Mtrl_OrderType" )  {echo "open active";}?>">
          <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-calculator"></i>
            <div>Materials </div>
          </a>

          <ul class="sidenav-menu">
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "MaterialCategory") {echo "active";}?>">
              <a href="<?php echo site_url('MaterialCategory'); ?>" class="sidenav-link">
                <div>Material Category</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Suppliers") {echo "active";}?>">
              <a href="<?php echo site_url('Suppliers'); ?>" class="sidenav-link">
                <div>Suppliers</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "MaterialItems") {echo "active";}?>">
              <a href="<?php echo site_url('MaterialItems'); ?>" class="sidenav-link">
                <div>Material Items</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "MaterialSpecification") {echo "active";}?>">
              <a href="<?php echo site_url('MaterialSpecification'); ?>" class="sidenav-link">
                <div>Material Specifications</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Prj_Mtrl_Status") {echo "active";}?>">
              <a href="<?php echo site_url('Prj_Mtrl_Status'); ?>" class="sidenav-link">
                <div>Material Status</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Prj_Mtrl_Payment") {echo "active";}?>">
              <a href="<?php echo site_url('Prj_Mtrl_Payment'); ?>" class="sidenav-link">
                <div>Material Payment</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Prj_Mtrl_OrderType") {echo "active";}?>">
              <a href="<?php echo site_url('Prj_Mtrl_OrderType'); ?>" class="sidenav-link">
                <div>Material Order Type</div>
              </a>
            </li>

          </ul>
        </li>
      </ul>
    </li>

    <!-- Execution -->
    <li class="sidenav-item" >
      <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-people"></i>
        <div>Execution</div>
      </a>
      <ul class="sidenav-menu">

        <li class="sidenav-item <?php if ($this->uri->segment(2) == "Remaining_Mtrl_Status") {echo "active";}?>">
          <a href="<?php echo site_url('Remaining_Mtrl_Status'); ?>"class="sidenav-link sidenav-toggle">
            <div>Daily Progress Report</div>
          </a>
          <ul class="sidenav-menu">
            
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Trade") {echo "open active";}?>">
              <a href="<?php echo site_url('Trade'); ?>" class="sidenav-link">
                <div>Trade</div>
              </a>
            </li> 

            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Machinary") {echo "open active";}?>">
                <a href="<?php echo site_url('Machinary'); ?>" class="sidenav-link">
                  <div>Machinary</div>
                </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Vendors") {echo "open active";}?>">
                <a href="<?php echo site_url('Vendors'); ?>" class="sidenav-link">
                  <div>Vendors</div>
                </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Area") {echo "open active";}?>">
                <a href="<?php echo site_url('Area'); ?>" class="sidenav-link">
                  <div>Area</div>
                </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Labour_details") {echo "active";}?>">
              <a href="<?php echo site_url('Labour_details'); ?>" class="sidenav-link">
                <div>Labour Details</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Exe_Reamining_Mtrl_Status") {echo "active";}?>">
              <a href="<?php echo site_url('Exe_Remaining_Mtrl_Status'); ?>" class="sidenav-link">
                <div>Remaining Material Status</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Exe_Tools" && ($this->uri->segment(2) == "" || $this->uri->segment(2) == "edit")) {echo "active";}?>">
              <a href="<?php echo site_url('Exe_Tools'); ?>" class="sidenav-link">
                <div>Tools & Tackles</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Exe_Work_Progress" && ($this->uri->segment(2) == "" || $this->uri->segment(2) == "edit")) {echo "active";}?>">
              <a href="<?php echo site_url('Exe_Work_Progress'); ?>" class="sidenav-link">
                <div>Work Progress</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Exe_Mtrl_Request" && ($this->uri->segment(2) == "" || $this->uri->segment(2) == "edit")) {echo "active";}?>">
              <a href="<?php echo site_url('Exe_Mtrl_Request'); ?>" class="sidenav-link">
                <div>Material Request</div>
              </a>
            </li>
            <li class="sidenav-item <?php if ($this->uri->segment(1) == "Account_groups") {echo "open active";}?>">
          <a href="<?php echo site_url('Exe_nextday_schedule'); ?>" class="sidenav-link">
            <div>Execution NextDay Schedule</div>
          </a>
      </li>
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "Account_groups") {echo "open active";}?>">
          <a href="<?php echo site_url('Exe_tools_rent'); ?>" class="sidenav-link">
            <div>Execution Tools Rent</div>
          </a>
      </li>
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "Account_groups") {echo "open active";}?>">
          <a href="<?php echo site_url('Exe_issue'); ?>" class="sidenav-link">
            <div>Execution Issues</div>
          </a>
      </li>
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "Account_groups") {echo "open active";}?>">
          <a href="<?php echo site_url('Exe_client_request'); ?>" class="sidenav-link">
            <div>Execution Client Request</div>
          </a>
      </li>
          </ul>
        </li>
      </ul>
    </li>
  <?php

  } else {
    ?>

    <!-- Dashboards -->
    <li class="sidenav-item <?php if ($this->uri->segment(1) == "") {echo "active";}?>">
      <a href="<?php echo site_url('/'); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-md-speedometer"></i>
        <div>Dashboards</div>
      </a>
    </li>
    <?php
    
    //get department 
    $department = $this->ion_auth->get_department_id(); 
    if($department == 1) //HR - 1
    { ?>
     
      <!-- employee -->
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "Employee" || $this->uri->segment(1) == "Employee_appriasal" || $this->uri->segment(1) == "Employee_resign" || $this->uri->segment(1) == "Employee_termination") {echo "open active";}?>" >
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-people"></i>
          <div>Employees</div>
        </a>

        <ul class="sidenav-menu">

          <li class="sidenav-item <?php if ($this->uri->segment(2) == "Joining") {echo "active";}?>">
            <a href="<?php echo site_url('Employee/Joining'); ?>" class="sidenav-link">
              <div>Joining Form</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Employee" && ($this->uri->segment(2) == "" || $this->uri->segment(2) == "edit")) {echo "active";}?>">
            <a href="<?php echo site_url('Employee'); ?>" class="sidenav-link">
              <div> Employees</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Employee_appriasal") {echo "active";}?>">
            <a href="<?php echo site_url('Employee_appriasal'); ?>" class="sidenav-link">
              <div>Performance Appraisal</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Employee_resign") {echo "active";}?>">
            <a href="<?php echo site_url('Employee_resign'); ?>" class="sidenav-link">
              <div>Resignation</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Employee_termination") {echo "active";}?>">
            <a href="<?php echo site_url('Employee_termination'); ?>" class="sidenav-link">
              <div>Termination</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(2) == "Certificate" || $this->uri->segment(2) == "Certificate_Update") {echo "active";}?>">
            <a href="<?php echo site_url('Employee/Certificate'); ?>" class="sidenav-link">
              <div>Certificate Receipt</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(2) == "Offer_Letter") {echo "active";}?>">
            <a href="<?php echo site_url('Employee/Offer_Letter'); ?>" class="sidenav-link">
              <div>Offer Letter</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(2) == "Increment_Letter" || $this->uri->segment(2) == "Increments_list") {echo "active";}?>">
            <a href="<?php echo site_url('Employee/Increments_list'); ?>" class="sidenav-link">
              <div>Increment Letter</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(2) == "Appraisal_Letter" || $this->uri->segment(2) == "Appraisal_list") {echo "active";}?>">
            <a href="<?php echo site_url('Employee/Appraisal_list'); ?>" class="sidenav-link">
              <div>Appraisal Letter</div>
            </a>
          </li>
          
          <li class="sidenav-item <?php if ($this->uri->segment(2) == "Experience_Letter") {echo "active";}?>">
            <a href="<?php echo site_url('Employee/Experience_Letter'); ?>" class="sidenav-link">
              <div>Experience Letter</div>
            </a>
          </li>
          <!-- <li class="sidenav-item <?php if ($this->uri->segment(2) == "Termination_Letter") {echo "active";}?>">
            <a href="<?php echo site_url('Employee/Termination_Letter'); ?>" class="sidenav-link">
              <div>Termination Letter</div>
            </a>
          </li> -->
        </ul>
      </li>
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "Interview_evaluation") {echo "active";}?>">
        <a href="<?php echo site_url('Interview_evaluation'); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-ios-person-add d-block"></i>
          <div>Interview Evalution</div>
        </a>
      </li>

      <!-- Attendance -->
      <li class="sidenav-item">
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-eye"></i>
          <div>Attendance</div>
        </a>

        <ul class="sidenav-menu">
          <li class="sidenav-item">
            <a href="ui_buttons.html" class="sidenav-link">
              <div>Take Attendance</div>
            </a>
          </li>
          <li class="sidenav-item">
            <a href="ui_badges.html" class="sidenav-link">
              <div>Daily Attendance Report</div>
            </a>
          </li>
          <li class="sidenav-item">
            <a href="ui_button-groups.html" class="sidenav-link">
              <div>Monthly Attendance Report</div>
            </a>
          </li>

        </ul>
      </li>

      <!-- Office -->
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "Memo" || $this->uri->segment(1) == "Hr_policy") {echo "open active";}?>">
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-business"></i>
          <div>Office</div>
        </a>

        <ul class="sidenav-menu">
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Memo") {echo "active";}?>">
            <a href="<?php echo site_url('Memo'); ?>" class="sidenav-link">
              <div>Internal Memo</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "MOM") {echo "active";}?>">
            <a href="<?php echo site_url('MOM'); ?>" class="sidenav-link">
              <div>MOM</div>
            </a>
          </li>
          <li class="sidenav-item">
            <a href="<?php echo site_url('holiday'); ?>" class="sidenav-link">
              <div>Holiday List</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Hr_policy") {echo "active";}?>">
            <a href="<?php echo site_url('Hr_policy'); ?>" class="sidenav-link">
              <div>HR Policy</div>
            </a>
          </li>
        </ul>
      </li>

      <!--  Projects -->
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "project") {echo "open active";}?>">
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-md-business"></i>
          <div>Projects</div>
        </a>

        <ul class="sidenav-menu">
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "project" || $this->uri->segment(2) == "") {echo "active";}?>">
            <a href="<?php echo site_url('project'); ?>" class="sidenav-link">
              <div>Enquries</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Project_List") {echo "active";}?>">
            <a href="<?php echo site_url('Project_List'); ?>" class="sidenav-link">
              <div>Projects Summary</div>
            </a>
          </li>
          <li class="sidenav-item">
            <a href="tables_datatables.html" class="sidenav-link">
              <div>HR Percentage</div>
            </a>
          </li>
          <li class="sidenav-item">
            <a href="tables_bootstrap-table.html" class="sidenav-link">
              <div>HR Percentage Report</div>
            </a>
          </li>

        </ul>
      </li>

      <!--  Pay roles -->
      <li class="sidenav-item">
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-calculator"></i>
          <div>Pay Roles</div>
        </a>

        <ul class="sidenav-menu">
          <li class="sidenav-item">
            <a href="icons_font-awesome.html" class="sidenav-link">
              <div>Employee Salary info</div>
            </a>
          </li>

        </ul>
      </li>

      <!--  Leave Management -->
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "Leave") {echo "open active";}?>" >
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-paper"></i>
          <div>Leave Management</div>
        </a>

        <ul class="sidenav-menu">
          <li class="sidenav-item <?php if ($this->uri->segment(2) == "apply") {echo "active";}?>">
            <a href="<?php echo site_url('Leave/apply'); ?>" class="sidenav-link">
              <div>Leave Form</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Leave" && $this->uri->segment(2) == "") {echo "active";}?>">
            <a href="<?php echo site_url('Leave'); ?>" class="sidenav-link">
              <div>Applied Leaves</div>
            </a>
          </li>
          <li class="sidenav-item">
            <a href="<?php echo site_url('Leave'); ?>" class="sidenav-link">
              <div>Leave Summary Report</div>
            </a>
          </li>
          <li class="sidenav-item">
            <a href="<?php echo site_url('Leave/Policy'); ?>" class="sidenav-link">
              <div>Leave Policy</div>
            </a>
          </li>
        </ul>
      </li>


      <li class="sidenav-item <?php if ($this->uri->segment(1) == "Designation" || $this->uri->segment(1) == "Department" || $this->uri->segment(1) == "Leave_type" || $this->uri->segment(1) == "holiday" ||$this->uri->segment(1) == "visitor" ) {echo "open active";}?>" >
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon fas fa-tools"></i>
          <div>Settings</div>
        </a>

        <ul class="sidenav-menu">
          <!-- Designation -->
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Designation") {echo "open active";}?>">
            <a href="<?php echo site_url('Designation'); ?>" class="sidenav-link">
              <i class="sidenav-icon ion ion-md-person d-block"></i>
              <div>Designation</div>

            </a>
          </li>

          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Department") {echo "open active";}?>">
            <a href="<?php echo site_url('Department'); ?>" class="sidenav-link"><i class="sidenav-icon oi oi-book d-block"></i>
              <div>Department</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Leave_type") {echo "open active";}?>">
            <a href="<?php echo site_url('Leave_type'); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-ios-calendar d-block"></i>
              <div>Leave Type</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "holiday") {echo "open active";}?>">
            <a href="<?php echo site_url('holiday'); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-md-calendar d-block"></i>
              <div>Holiday List</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "visitor") {echo "open active";}?>">
            <a href="<?php echo site_url('visitor'); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-md-calendar d-block"></i>
              <div>Visitors</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- Project Settings -->
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "Type" || $this->uri->segment(1) == "Hr_policy") {echo "open active";}?>">
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon fas fa-cogs"></i>
          <div>Project Settings</div>
        </a>

        <ul class="sidenav-menu">
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Type") {echo "active";}?>">
            <a href="<?php echo site_url('Type'); ?>" class="sidenav-link">
              <div>Project Type</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Status") {echo "active";}?>">
            <a href="<?php echo site_url('Status'); ?>" class="sidenav-link">
              <div>Project Status</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Stage") {echo "active";}?>">
            <a href="<?php echo site_url('Stage'); ?>" class="sidenav-link">
              <div>Project Stage</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Category") {echo "active";}?>">
            <a href="<?php echo site_url('Category'); ?>" class="sidenav-link">
              <div>Project Category</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Review Status") {echo "active";}?>">
            <a href="<?php echo site_url('Prj_Review'); ?>" class="sidenav-link">
              <div>Review Status</div>
            </a>
          </li>

        </ul>
      </li>
      <?php
    }
    else if($department == 2) //Accounts - 2
    { ?>


      <?php
    }
    else if($department == 3) //Design - 3
    { ?>
      <!-- Site Management -->
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "SiteVisit" || $this->uri->segment(1) == "SiteVisitPics" || $this->uri->segment(1) == "Prj_site_measurements") {echo "open active";}?>">
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon fas fa-cogs"></i>
          <div>Site Management</div>
        </a>

        <ul class="sidenav-menu">
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "SiteVisit") {echo "active";}?>">
            <a href="<?php echo site_url('SiteVisit'); ?>" class="sidenav-link">
              <div>Site Visit</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "SiteVisitPics") {echo "active";}?>">
            <a href="<?php echo site_url('SiteVisitPics'); ?>" class="sidenav-link">
              <div>Site Visit Pictures</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Prj_site_measurements") {echo "active";}?>">
            <a href="<?php echo site_url('Prj_site_measurements'); ?>" class="sidenav-link">
              <div>Site Measurements</div>
            </a>
          </li>

        </ul>
      </li>

      <!--Project Design-->  
      <li class="sidenav-item <?php if ($this->uri->segment(1) == "Prj_dsg_stage" || $this->uri->segment(1) == "Prj_dsg_concept" || $this->uri->segment(1) == "Prj_dsg_render" || $this->uri->segment(1) == "Design_layout" || $this->uri->segment(1) == "Design_ddrawings") {echo "open active";}?>" >
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-paper"></i>
          <div>Design</div>
        </a>

        <ul class="sidenav-menu">
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Prj_dsg_stage") {echo "active";}?>">
            <a href="<?php echo site_url('Prj_dsg_stage'); ?>" class="sidenav-link">
              <div>Stages Config</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Prj_dsg_concept") {echo "active";}?>">
            <a href="<?php echo site_url('Prj_dsg_concept'); ?>" class="sidenav-link">
              <div>Concept</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Prj_dsg_render" ) {echo "active";}?>">
            <a href="<?php echo site_url('Prj_dsg_render'); ?>" class="sidenav-link">
              <div>Render</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Design_layout") {echo "active";}?>">
            <a href="<?php echo site_url('Design_layout'); ?>" class="sidenav-link">
              <div>Layout</div>
            </a>
          </li>
          <li class="sidenav-item <?php if ($this->uri->segment(1) == "Design_ddrawings" && $this->uri->segment(2) == "") {echo "active";}?>">
            <a href="<?php echo site_url('Design_ddrawings'); ?>" class="sidenav-link">
              <div>Detailed Drawings</div>
            </a>
          </li>
        </ul>
      </li>
      <?php
    }
    else if($department == 4) //Procurement - 4
    { ?>
      <!--Material-->
      <li class="sidenav-item">
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-calculator"></i>
          <div>Materials </div>
        </a>

        <ul class="sidenav-menu">
          <li class="sidenav-item ">
            <a href="<?php echo site_url('MaterialCategory'); ?>" class="sidenav-link">
              <div>Material Category</div>
            </a>
          </li>
          <li class="sidenav-item ">
            <a href="<?php echo site_url('Suppliers'); ?>" class="sidenav-link">
              <div>Suppliers</div>
            </a>
          </li>
          <li class="sidenav-item ">
            <a href="<?php echo site_url('MaterialItems'); ?>" class="sidenav-link">
              <div>Material Items</div>
            </a>
          </li>
          <li class="sidenav-item ">
            <a href="<?php echo site_url('MaterialSpecification'); ?>" class="sidenav-link">
              <div>Material Specifications</div>
            </a>
          </li>
          <li class="sidenav-item ">
            <a href="<?php echo site_url('Prj_Mtrl_Status'); ?>" class="sidenav-link">
              <div>Material Status</div>
            </a>
          </li>
          <li class="sidenav-item ">
            <a href="<?php echo site_url('Prj_Mtrl_Payment'); ?>" class="sidenav-link">
              <div>Material Payment</div>
            </a>
          </li>
          <li class="sidenav-item ">
            <a href="<?php echo site_url('Prj_Mtrl_OrderType'); ?>" class="sidenav-link">
              <div>Material Order Type</div>
            </a>
          </li>

        </ul>
      </li>
      <?php
    }
    else if($department == 5) //Executive - 5
    {

    }
    ?>

    <!--  Leave Management -->
    <li class="sidenav-item <?php if ($this->uri->segment(1) == "Leave") {echo "open active";}?>" >
      <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-paper"></i>
        <div>Leave Management</div>
      </a>

      <ul class="sidenav-menu">
        <li class="sidenav-item">
          <a href="<?php echo site_url('Leave/apply'); ?>" class="sidenav-link">
            <div>Leave Form</div>
          </a>
        </li>
        <li class="sidenav-item">
          <a href="<?php echo site_url('Leave/index'); ?>" class="sidenav-link">
            <div>Applied Leaves</div>
          </a>
        </li>
      </ul>
    </li>

    <?php
  }?>
  </ul>
</div>
<!-- / Layout sidenav -->

