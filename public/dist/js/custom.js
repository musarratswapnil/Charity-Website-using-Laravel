(function($){

    "use strict";

    $(".inputtags").tagsinput('items');

    $(document).ready(function() {
        $('#example1').DataTable();
    });

    $('.icp_demo').iconpicker();

    $(document).ready(function() {
        $('.snote').summernote();
    });

    $('#datepicker').datepicker({
        dateFormat: 'yyyy-mm-dd',
        language: {
            today: 'Today',
            days: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            daysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            daysMin: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        }
    });
    $('#timepicker').datepicker({
        language: 'en',
        timepicker: true,
        onlyTimepicker: true,
        timeFormat: 'hh:ii',
        dateFormat: null
    });

    $(document).ready(function(){
        // Initialize the datepicker
        $('#datepicker').datepicker({
            // Options
            autoclose: true,
            todayHighlight: true
        });
    
        // Initialize the timepicker
        $('#timepicker').timepicker({
            // Options
            showMeridian: false // 24hr mode
        });
    });

    


})(jQuery);
