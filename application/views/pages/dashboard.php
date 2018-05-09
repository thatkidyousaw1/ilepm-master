<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<div class="content-wrapper">
    
    <h3>Number of Students</h3>
    <div id="consumables" style="height: 250px; width: 100%;"></div>





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

      // $.ajax({
      //       type: "GET",
      //       url: "Equipment/getEDashBoardYear",
      //       cache: false,
      //       dataType: "json",
      //       timeout: 30000,
      //       success : function (data) {
      //           if(data) {
      //               Morris.Line({
      //                   element: 'equipments',
      //                   data: data,
      //                   xkey: 'year',
      //                   ykeys: ['yearvalue'],
      //                   labels: ['Value'],
      //               });
      //           }
      //           else {
      //               $('#equipments').html('<div class="text-center cool-text" style="position: absolute"><h3>No entries</h3></div>');
      //           }
      //       },
      //   });
</script>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="dataTable_wrapper">
                   <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>Total # of Students</th>
                <th>Total Number of Males</th>
                <th>Total Number of Females</th>
            </tr>
        </thead>
        <tbody> 
          <tr>
            <td>aaaa</td>
            <td>aabasdasd</td>
            <td>asdasdad</td>
          </tr>
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="dataTable_wrapper">
                   <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>Courses</th>
              <th># of Students</th>
              <th>Male</th>
              <th>Females</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>sample</td>
              <td>sample1</td>
              <td>sample3</td>
              <td>sample4</td>
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class = "row">
  <div id = 'donut-example'>
    <script type = "text/javascript">
        Morris.Donut({
        element: 'donut-example',
        data: [
          {label: "Information Technology", value: 12},
          {label: "Computer Science", value: 30},
          {label: "Civil Engineering", value: 20}
        ]
      });
    </script>
    </div>
</div>