// Bootstrap Datepicker
$(function() {
  var isRtl = $('html').attr('dir') === 'rtl';

  $('#datepicker-base').datepicker({
    orientation: isRtl ? 'auto right' : 'auto left'
  });
  $('#datepicker-features').datepicker({
    calendarWeeks:         true,
    todayBtn:              'linked',
    daysOfWeekDisabled:    '1',
    clearBtn:              true,
    todayHighlight:        true,
    multidate:             true,
    daysOfWeekHighlighted: '1,2',
    orientation: isRtl ? 'auto left' : 'auto right',

    beforeShowMonth: function(date) {
      if (date.getMonth() === 8) {
        return false;
      }
    },

    beforeShowYear: function(date){
      if (date.getFullYear() === 2014) {
        return false;
      }
    }
  });
  $('#datepicker-range').datepicker({
    orientation: isRtl ? 'auto right' : 'auto left'
  });
  $('#datepicker-inline').datepicker();
  $("#date_of_interview").datepicker();
});
