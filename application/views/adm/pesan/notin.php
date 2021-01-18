
<!-- STAR TULIS PESAN NOTIN -->
<form id="form-tulis-notin" method="POST" action="<?= base_url('adm/pesan/insertpesan') ?>" class="tulis-pesan form-horizontal message-form col-xs-12" enctype="multipart/form-data" style="display:inline-block">
    <div>
        <div class="form-group surat-col" >
            <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Jenis Surat:</b></label>
            <div class="col-sm-2">
            <input type="text" class="form-control" name="_jenissurat" readonly value="NOTIN">
            </div>
            <label class="col-sm-3 control-label no-padding-right" for="form-field-recipient"><b>Nomor :</b></label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="_nomor" readonly value="<?= $this->mylib->nonotin($user['id_kelompok']) ?>">
                    <?php if($id_surat['id']==''){$id_surat='1';}else{$id_surat=$id_surat['id'];}?>
                <input type="hidden"  name="_id_surat" readonly value="<?= $id_surat ?>">
            </div>
        </div>
        <div class="form-group surat-col" >
            <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Dari :</b></label>
            <div class="col-sm-2">
            <input type="text" class="form-control" readonly value="<?= $user['nama_kelompok'] ?>">
            <input type="hidden" name="_darikelompok" value="<?= $user['id_kelompok'] ?>">
            <input type="hidden" name="_npp_pembuat" value="<?= $user['npp'] ?>">
            </div>
        </div>

        <div class="form-group surat-col" >
            <label class="col-sm-2 control-label no-padding-right" for="form-field-recipient"><b>Kepada :</b></label>
            <div class="col-sm-2">
                <select name="_kepada" class="form-control  " required id="_kepada">
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
                <input type="text"class="form-control " name="_perihal" required id="_perihal">
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
                <textarea name="_pesan" id="_pesan" cols="0" required rows="2"class="form-control _pesan"></textarea>
            </div>
        </div>


        <div class="form-group no-margin-bottom">
            <label class="col-sm-2 control-label no-padding-right">Surat:</label>
            <div class="col-sm-3">
                <div id="form-attachments">
                    <input type="file" name="_surat" required class="form-control" style="padding:2px" />
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
            <div class="col-sm-5">
                <input type="hidden" id="jumlah-form" value="1">
                <input type="hidden" id="jumlah-form-approver" value="1">
                <label class="col-md-5 control-label no-padding-right" style="margin-bottom:2px">
                    <span class="inline hidden-480"></span>
                    Validator 1
                </label>
                <div class="col-md-6">
                    <select name="_validator[]" id="_validator"class="form-control _validator">
                        <option value="">- Pilih Validator -</option>
                    <?php foreach($mykelompok as $data){ ?>
                        <option value="<?= $data['npp']?>"><?= $data['nama'].' ( '.$data['nama_jabatan'].' - '.$data['nama_kelompok'].' )'?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="col-md-1"><button type="button" class="btn btn-xs btn-inverse" id="addvldt"><i class="fas fa-plus-square"></i></button></div>
                <div class="" id="newvldt"></div>
            </div>
            <div class="col-sm-5">
                <label class="col-md-3 control-label no-padding-right" style="margin-bottom:2px">
                    <span class="inline hidden-480"></span>
                    Approver 1
                </label>
                <div class="col-md-6">
                    <select name="_approver[]" required id="_approver"class="form-control _approver">
                        <option value="">- Pilih Approver -</option>
                    <?php foreach($approver as $data){ ?>
                        <option value="<?= $data['npp']?>"><?= $data['nama'].' ( '.$data['nama_jabatan'].' - '.$data['nama_kelompok'].' )'?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="col-md-1"><button type="button" class="btn btn-xs btn-inverse" id="addaprv"><i class="fas fa-plus-square"></i></button></div>
                <div class="col-md-2"></div>
                <div class="" id="newaprv"></div>
            </div>
            <div class="col-sm-2"style="color:transparent">_
            </div>

<!-- 
            <label class="col-sm-1 control-label no-padding-right">
                <span class="inline hidden-480"></span>
                Approver 
            </label>
            <div class="col-sm-3">
            </div>
            <div class="col-md-1"><button type="button" class="btn btn-xs btn-inverse" id="addvldt"><i class="fas fa-plus-square"></i></button></div> -->
            
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
        // alert("OK")
        $("#btnkirimsurat").css("display","block");
        $("#btnberikutnya").css("display","none");
        $('#validapprover').css('display',"block")
    });

    $('#addvldt').click(function(){
        var jumlah = parseInt($("#jumlah-form").val());
        var nextform = jumlah + 1;
        if(nextform<=5){
          $('#newvldt').append("<label class='col-md-5 control-label no-padding-right'>"+
                                "<span class='inline hidden-480'></span>"+
                                    "Validator "+nextform+ 
                                "</label>"+
                                "<div class='col-md-6'>"+
                                    "<select name='_validator[]' id='_validator' class='form-control _validator'>"+
                                        "<option value=''>- Pilih Validator -</option>"+
                                    "<?php foreach($mykelompok as $data){ ?>"+
                                        "<option value='<?= $data['npp']?>'><?= $data['nama'].' ( '.$data['nama_jabatan'].' - '.$data['nama_kelompok'].' )'?></option>"+
                                    "<?php } ?>"+
                                    "</select>"+
                                "</div>");
            $("#jumlah-form").val(nextform);
        }
    })
    $('#addaprv').click(function(){
        var jumlah = parseInt($("#jumlah-form-approver").val());
        var nextform = jumlah + 1;
        if(nextform<=2){
          $('#newaprv').append("<label class='col-md-3 control-label no-padding-right'>"+
                                "<span class='inline hidden-480'></span>"+
                                    "Approver "+nextform+ 
                                "</label>"+
                                "<div class='col-md-6'>"+
                                    "<select name='_approver[]'  id='_approver'class='form-control _approver'>"+
                                        "<option value=''>- Pilih Approver -</option>"+
                                    "<?php foreach($approver as $data){ ?>"+
                                        "<option value='<?= $data['npp']?>'><?= $data['nama'].' ( '.$data['nama_jabatan'].' - '.$data['nama_kelompok'].' )'?></option>"+
                                    "<?php } ?>"+
                                    "</select>"+
                                "</div>");
            $("#jumlah-form-approver").val(nextform);
        }
    })

})
</script>