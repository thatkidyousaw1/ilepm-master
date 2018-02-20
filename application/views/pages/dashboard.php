<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<div class="content-wrapper">
  <div id="consumables" style="height: 250px; width: 500px;"></div>
  <div id="equipments" style="height: 250px; width: 500px;"></div>
</div>

<script type="text/javascript">

//   $(document).ready(function(){
//     var acct_regs = [{"year": "2008", "value": 20}, 
//     {"year": "2009", "value": 90}, 
//     {"year": "2010", "value": 5},
//     {"year": "2011", "value": 5},
//     {"year": "2012", "value": 20},];

//     new Morris.Line({
//       // ID of the element in which to draw the chart.
//       element: 'consumables',
//       // Chart data records -- each entry in this array corresponds to a point on
//       // the chart.
//       data: acct_regs,
//       // The name of the data record attribute that contains x-values.
//       xkey: 'year',
//       // A list of names of data record attributes that contain y-values.
//       ykeys: ['value'],
//       // Labels for the ykeys -- will be displayed when you hover over the
//       // chart.
//       labels: ['Value']
//     });
// });
    
    $.getJSON("<?php base_url();?>consumables/get-dashboard-year",function (json) { 

            var acctregs = new Morris.Line({
                        // ID of the element in which to draw the chart.
                        element: 'acctregs',
                        // Chart data records -- each entry in this array corresponds to a point on
                        // the chart.
                        data: json,
                        // The name of the data record attribute that contains x-values.
                        xkey: 'year',
                        // A list of names of data record attributes that contain y-values.
                        ykeys: ['yearvalue'],
                        // Labels for the ykeys -- will be displayed when you hover over the
                        // chart.
                        labels: ['Value'],
                    });
        });

</script>
