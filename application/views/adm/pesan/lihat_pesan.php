
<!-- STAR TULIS PESAN NOTIN -->
<form id="form-tulis-notin" method="POST" action="<?= base_url('adm/pesan/insertpesan') ?>" class="tulis-pesan form-horizontal message-form col-xs-12" enctype="multipart/form-data" style="display:inline-block">
    <div>
        <div class="form-group surat-col" >
            <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Jenis Surat:</b></label>
            <div class="col-sm-2">
            <input type="text" class="form-control" name="_jenissurat" readonly value="<?= $surat['jenis_surat'] ?>">
            </div>
            <label class="col-sm-3 control-label no-padding-right" for="form-field-recipient"><b>Nomor :</b></label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="_nomor" readonly value="<?= $surat['nomor_surat'] ?>">
            </div>
        </div>
        <div class="form-group surat-col" >
            <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Dari :</b></label>
            <div class="col-sm-2">
            <input type="text" class="form-control" readonly value="<?= $surat['kelpembuat'] ?>">
            </div>
        </div>

        <div class="form-group surat-col" >
            <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Kepada :</b></label>
            <div class="col-sm-2">
            <input type="text" class="form-control" readonly value="<?= $surat['keltujuan'] ?>">
                
            </div>
            <div class="col-sm-7 notif"style="display:none">
                <span class="alert alert-danger notifalert" ></span>
            </div>
        </div>

        <div class="form-group surat-col" >
            <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Perihal :</b></label>
            <div class="col-sm-5">
                <input type="text"class="form-control " name="_perihal" required id="_perihal" value="<?= $surat['perihal_surat'] ?>">
                <!-- <textarea name="" id="" cols="0" rows="1"class="form-control"></textarea> -->
            </div>
        </div>

        <div class="hr hr-1 dotted"></div>


        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right">
                <span class="inline space-24 hidden-480"></span>
                Pesan:
            </label>

            <div class="col-sm-7">
                <textarea name="_pesan" id="_pesan" cols="0" required rows="2"class="form-control _pesan"><?= $surat['isi_surat'] ?></textarea>
            </div>
        </div>

        <div class="form-group no-margin-bottom">
            <label class="col-sm-2 control-label no-padding-right">Surat:</label>
            <div class="col-sm-1">
                <a href="<?= base_url('surat/').$surat['file_surat']?>" target="_blank"  class="btn btn-danger" style="padding:0px 6px">
                <i class="fas fa-file-pdf" style="color:white;font-size:30px;"></i>
                </a>
            </div>
            <label class="col-sm-1 control-label no-padding-right">Lampiran:</label>
            <div class="col-sm-1">
                <a href="#" target="_blank"  class="btn btn-danger" style="padding:0px 6px">
                <i class="far fa-file-pdf" style="color:white;font-size:30px;"></i>
                </a>
            </div>
        </div>

        <div class="hr dotted"></div>

        <div class="form-group no-margin-bottom" id="validapprover">
            <label class="col-sm-2 control-label no-padding-right">
                <span class="inline hidden-480"></span>
                Validator 
            </label>
            <div class="col-sm-3">
                <select name="_validator" id="_validator"class="form-control _validator">
                    <option value="">- Pilih Validator -</option>
                <?php foreach($mykelompok as $data){ ?>
                    <option value="<?= $data['npp']?>"><?= $data['nama'].' ( '.$data['nama_jabatan'].' - '.$data['nama_kelompok'].' )'?></option>
                <?php } ?>
                </select>
            </div>
            <label class="col-sm-1 control-label no-padding-right">
                <span class="inline hidden-480"></span>
                Approver 
            </label>
            <div class="col-sm-3">
                <select name="_approver" required id="_approver"class="form-control _approver">
                    <option value="">- Pilih Approver -</option>
                <?php foreach($approver as $data){ ?>
                    <option value="<?= $data['npp']?>"><?= $data['nama'].' ( '.$data['nama_jabatan'].' - '.$data['nama_kelompok'].' )'?></option>
                <?php } ?>
                </select>
            </div>
        </div>
        <div class="hr dotted"></div>

        <div class="form-group align-right" id="btnberikutnya">
            <div class="col-md-9">
                <button id="berikutnya" type="button" class="btn btn-sm btn-info ">
                    Berikutnya
                    <i class="ace-icon fas fa-arrow-circle-right  bigger-140"></i>
                </button>
            </div>
        </div>
        <div class="form-group align-right" style="display:none" id="btnkirimsurat">
            <div class="col-md-9">
                <button  type="submit" class="btn btn-sm btn-primary" id="">
                    Kirim Surat
                    <i class="ace-icon fab fa-telegram-plane"></i>
                    <!-- <i class="ace-icon fa fa-plane  bigger-140"></i> -->
                </button>
            </div>
        </div>
        
        <div class="space"></div>
    </div>
</form>
<!-- END TULIS PESAN NOTIN -->
<script>
$(document).ready(function(){
    $('#validapprover').css('display',"none")



    $('#berikutnya').click(function(){
        $("#btnkirimsurat").css("display","block");
        $("#btnberikutnya").css("display","none");
        $('#validapprover').css('display',"block")
    });

})
</script>