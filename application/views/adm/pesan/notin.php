
<!-- STAR TULIS PESAN NOTIN -->
<form id="form-tulis-notin" class="tulis-pesan form-horizontal message-form col-xs-12" style="display:inline-block">
    <div>
        <div class="form-group surat-col" >
            <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Jenis Surat:</b></label>
            <div class="col-sm-2">
            <input type="text" class="form-control" readonly value="NOTIN">
            </div>
            <label class="col-sm-3 control-label no-padding-right" for="form-field-recipient"><b>Nomor :</b></label>
            <div class="col-sm-2">
                <input type="text" class="form-control" readonly value="<?= $this->mylib->nonotin($user['id_kelompok']) ?>">
            </div>
        </div>
        <div class="form-group surat-col" >
            <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Dari :</b></label>
            <div class="col-sm-2">
            <input type="text" class="form-control" readonly value="<?= $user['nama_kelompok'] ?>">
            </div>
        </div>

        <div class="form-group surat-col" >
            <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Kepada :</b></label>
            <div class="col-sm-2">
                <select name="_kepada" class="form-control _kepada" id="_kepada">
                    <option value="">-</option>
                    <?php
                    $kelompok = $user['id_kelompok'];
                    $klp=$this->db->query("SELECT * FROM kelompok where id_kelompok !='$kelompok'")->result_array();
                    foreach($klp as $data){ ?>
                        <option value="<?= $data['id_kelompok'] ?>"><?= $data['nama_kelompok'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-7 notif"style="display:none">
                <span class="alert alert-danger notifalert" ></span>
            </div>
        </div>

        <div class="form-group surat-col" >
            <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Perihal :</b></label>
            <div class="col-sm-5">
                <input type="text"class="form-control _perihal" id="_perihal">
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
                <textarea name="" id="" cols="0" rows="2"class="form-control"></textarea>
            </div>
        </div>


        <div class="form-group no-margin-bottom">
            <label class="col-sm-2 control-label no-padding-right">Surat:</label>
            <div class="col-sm-3">
                <div id="form-attachments">
                    <input type="file" name="attachment[]" class="form-control" style="padding:2px" />
                </div>
            </div>
            <label class="col-sm-1 control-label no-padding-right">Lampiran:</label>
            <div class="col-sm-3">
                <div id="form-attachments">
                    <input type="file" name="attachment[]" class="form-control" style="padding:2px" />
                </div>
            </div>
        </div>

        <div class="hr dotted"></div>

        <div class="form-group no-margin-bottom" id="validapprover">
            <label class="col-sm-2 control-label no-padding-right">
                <span class="inline hidden-480"></span>
                Validator 
            </label>
            <div class="col-sm-3">
                <select name="validator" id="validator"class="form-control">
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
                <select name="validator" id="validator"class="form-control">
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
                <button  type="button" class="btn btn-sm btn-primary" id="">
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
        // alert("OK")
        $("#btnkirimsurat").css("display","block");
        $("#btnberikutnya").css("display","none");
        $('#validapprover').css('display',"block")
    });

    $('#btnkirimsurat').click(function(){
        var perihal = $('#_perihal').val();
        var kepada  = $('#_kepada').val();
        if(perihal==''){
            $('.notifalert').html("Perihal Wajib Di Isi");
            $('.notif').css("display",'block');
            $('._perihal').focus();
            setTimeout(function() {
                $('.notif').css("display",'none');;
            }, 10000);
        }else{
            if(kepada==''){
                $('.notifalert').html("Kelompok Tujuan Wajib Di Isi");
                $('.notif').css("display",'block');
                $('._kepada').focus();
                setTimeout(function() {
                    $('.notif').css("display",'none');;
                }, 10000);
            }
        }
    })

})
</script>