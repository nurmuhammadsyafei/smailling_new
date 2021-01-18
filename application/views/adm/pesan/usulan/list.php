<!-- <div class="tabbable" id="tabbable"> -->
<div class="" id="" >
    <div id="" class="">
        <div class="">
            
        <div id="id-message-list-navbar" class="message-navbar clearfix"style="background:transparent">
            <div class="">
                <div class="message-infobar" id="id-message-infobar">
                    <span class="blue bigger-150">Usulan Surat</span>
                    <span class="grey bigger-110">(Surat yang masih dalam pendingan)</span>
                </div>
            </div>
            <div>
        </div>

        <!-- LIST PENDINGAN -->
        <div class="message-list-container" id="pendingan">
            <div class="message-list" id="message-list">

            <table id="table_pesan" class="table  table-stripped table-hover compact" style="width:100%">
            <thead style="">
                <tr>
                    <th style="width:17%;text-align:center;background:salmon">Inisiator</th>
                    <th style="width:35%;text-align:center;background:cyan">Perihal</th>
                    <th style="width:7%;text-align:center;background:darkcyan">Tujuan</th>
                    <th style="width:7%;text-align:center;background:magenta">Status</th>
                    <th></th>
                    <th style="width:10%;text-align:center">Aksi</th>
                </tr>
            </thead>
                <tbody>
                    <?php $no=1; foreach($usulan as $data){ ?>
                        <tr>
                            <td style="text-align:left">    
                                <a href=""><b style="color:#6c5ce7"><?= $data['nama']?></b></a>
                            </td>
                            <td style="text-align:left"><?= $data['perihal_surat']?></td>
                            <td><b><?= $data['keltujuan']?></b></td>
                            <td><?= 'Status'?></td>
                            <td><?= date('Y-m-d',strtotime($data['tgl_buat']))?></td>
                            <td>
                                <!-- <a href="<?= base_url('') ?>"></a> -->
                                <span class="btn btn-success btn-xs" onclick="us_vw(<?= $data['id_surat'] ?>)">View</span>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- END LIST PENDINGAN -->

        

        <div class="message-footer clearfix">
            <div class="pull-left"> <i>BNI Divisi SLN</i> </div>
        </div>
        </div>
        </div>
    </div>
</div>


<script>
    function us_vw(id){
        $('.loadmain').html("<center><i class='ace-icon fa fa-spinner spin' style='font-size:50px;margin-top:7%'></i></center>");
        var datainbox = "<?= base_url('adm/pesan/us_det/') ?>"+id;
        $('.loadmain').load(datainbox);
        $('#tabbable').hide();
        $('#kembali').show();
    }
</script>