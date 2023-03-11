@extends('layouts.app_admin')
@section('content')
<?php $authUser = \Auth::User(); ?>
    <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" rossorigin="anonymous">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        
        <script type="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> -->
        <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> -->
        <!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<!-- 
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script> -->
        
        
<style>
   html, body, #map {
    
}
.get-markers {
    width:100%;
    margin:10px 0;
}
.modal-body,
.modal-body .dropdown {
   position: static;
}

.modal-body .dropdown-menu {
  top: 100px;
  left: 20px;
}
.main-header{
    top: 0;
    width: 100%;
    z-index: 9999;
    position: absolute;
}
#emotion-error{
    color: red;
    font-size: small;
    font-weight: 700;
    margin-top: 5px;
}
.header{
    height: 50px;
    background-color: #333;
    color: #fff;
}
.headertitle{
	position: absolute;
	top: 10px;
    left: 10px;
}
.headerbtn{
	color: #fff;
    padding: 12px 15px !important;
	opacity: 1;
	background-color: transparent;
    border: 0;
    -webkit-appearance: none;
}
.headerbtn:hover{
	color: #fff;
    padding: 12px 15px !important;
}
.leaflet-touch .leaflet-bar button{
	padding: 0px;
    font-size: medium;
}
.leaflet-container a.leaflet-popup-close-button{
	top: 10px;
    right: 10px;
	color: #a9a9a9;
    font-weight: bolder;
    font-size: 25px;
}
.deletebtn{
    position: absolute;
    left: 410px;
    top: 55px;
    z-index: 9;
} */
</style>
  <button type="button" id="deletebtn1"  class="btn btn-danger deletebtn" >Delete</button>
        <div id="mymodal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="top: 40px;">
    <div class="modal-content">
        <div class="modal-header header" style="margin: -0.5px;">
        <h4 class="modal-title ">Want to delete point?</h4>
        <button type="button" class="close headerbtn" style=" right: 0px; position: absolute;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
        </div>
        <div class="modal-body">
        <p>Are you sure, you want to delete selected point form the list?</p>
            
            <button type="button" id="deletebtn"  class="btn btn-danger " >Delete</button>
            <button type="button" id="cancel"  class="btn btn-light ms-3" >Cancel</button>

        </div>
        
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

        <div id="deldialog" title="Want to delete point?">
            
          </div>
        <!-- Button trigger modal -->
  
  <div class="content-wrapper">
        <div id="example_wrapper" class="dataTables_wrapper">
           
           <table id="example" class="display dataTable" style="width:100%" aria-describedby="example_info">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="id: activate to sort column descending" style="width: 94px;">id</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Expression: activate to sort column ascending" style="width: 124.375px;">Expression</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Latitude: activate to sort column ascending" style="width: 96.7375px;">Latitude</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Longitude.: activate to sort column ascending" style="width: 87.0625px;">Longitude</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Annotation date: activate to sort column ascending" style="width: 141px;">Annotation</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending" style="width: 100.975px;">Image</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="User Name: activate to sort column ascending" style="width: 100.975px;">User Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="eMail: activate to sort column ascending" style="width: 100.975px;">eMail</th>
                    </tr>
                </thead><tbody>
                <tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">Loading...</td></tr></tbody>
            </table>
            </div>
            </div>
            <!-- Button trigger modal -->

       
       
       
       
       
       <script>
        
            var newdata;
            var apiurl="http://localhost/mapview/";
            //var apiurl="/mapview/";
            let table ;
            document.addEventListener('DOMContentLoaded', function () {
               table = new DataTable('#example', {
                    processing: true,
                    serverSide: true,
                  
                    ajax: function (d, cb) {
                        fetch(apiurl+'getpointdata.php')
                            .then(response => response.json())
                            .then(data => {
                                console.log(data.pointlist)
                                newdata ={"data":data.pointlist}
                                cb(newdata)});
                    },
                    columns: [
                        { data: 'id' },
                        { data: 'expression' },
                        { data: 'lat' },
                        { data: 'lng' },
                        { data: 'annotation' },
                        { data: 'image' },
                        { data: 'username' },
                        { data: 'email' }
                    ],
                   // dom: '<"toolbar">Bfrtip',
                    dom: 'Bfrtip',
                    buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
                } );
             //   $('div.toolbar').html('<button type="button" id="deletebtn" class="btn btn-danger">Delete</button>');
        $('#example tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
    $('#deletebtn1').click(function () { 
        if(table.row('.selected').data()){
            $('#mymodal').modal('show');
            //$( "#dialog" ).dialog( "open" );
        }
        else{
            alert('Select row from the table to delete.')
        }
    })
    $('#cancel').click(function () {  $('#mymodal').modal('hide');})
        $('#deletebtn').click(function () {
            frmdata={"id":table.row('.selected').data().id}
            $.ajax({
                url: apiurl+"deletepoint.php",
                type: 'DELETE',
                data:JSON.stringify(frmdata) ,
                success: function(res) { 
                    debugger
                    $('#mymodal').modal('hide');
                    if(JSON.parse(res).code =="Success"){
                        table.ajax.reload();
                       // $('#example').DataTable().ajax.reload();
                        alert("Deleted succesfully..")   
                    }
                    else{
                        alert("Error found, Please try again.")
                    }
                }
            })
        });
            } );

        </script>
        <!-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> -->

@endsection