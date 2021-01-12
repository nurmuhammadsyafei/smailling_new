
<div id="id-message-list-navbar" class="message-navbar clearfix">
    <div class="message-bar">
        <div class="message-infobar" id="id-message-infobar">
            <span class="blue bigger-150">Inbox</span>
            <span class="grey bigger-110">(<?= $unread['unread'] ?> pesan belum terbaca)</span>
        </div>
    </div>
    <div>
</div>


<div class="message-list-container">
    <div class="message-list" id="message-list">

    <table id="table_pesan" class="table  table-stripped table-hover compact" style="width:100%">
    <thead style="">
        <tr>
            <th style="width:20%;text-align:center">Inisiator</th>
            <th style="width:10%;text-align:center">Perihal</th>
            <th></th>
        </tr>
    </thead>
        <tbody>
            <?php $no=1; foreach($pesan as $data){ ?>
                <tr>
                    <td>    
                        <a href=""><b style="color:#6c5ce7"><?= $data['nama']?></b></a>
                    </td>
                    <td><?= $data['perihal_surat']?></td>
                    <td><?= date('Y-m-d',strtotime($data['tgl_buat']))?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    </div>
</div>

<div class="message-footer clearfix">
    <div class="pull-left"> <?= $total['total'] ?> messages total </div>
</div>


<script>
    $(document).ready(function(){
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