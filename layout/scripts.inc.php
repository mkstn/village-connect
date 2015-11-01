<script src="assests/js/jquery.min.js"></script>
<script src="assests/js/jquery.min.js" type="text/javascript"></script>

<script src="assests/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<script src="assests/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assests/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

<script src="assests/js/plugins/chart.js" type="text/javascript"></script>

<script src="assests/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script src="assests/js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>
<script src="assests/js/Director/app.js" type="text/javascript"></script>
<script src="assests/js/Director/dashboard.js" type="text/javascript"></script>

<script type="text/javascript">
    $('input').on('ifChecked', function(event) {
        // var element = $(this).parent().find('input:checkbox:first');
        // element.parent().parent().parent().addClass('highlight');
        $(this).parents('li').addClass("task-done");
        console.log('ok');
    });
    $('input').on('ifUnchecked', function(event) {
        // var element = $(this).parent().find('input:checkbox:first');
        // element.parent().parent().parent().removeClass('highlight');
        $(this).parents('li').removeClass("task-done");
        console.log('not');
    });

</script>
<script>
    $('#noti-box1').slimScroll({
        height: '400px',
        size: '5px',
        BorderRadius: '5px'
    });
    $('#noti-box2').slimScroll({
        height: '400px',
        size: '5px',
        BorderRadius: '5px'
    });
    $('#noti-box3').slimScroll({
        height: '400px',
        size: '5px',
        BorderRadius: '5px'
    });

    $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
        checkboxClass: 'icheckbox_flat-grey',
        radioClass: 'iradio_flat-grey'
    });
</script>
<script type="text/javascript">
$(function() {
        "use strict";
        //BAR CHART
        var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };
    new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
        responsive : true,
        maintainAspectRatio: false,
    });

    });
    // Chart.defaults.global.responsive = true;
</script>