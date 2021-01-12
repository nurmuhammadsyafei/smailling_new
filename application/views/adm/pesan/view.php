<link rel="stylesheet" href="<?= base_url('assets/css_surat.css')?>">


<div class="container">
<div class="page-header">
    <h1>
        Inbox
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Mailbox with some customizations as described in docs
        </small>
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="row">
            <div class="col-xs-12">
                <div class="tabbable">
                    <ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
                        <li class="li-new-mail pull-right">
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-purple no-border dropdown-toggle">
                                <i class="ace-icon fa fa-envelope bigger-130"></i>
                                    Buat Surat
                                    <span class="ace-icon fa fa-caret-down icon-on-right"></span>
                                </button>

                                <ul class="dropdown-menu dropdown-default">
                                    <li><a href="#" id="notinmail">Notin</a></li>
                                    <li><a href="#" id="memomail">Memo</a></li>
                                </ul>
                            </div>
                            <span class="btn btn-purple no-border" id="writemail">
                                <i class="ace-icon fa fa-envelope bigger-130"></i>
                                <span class="bigger-110">Write Mail</span>
                            </span>
                        </li><!-- /.li-new-mail -->

                        <li class="active">
                            <a data-toggle="tab" href="#" id="inboxmail">
                                <i class="blue ace-icon fa fa-inbox bigger-130"></i>
                                <span class="bigger-110">Inbox</span>
                            </a>
                        </li>

                       
                    </ul>

                    <div class="tab-content no-border no-padding" id="listinbox" >
                        <div id="inbox" class="tab-pane in active">
                            <div class="message-container " id="loadinbox"></div>
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


<script>
$(document).ready(function() {
    var datainbox = "<?= base_url('adm/pesan/inbox') ?>";
    $('#loadinbox').load(datainbox);


    $('#notinmail').click(function(){
        $('#listinbox').hide(100);
        $('#form-tulis-notin').show(100);
        $('#form-tulis-memo').hide(100);
    })
    $('#memomail').click(function(){
        $('#listinbox').hide(100);
        $('#form-tulis-notin').hide(100);
        $('#form-tulis-memo').show(100);
    })
    // $('#inboxmail').click(function(){
    //     // alert("OKE")
    //     var inboxdata = "<?= base_url('adm/pesan/inbox') ?>";
    //     $('.loadinbox').load(inboxdata);
    // })


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