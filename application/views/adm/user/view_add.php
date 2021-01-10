
<div class="col-xs-4 col-sm-4 widget-container-col" id="widget-container-col-2">
    <div class="widget-box widget-color-dark" id="widget-box-2">
        <div class="widget-header">
            
            <h5 class="widget-title bigger lighter">
                <i class="ace-icon fa fa-table"></i>
                Tambah User
            </h5>
        </div>
        <div class="widget-body">
            <div class="container">
            
            <i>Npp</i>
            <input type="text" class="form-control" id="npp"  maxlength="7">
            
            <i>Nama</i>
            <input type="text" class="form-control" id="nama" 
            
            <i>Whatsapp</i>
            <input type="text" class="form-control" id="no_wa" onkeypress="return hanyaAngka(event)">

            <i>Kelompok</i>
            <select name="kelompok" id="kelompok" class="form-control">
                <option value=""></option>
                <?php $kel = $this->db->query("SELECT * FROM kelompok")->result_array(); 
                foreach($kel as $klp){ ?>
                    <option value="<?= $klp['id_kelompok']?>"><?= $klp['nama_kelompok']?></option>
                <?php } ?>
            </select>

            <i>Jabatan</i>
            <select name="jabatan" id="jabatan" class="form-control">
                <option value=""></option>
                <?php $kel = $this->db->query("SELECT * FROM jabatan")->result_array(); 
                foreach($kel as $klp){ ?>
                    <option value="<?= $klp['id_jabatan']?>"><?= $klp['nama_jabatan']?></option>
                <?php } ?>
            </select>

            <div class="modal-footer" style="background:transparent">
                <button class="btn pull-rigth btn-success" id="update">Tambah</button>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    
    $('#update').click(function(){
        var id          = $('#id').val();
        var npp         = $('#npp').val();
        var panjang     = npp.length;
        var nama        = $('#nama').val();
        var no_wa       = $('#no_wa').val();
        var kelompok    = $('#kelompok').val();
        var jabatan     = $('#jabatan').val();

        if(npp==''){
        alert("Npp Wajib Isi !"); $("#npp").focus();
        }else{
            if(panjang!='7'){
            alert("Npp Wajib 7 Angka !"); $("#npp").focus();
            }else{
                if(nama==''){
                    alert("Nama Wajib Isi !"); $("#nama").focus();
                }else{
                    if(no_wa==''){
                    alert("Whatsapp Wajib Isi !"); $("#no_wa").focus();
                    }else{
                        alert("OKEH");
                        window.location.assign("<?= base_url('adm/user_mgt/updateget/') ?>"+id+"/"+npp+"/"+nama+"/"+no_wa+"/"+kelompok+"/"+jabatan);
                    }
                }
            }
        }

    })
    
})
</script>