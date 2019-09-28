$(document).ready(function(){
    site_url = "https://krisp.pro/purple/";
    
    $(".interview_status").change(function(e){
        ele_id = $(this).attr('id');
        s_id=ele_id.split("_",2);
        id=s_id[1];
        val = $(this).val();
        $.get(site_url+"Interview_evaluation/statusUpdate/"+id+"/"+val,function(data){
            $("#display_message").html("<div class='alert alert-success' role='alert'>Successfully Status Changed</div>");
            $('#display_message').delay(1000).fadeOut('slow');
        });
    });

    $("#address_copy").on("click",function(){
        if($("#address_copy").is(':checked'))
        {
          $("#permanentAddress").val($("#presentAddress").val());
        }
    });

    $("#all_employees").on("click", function(){
      if($("#all_employees").is(':checked'))
      {
        $(".employees").prop('checked', true);
      }
      else
      {
        $(".employees").prop('checked', false);
      }
    })

    $("#add_point").on("click",function(){
      $.get(site_url+"MOM/dynamic_points_field",function(data){
        $("#discussion_block").append(data);
        console.log('done');
      });
    });

    $("#get_report").on('click',function(){
      from_date = $("#from_date").val() ;
      to_date = $("#to_date").val();
      $.get(site_url+"Employee_attendance/GetDailyReport/"+from_date+"/"+to_date,function(data){
        $("#load_report").html(data);
      });
    });

    $("#get_monthly_report").on('click',function(){
      pick_year = $("#pick_year").val() ;
      
      $.get(site_url+"Employee_attendance/GetMonthlyReport/"+pick_year,function(data){
        $("#load_report").html(data);
      });
    });

    $("#get_attendance").on('click',function(){
      date = $("#check_date").val() ;
      $.get(site_url+"Employee_attendance/GetAttendance/"+date,function(data){
        $("#load_report").html(data);
      });
    });

    $(document).on("click", ".remove_point" , function() {
      $(this).parent().parent().remove();
    });

    $('#flatpickr-time').flatpickr({
      enableTime: true,
      noCalendar: true,
      altInput: true,
      defaultDate: "09:00"
    });
    
    $('#flatpickr-time1').flatpickr({
      enableTime: true,
      noCalendar: true,
      altInput: true
    });
    
    
});
// Bootstrap Markdown
$(function() {
    $('#bs-markdown').markdown({
      iconlibrary: 'fa',
      footer: '<div id="md-character-footer"></div><small id="md-character-counter" class="text-muted">350 character left</small>',
  
      onChange: function(e) {
        var contentLength = e.getContent().length;
  
        if (contentLength > 350) {
          $('#md-character-counter')
            .removeClass('text-muted')
            .addClass('text-danger')
            .html((contentLength - 350) + ' character surplus.');
        } else {
          $('#md-character-counter')
            .removeClass('text-danger')
            .addClass('text-muted')
            .html((350 - contentLength) + ' character left.');
        }
      },
    });
  
    // Update character counter
    $('#markdown').trigger('change');
  
  
    // *******************************************************************
    // Fix icons
  
    $('.md-editor .fa-header').removeClass('fa fa-header').addClass('fas fa-heading');
    $('.md-editor .fa-picture-o').removeClass('fa fa-picture-o').addClass('far fa-image');
  });
