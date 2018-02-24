<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<div class="content-wrapper">
  <div id="consumables" style="height: 250px; width: 500px;"></div>
  <div id="equipments" style="height: 250px; width: 500px;"></div>
</div>

<script type="text/javascript">

     $.ajax({
            type: "GET",
            url: "Consumable/getDashBoardYear",
            cache: false,
            dataType: "json",
            timeout: 30000,
            success : function (data) {
                if(data) {
                    Morris.Line({
                        element: 'consumables',
                        data: data,
                        xkey: 'year',
                        ykeys: ['yearvalue'],
                        labels: ['Value'],
                    });
                }
                else {
                    $('#consumables').html('<div class="text-center cool-text" style="position: absolute"><h3>No entries</h3></div>');
                }
            },
        });

      $.ajax({
            type: "GET",
            url: "Equipment/getEDashBoardYear",
            cache: false,
            dataType: "json",
            timeout: 30000,
            success : function (data) {
                if(data) {
                    Morris.Line({
                        element: 'equipments',
                        data: data,
                        xkey: 'year',
                        ykeys: ['yearvalue'],
                        labels: ['Value'],
                    });
                }
                else {
                    $('#equipments').html('<div class="text-center cool-text" style="position: absolute"><h3>No entries</h3></div>');
                }
            },
        });
</script>


