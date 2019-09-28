<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
  display: none !important;
}
</style>
<!-- Layout content -->
<div class="layout-content" ng-app="EmpAttendanceApp" ng-controller="EmpAttendanceCtrl" id="EmpAttendanceCtrl">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y" ng-cloak>

		<h4 class="font-weight-bold py-3 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>
        <h4 class="font-weight-bold py-3 mb-4">
        	<span class="text-muted font-weight-light">Today: <?php echo date('Y-m-d');?></span>
        </h4>
        
             <div class="row">
			  <div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-users display-4 text-warning"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Users</div>
                        <div class="text-large">{{total_emps}}</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-checkmark-circle display-4 text-success"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Presents</div>
                        <div class="text-large">{{total_presents}}</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-cross-circle display-4 text-info"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Absents</div>
                        <div class="text-large">{{total_absents}}</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!--<div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-gift display-4 text-danger"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Products</div>
                        <div class="text-large">985</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-users display-4 text-warning"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Users</div>
                        <div class="text-large">105,652</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>-->
            </div>
            	
		<div class="card">
        	            
            <div class="card-datatable table-responsive">
				<table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Emp Id</th>
                            <th>Name</th>
                           <!--  <th>Designation</th> -->
                            <th>Department</th>
                            
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Attendance</th>
                            <th>SignIn</th>
                            <th>SignOut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr ng-repeat="emp in employees">
                            	<td>{{$index+1}}</td>
                                <td>{{emp.empId}}</td>
                                <td>{{emp.empName}}</td>
                              <!--   <td></td> -->
                                <td>{{emp.department}} ({{emp.designation}})</td>
                               
                                <td>{{emp.phone}}</td>
                                <td>
                                	<select ng-model="emp.location" class="custom-select">
                                    	<option value="">--Select--</option>
                                        <option value="office">OFFICE</option>
                                        <option value="outside">OUT SIDE</option>
                                    </select>
                                </td>
                                <td>
                                        <label class="custom-control custom-radio" ng-click="attendanceCounters();">
                                          <input type="radio"  ng-model="emp.take_attendance" class="custom-control-input" value="P">
                                          <span class="custom-control-label">P</span>
                                        </label>
                                        <label class="custom-control custom-radio" ng-click="attendanceCounters();">
                                          <input type="radio"  ng-model="emp.take_attendance"  class="custom-control-input" value="A">
                                          <span class="custom-control-label">A</span>
                                        </label>
                                        <label class="custom-control custom-checkbox" ng-show="emp.take_attendance=='P'">
                                          <input type="checkbox" class="custom-control-input" ng-model="emp.late">
                                          <span class="custom-control-label">L</span>
                                        </label>
                                </td>
                                <td>{{emp.sign_in}}</td>
                                <td ng-if="emp.is_done_sign_out==true">{{emp.sign_out}}</td>
                                <td ng-if="emp.is_done_sign_out==false && emp.is_done_sign_in==true"><button type="button" class="btn btn-sm btn-outline-primary">Sign Out</button></td>
                                <td ng-if="emp.is_done_sign_in==false && emp.is_done_sign_out==false">{{emp.sign_out}}</td>
                                <td> --
                                    <!--<button type="button" class="btn btn-sm btn-outline-primary">SignIn</button>-->
                                    
                                </td>
                            </tr>
                    </tbody>
				</table>
                <!--<div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>-->
                <div ng-if="show_action_btn=='Take_Attendance'">
                	<button type="button" class="btn rounded-pill btn-outline-primary" ng-click="saveAttendance()" id="Attendance_ID">Take Attendance <span id="loader_id"></span></button>
                </div>
                <div ng-if="show_action_btn=='Update_Attendance'">
                  <button type="button" class="btn rounded-pill btn-outline-primary" ng-click="updateAttendance()" id="UAttendance_ID">Signout All <span id="uloader_id"></span></button>
                </div>
			</div>
        </div>


<hr class="container-m-nx border-light my-4">


</div>
<!-- / Content -->
<script src="<?php echo base_url();?>assets/js/angular.min.js"></script>
<script src="<?php echo base_url();?>assets/js/angular-sanitize.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/libs/bootbox/bootbox.js"></script>
<script type="text/javascript">
//,'ui.bootstrap','angularUtils.directives.dirPagination'
var EmpAttendanceApp=angular.module('EmpAttendanceApp', ['ngSanitize']);
EmpAttendanceApp.controller('EmpAttendanceCtrl',function($scope,$http,$filter,$timeout){
	var loader='<span class="spinner-border" role="status"><span class="sr-only">Loading...</span></span>';
	$scope.base_url="<?php echo base_url();?>Employee_attendance/";
	$scope.get_employess=$scope.base_url+'getEmployees';
	$scope.take_attendance=$scope.base_url+'saveAttendance';
	$http.defaults.headers.post["Content-Type"]="application/x-www-form-urlencoded";
	$scope.perpage_items=20;
	$scope.total_emps=0;
	$scope.total_presents=0;
	$scope.total_absents=0;
	$scope.employees=[];
	$scope.process=false;
	$scope.show_action_btn='';
	$scope.getResultsPage=function(pageNumber){
		var params = $.param({"page":pageNumber,'perpage':$scope.perpage_items});
		$http({method: 'POST',url: $scope.get_employess,data:params}).success(function(data,status,headers,config) {
			$scope.employees=data.employess;
			$scope.total_emps=data.employess.length;
			$scope.show_action_btn=data.show_action_btn;
			$scope.total_presents=data.total_presents;
			$scope.total_absents=data.total_absents;
            /*$scope.data = data.users;
            $scope.loader=false;
            $scope.error=data.error;
            $scope.totalItems = data.total;
            $scope.msg=data.msg;
            $scope.pagination.current=pageNumber;
            $scope.start=data.start;*/
          });
	};
	
	//Counters
	$scope.attendanceCounters=function(){
		$scope.total_presents=0;
		$scope.total_absents=0;
		angular.forEach($scope.employees, function(value, key){
		  if(value.take_attendance=="P")
			$scope.total_presents++;
			
		  if(value.take_attendance=="A")
			$scope.total_absents++;
	   });
	}
	
	//Save Attendance
	$scope.saveAttendance=function(){
		if(($scope.total_presents+$scope.total_absents)<$scope.total_emps){
			bootbox.alert({
			  message:   'Please take full attendance!',
			  className: 'bootbox-sm',
		
			  callback: function() {
				//alert('Hello world callback');
			  },
			});
			return false;
		}
		
		if($scope.process==true){
			return false;
		}
		$scope.process=true;
		$('#loader_id').html(loader);
		//Data Saving Here
		var params = $.param({"emps":JSON.stringify($scope.employees)});
		$http({method: 'POST',url: $scope.take_attendance,data:params}).success(function(data,status,headers,config) {
			$scope.process=false;
			$('#loader_id').html('');
			$scope.show_action_btn=data.show_action_btn;
      $scope.getResultsPage(1);
            /*$scope.data = data.users;
            $scope.loader=false;
            $scope.error=data.error;
            $scope.totalItems = data.total;
            $scope.msg=data.msg;
            $scope.pagination.current=pageNumber;
            $scope.start=data.start;*/
          });
		
	}
	
	$scope.getResultsPage(1);
});
</script>

        