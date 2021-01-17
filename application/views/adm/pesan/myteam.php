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
            Surat Team 
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Semua History Surat Dalam Team
            </small>
        </h1>
    </div>
<!-- /.page-header -->
    <div class="row" idd='viewsurat'> 
        <div class="col-xs-12">
            <div class="tabbable">
                <ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1"></ul>

                <div class="tab-content no-border no-padding" id="listinbox" >
                    <div id="inbox" class="tab-pane in active">
                        <div class="message-container">
                            
                            <div id="id-message-list-navbar" class="message-navbar clearfix">
                                <div class="">
                                    <div class="message-infobar" id="id-message-infobar">
                                        <span class="blue bigger-150">Inbox</span>
                                        <span class="grey bigger-110">(nganu pesan belum terbaca)</span>
                                    </div>
                                <div>
                            </div>

                            <div class="message-list-container">
                                <div class="message-list" id="message-list">

                                    <div id="viewpesan"></div>

                                    <table id="table_pesan" class="table table-stripped table-hover compact" style="width:100%">
                                    <thead style="">
                                        <tr>
                                            <th style="width:20%;text-align:center">Inisiator</th>
                                            <th style="width:10%;text-align:center">Perihal</th>
                                            <th></th>
                                            <th style="width:10%;text-align:center">Aksi</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <?php $no=1; foreach($pesan as $data){ ?>
                                                <tr>
                                                    <td>    
                                                        <!-- <input id="idnya_surat" type="hidden" value="<?= $data['id_surat'] ?>"> -->
                                                        <a href=""><b style="color:#6c5ce7"><?= $data['nama']?></b></a>
                                                    </td>
                                                    <td><?= $data['perihal_surat']?></td>
                                                    <td><?= date('Y-m-d',strtotime($data['tgl_buat']))?></td>
                                                    <td>
                                                        <span class="btn btn-success btn-xs" id="lihat_pesan">View</span>
                                                        <input type="hidden" id="id_surat" value="<?= $data['id_surat'] ?>">
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>

                            <div class="message-footer clearfix">
                                <div class="pull-left"> <?= $total['total'] ?> messages total </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.tabbable -->
        </div><!-- /.col -->
    </div>
</div>













<script>
    $(document).ready(function(){
        
        $('#lihat_pesan').click(function(){
            var id_surat = $('#id_surat').val();
            $('.table').hide();
            var detailpesan = "<?= base_url('adm/pesan/detail') ?>";
            $('#viewpesan').load(detailpesan);
            // alert(id_surat);
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