<link rel="stylesheet" href="<?= base_url('assets/css_surat.css')?>">
<style>
    .spin{
    -webkit-animation-name: spin;
    -webkit-animation-duration: 1000ms;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-timing-function: linear;
    -moz-animation-name: spin;
    -moz-animation-duration: 1000ms;
    -moz-animation-iteration-count: infinite;
    -moz-animation-timing-function: linear;
    -ms-animation-name: spin;
    -ms-animation-duration: 1000ms;
    -ms-animation-iteration-count: infinite;
    -ms-animation-timing-function: linear;
    -o-transition: rotate(3600deg);
    }
    @-moz-keyframes spin {
    from { -moz-transform: rotate(0deg); }
    to { -moz-transform: rotate(360deg); }
    }
    @-webkit-keyframes spin {
    from { -webkit-transform: rotate(0deg); }
    to { -webkit-transform: rotate(360deg); }
    }
    @keyframes spin {
    from {transform:rotate(0deg);}
    to {transform:rotate(360deg);}
    }
</style>



<div class="container">
    <div class="page-header">
        <h1>
            Surat Usulan 
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Surat yang masih dalam pendingan validator dan approver
            </small>
            <button class="btn btn-sm btn-danger kembali" id="kembali">Kembali</button>
        </h1>
    </div>
    <!-- /.page-header -->
    <div class="container">
        <div class="row"> 
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="loadmain"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>

$(document).ready(function(){

    $('.loadmain').html("<center><i class='ace-icon fa fa-spinner spin' style='font-size:50px;margin-top:7%'></i></center>");
    var datainbox = "<?= base_url('adm/pesan/us_vw') ?>";
    $('.loadmain').load(datainbox);
    $('#kembali').hide();
    
        $('#kembali').click(function(){
            $('.loadmain').html("<center><i class='ace-icon fa fa-spinner spin' style='font-size:50px;margin-top:7%'></i></center>");
            var datainbox = "<?= base_url('adm/pesan/us_vw') ?>";
            $('.loadmain').load(datainbox);
            $('#kembali').hide();
        });

        $('#table_pesan').DataTable( {
        sDom: 'lrtip', // hide fungsi search 
        'scrollX': false,
        "paging":   false,
        'search': false,
        'ordering' : false,
        'language': {"url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json"},
        "info":     false,
        "scrollY": 300
    } );
})
</script>