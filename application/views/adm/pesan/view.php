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
        Inbox
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Mailbox with some customizations as described in docs
        </small>
    </h1>
</div>
<!-- /.page-header -->
<div class="container">
<div class="row"> 
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="row">
            <div class="col-xs-12">
                <div class="tabbable">
                    <ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
                        <li class="li-new-mail pull-left">
                            <!-- <button class="btn btn-danger btn-sm"><i class="fas fa-mail-bulk"></i></button> -->
                            <div class="btn-group" id="inboxmail">
                                <button data-toggle="dropdown" class="btn btn-danger btn-sm dropdown-toggle">
                                <i class="ace-icon fa fa-envelope bigger-130"></i>
                                    History
                                    <!-- <span class="ace-icon fa fa-caret-down icon-on-right"></span> -->
                                </button>
                            </div>
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-inverse btn-sm dropdown-toggle">
                                <i class="ace-icon fa fa-envelope bigger-130"></i>
                                    Buat Surat
                                    <span class="ace-icon fa fa-caret-down icon-on-right"></span>
                                </button>

                                <ul class="dropdown-menu dropdown-default">
                                    <li><a href="#" id="notinmail">Notin</a></li>
                                    <li><a href="#" id="memomail">Memo</a></li>
                                </ul>
                            </div>
                        </li><!-- /.li-new-mail -->

                        <!-- <li class="active" id="inboxmail">
                            <a data-toggle="tab" href="#" id="inboxmail">
                                <i class="blue ace-icon fa fa-inbox bigger-130"></i>
                                <span class="bigger-110">Inbox</span>
                            </a>
                        </li>
                        <li class="active" id="tesview">
                            <a data-toggle="tab" href="#" id="tesview">
                                <i class="blue ace-icon fa fa-inbox bigger-130"></i>
                                <span class="bigger-110">tes view</span>
                            </a>
                        </li> -->

                       
                    </ul>

                    <div class="tab-content no-border no-padding" id="listinbox" >
                        <div id="inbox" class="tab-pane in active">
                            <div class="message-container loadmain" id=""></div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.tabbable -->
            </div><!-- /.col -->
        </div><!-- /.row -->
       

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
</div>
</div>


<script>
$(document).ready(function() {
    $('.loadmain').html("<center><i class='ace-icon fa fa-spinner spin' style='font-size:50px;margin-top:7%'></i></center>");
    var datainbox = "<?= base_url('adm/pesan/myhistory') ?>";
    $('.loadmain').load(datainbox);


    $('#notinmail').click(function(){ 
        $('.loadmain').html("<center><i class='ace-icon fa fa-spinner spin' style='font-size:50px;margin-top:7%'></i></center>");
        var datanotin = "<?= base_url('adm/pesan/notin') ?>";
        $('.loadmain').load(datanotin);
    })
    $('#memomail').click(function(){
        $('.loadmain').html("<center><i class='ace-icon fa fa-spinner spin' style='font-size:50px;margin-top:7%'></i></center>");
        var datamemo = "<?= base_url('adm/pesan/memo') ?>";
        $('.loadmain').load(datamemo);
    })
    $('#inboxmail').click(function(){
        $('.loadmain').html("<center><i class='ace-icon fa fa-spinner spin' style='font-size:50px;margin-top:7%'></i></center>");
        var datainbox = "<?= base_url('adm/pesan/myhistory') ?>";
        $('.loadmain').load(datainbox);
    })
    $('#tesview').click(function(){
        $('.loadmain').html("<center><i class='ace-icon fa fa-spinner spin' style='font-size:50px;margin-top:7%'></i></center>");
        var datapesan = "<?= base_url('adm/pesan/lihat_pesan/') ?>"+4;
        $('.loadmain').load(datapesan);
    })


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
} );
</script>


<!-- DataTable({sDom: 'lrtip'}) -->