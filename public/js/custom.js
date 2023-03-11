// var customurl = SITE_URL;
$(document).ready(function(){
    
    setTimeout(function(){ $('.alert').fadeOut(3000); }, 3000);
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click','.btn_loader',function(){
        var $this = $(this);
        var html = $this.html();

        var loadingText = '<i class="fa fa-spinner fa-spin" role="status" aria-hidden="true"></i> Loading...';
        $(this).html(loadingText);
        $(this).prop("disabled", true);

        setTimeout(function(){ 
            $('.btn_loader').html(html);
            $('.btn_loader').prop("disabled", false);
        }, 5000);
    });

    $(document).on('click','.icon_loader',function(){
        var $this = $(this);
        var html = $this.html();

        var loadingText = '<i class="fa fa-spinner fa-spin" role="status" aria-hidden="true"></i>';
        $(this).html(loadingText);
        $(this).prop("disabled", true);

        setTimeout(function(){ 
            $('.icon_loader').html(html);
            $('.icon_loader').prop("disabled", false);
        }, 5000);
    });


    $('#product_table').dataTable({
        "bDestroy": true, "lengthChange": true, "bFilter": true, "pageLength": 10,
        "bPaginate": true, "paging": true, "bInfo": true, "stateSave": false,
        "language": { searchPlaceholder: 'Search'},
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json"
        },
        "order": [],
       "columnDefs": [ { "orderable": false, "targets": [0, 1, 5, 6] },
            { "orderable": true, "targets": [2, 3, 4] } ]
    });
});

