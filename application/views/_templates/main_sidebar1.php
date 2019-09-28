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

    <!-- Layouts -->
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
        <li class="sidenav-item <?php if ($this->uri->segment(2) == "Termination_Letter") {echo "active";}?>">
          <a href="<?php echo site_url('Employee/Termination_Letter'); ?>" class="sidenav-link">
            <div>Termination Letter</div>
          </a>
        </li>
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

  <?php

  } else {?>
    <!-- Dashboards -->
    <li class="sidenav-item <?php if ($this->uri->segment(1) == "") {echo "active";}?>">
        <a href="<?php echo site_url('/'); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-md-speedometer"></i>
          <div>Dashboards</div>
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
      <li class="sidenav-item">
        <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-business"></i>
          <div>Office</div>
        </a>

        <ul class="sidenav-menu">
          <li class="sidenav-item">
            <a href="forms_layouts.html" class="sidenav-link">
              <div>Internal Memo</div>
            </a>
          </li>
          <li class="sidenav-item">
            <a href="forms_controls.html" class="sidenav-link">
              <div>MOM</div>
            </a>
          </li>
          <li class="sidenav-item">
            <a href="forms_custom-controls.html" class="sidenav-link">
              <div>Holiday List</div>
            </a>
          </li>
          <li class="sidenav-item">
            <a href="forms_input-groups.html" class="sidenav-link">
              <div>HR Policy</div>
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
          <li class="sidenav-item">
            <a href="<?php echo site_url('Leave/apply'); ?>" class="sidenav-link">
              <div>Leave Form</div>
            </a>
          </li>
          <li class="sidenav-item">
            <a href="<?php echo site_url('Leave/history'); ?>" class="sidenav-link">
              <div>Applied Leaves</div>
            </a>
          </li>

        </ul>
      </li>

    <?php
  }?>

      <!-- Site Management -->
<li class="sidenav-item <?php if ($this->uri->segment(1) == "Type" || $this->uri->segment(1) == "Hr_policy") {echo "open active";}?>">
      <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon fas fa-cogs"></i>
        <div>Site Management</div>
      </a>

      <ul class="sidenav-menu">
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Type") {echo "active";}?>">
          <a href="<?php echo site_url('SiteVisit'); ?>" class="sidenav-link">
            <div>Site Visit</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Status") {echo "active";}?>">
          <a href="<?php echo site_url('SiteVisitPics'); ?>" class="sidenav-link">
            <div>Site Visit Pictures</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "Stage") {echo "active";}?>">
          <a href="<?php echo site_url('Prj_site_measurements'); ?>" class="sidenav-link">
            <div>Site Measurements</div>
          </a>
        </li>

      </ul>
    </li>

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
    <!--Project Design-->  
    <li class="sidenav-item <?php if ($this->uri->segment(1) == "project_design") {echo "open active";}?>" >
      <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-paper"></i>
        <div>Design</div>
      </a>

      <ul class="sidenav-menu">
        <li class="sidenav-item <?php if ($this->uri->segment(2) == "types") {echo "active";}?>">
          <a href="<?php echo site_url('Prj_dsg_stage'); ?>" class="sidenav-link">
            <div>Stages Config</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "categories" && $this->uri->segment(2) == "") {echo "active";}?>">
          <a href="<?php echo site_url('Prj_dsg_concept'); ?>" class="sidenav-link">
            <div>Concept</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "categories" && $this->uri->segment(2) == "") {echo "active";}?>">
          <a href="<?php echo site_url('Prj_dsg_render'); ?>" class="sidenav-link">
            <div>Render</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "categories" && $this->uri->segment(2) == "") {echo "active";}?>">
          <a href="<?php echo site_url('Design_layout'); ?>" class="sidenav-link">
            <div>Layout</div>
          </a>
        </li>
        <li class="sidenav-item <?php if ($this->uri->segment(1) == "categories" && $this->uri->segment(2) == "") {echo "active";}?>">
          <a href="<?php echo site_url('Design_ddrawings'); ?>" class="sidenav-link">
            <div>Detailed Drawings</div>
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


  </ul>
</div>
<!-- / Layout sidenav -->

