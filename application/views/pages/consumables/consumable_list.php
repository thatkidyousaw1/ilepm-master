<div class="content-wrapper">
    <h1>
        <center> List of Consumables </center>
    </h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="<?php echo base_url();?>consumables/list-of-consumables" method="post" id="consumableForm">
                        <div class="col-sm-12">
                            <h5>Category:</h5>
                            <select class="form-control" id="category" name="category" onchange="getCategory(this);">
                                <option value="">Not Selected</option>
                                <?php
                                foreach($category as $item) {
                                    echo '<option value="'.$item->id.'">'.$item->category_name.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4" style="margin: 10px 0px 10px 0px;">
                            <div class="col-sm-1">
                                <h5>SY:</h5>
                            </div>
                            <div class="col-sm-1" style="width: 150px;">
                                <input type="text" class="form-control input-style" name="yearone" id="yearone" onchange="getYear(this);" required="true">
                                <span class="text-danger"><?php echo form_error('yearone'); ?></span>
                            </div>
                            <div class="col-sm-1" style="margin-left: -20px; margin-right: -10px;">
                                <h5>to</h5>
                            </div>
                            <div class="col-sm-1" style="width: 150px;">
                                <input type="text" class="form-control input-style" name="yeartwo" id="yeartwo" readonly="true">
                            </div>
                        </div>
                        <div class="col-sm-4" style="margin-top: 10px">
                            <input type="button" class="btn btn-primary" name="btnYear" id="btnYear" value="Proceed">
                        </div>
                        <div class="col-sm-1" style="margin-top: 10px; float: right">
                            <input type="button" class="btn btn-primary" name="btnEdit1" id="btnEdit1" value="Edit">
                        </div>
                        <div class="dataTable_wrapper col-sm-12" id="anotherTable">
                        </div>
                        <div class="dataTable_wrapper col-sm-12">
                            <table id="consumableTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Part Number</th>
                                        <th>Description</th>
                                        <th>1st Semester</th>
                                        <th>2nd Semester</th>
                                        <th>Summer</th>
                                        <th class="text-center" data-priority="2"><i class="fa fa-wrench fa-fw"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($table as $item){
                                        echo '<tr>
                                        <td>'.$item->part_number.'</td>
                                        <td>'.$item->description.'</td>
                                        <td>'.$item->first.'</td>
                                        <td>'.$item->second.'</td>
                                        <td>'.$item->summer.'</td>
                                        <td>
                                            <div class="text-center">
                                                <input type="checkbox" name="check_list" value="'.$item->id.'">
                                            </div>
                                        </td>
                                    </tr>
                                    ';
                                }
                                ?> 
                            </tbody>
                        </table>
                        <div class="col-sm-1" style="margin-top: 10px; float: right">
                            <input type="button" class="btn btn-primary" name="btnEdit2" id="btnEdit2" value="Edit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<script type="text/javascript">
    var editor;
    var formCreate = $("#consumableForm");
    $(document).ready(function() {
        $('#consumableTable').DataTable({
            'dom': "<'row'<'col-sm-4'l><'col-sm-5 text-center visible-lg'B><'col-sm-3'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            'buttons': [
            {
                'extend': 'excel',
                'text': '<i class="fa fa-file-excel-o fg-green"></i>&nbsp;Excel',
                'exportOptions': {
                    'columns': ':visible'
                }
            },
            ],
            'order': [[0, 'asc']],
            "aoColumns": [
            { "sType": "num" },
            { "render": function(data, type, row){
                return data.split('\n').join("<br/>");
            }
        },
        null,
        null,
        null,
        null,
        ],
    });
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        formCreate.validate({
            ignore: ".input-sm",
            rules: {
                yearone: {
                    required: true
                },
            },
            messages: {
                yearone: {
                    required: "<span style='font-family: calibri'>The Year field is empty</span>"
                },
            }
        });
    });
    function getTable(data){
        var newData = $(data).find('#consumableTable').html();
        $('#consumableTable').DataTable().destroy();
        $('#consumableTable').html(newData);
        $('#consumableTable').DataTable({
            'dom': "<'row'<'col-sm-4'l><'col-sm-5 text-center visible-lg'B><'col-sm-3'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            'buttons': [
            {
                'extend': 'excel',
                'text': '<i class="fa fa-file-excel-o fg-green"></i>&nbsp;Excel',
                'exportOptions': {
                    'columns': ':visible'
                }
            },
            ],
            'order': [[0, 'asc']],
            "aoColumns": [
            { "sType": "num" },
            null,
            null,
            null,
            null,
            null,
            ],
        }).draw();
    }
    function getCategory(sel){
        var url = "<?php echo base_url();?>consumables/list-of-consumables"; 
        $.ajax({
           type: "POST",
           url: url,
         data: $('#consumableForm').serialize(), // serializes the form's elements.
         success: function(data){
            getTable(data);
        }
    });
    }
    function getYear(sel){
        var yearData = parseInt($('#yearone').val());
        $('#yeartwo').val(yearData + 1);
    }
    $('#btnYear').click(function(){
        var url = "<?php echo base_url();?>consumables/list-of-consumables-year";
        if(formCreate.valid() === false){
        }else{
            $.ajax({
                type: "POST",
                url: url,
                data: $('#consumableForm').serialize(),
                success: function(data){
                    if(data == "There's no data for this year. Do you want to create?"){
                        if(confirm(data)){
                            createTableForYear();
                        }else{
                            alert("Didn't create");
                        }
                    }else{
                        getTable(data);
                        console.log(data);
                    }
                }
            });
        }
    });
    function createTableForYear(){
        var url = "<?php echo base_url();?>consumables/list-of-consumables-year-create";
        var year = $('#yearone').val();
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                'year': year,
            },
            success: function(data){
                console.log(data);
                alert("Success");
            }
        });
    }
    $('#btnEdit1').click(function(){
        var url = "<?php echo base_url();?>consumables/list-edit-of-consumables";
        if(formCreate.valid() === false){
        }else{
            document.getElementById("anotherTable").innerHTML = "<table id='consumableTableByCheck' class='table table-striped table-bordered' width='100%' cellspacing='0'>" +
            "<thead>" +
            "<tr>" + 
            "<th>Part Number</th>" +
            "<th>Description</th>" +
            "<th>1st Semester</th>" +
            "<th>2nd Semester</th>" +
            "<th>Summer</th>" +
            "</tr>" +
            "</thead>"+
            "</table>";
            $('#consumableTableByCheck').DataTable({
                "ajax":{
                    url: url,
                    type: 'POST',
                    data: function(d){
                        d.id = $('input[name=check_list]').val();
                        d.year = $('#yearone').val();
                        console.log(d.id);
                    },
                    select: true,
                },
            });
            var editorOpts = {
                table: "#consumableTableByCheck",
                fields: [ {
                    label: "Part Number:",
                    name: "part_number"
                }, {
                    label: "Description:",
                    name: "description"
                }, {
                    label: "1st Semester:",
                    name: "first"
                }, {
                    label: "2nd Semester:",
                    name: "second"
                }, {
                    label: "Summer:",
                    name: "summer"
                },
                ]
            };
                /*editor = new $.fn.dataTable.Editor( {
                    table: "#consumableTableByCheck",
                    fields: [ {
                        label: "Part Number:",
                        name: "part_number"
                    }, {
                        label: "Description:",
                        name: "description"
                    }, {
                        label: "1st Semester:",
                        name: "first"
                    }, {
                        label: "2nd Semester:",
                        name: "second"
                    }, {
                        label: "Summer:",
                        name: "summer"
                    },
                    ]
                } );*/
            }
        });
    </script>
    <script src="<?php echo base_url(); ?>assets/dist/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/dataTables.select.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/buttons.print.min.js"></script>
</body>
</html>
