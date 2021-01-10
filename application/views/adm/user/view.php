
<div class="col-xs-8 col-sm-8 widget-container-col" id="widget-container-col-2">
    <div class="widget-box widget-color-blue" id="widget-box-2">
        <div class="widget-header">
            <h5 class="widget-title bigger lighter">
                <i class="ace-icon fa fa-table"></i>
                Auth User
            </h5>
        </div>

        <div class="widget-body">
            <div class="widget-main no-padding table-responsive">
        <table id="example" class="table table-bordered table-stripped table-hover compact" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Npp</th>
                <th>Whatsapp</th>
                <th>Kelompok</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($pegawai as $data){ ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nama']?></td>
                <td><?= $data['npp']?></td>
                <td><?= $data['no_wa']?></td>
                <td><?= $data['nama_kelompok']?></td>
                <td><?= $data['nama_jabatan']?></td>
                <td>
                    <button class="btn btn-minier btn-purple">
                        <i class="ace-icon fa fa-wrench  bigger-110 icon-only"></i>
                    </button>
                    <button class="btn btn-minier btn-danger">
                        <i class="ace-icon fa fa-trash-o bigger-110 icon-only"></i>
                    </button>
                </td>
            </tr>
        <?php } ?>
            </tbody>
    </table>

                <div class="btn-group">
                    <a href="<?= base_url('administrator/user_management/add')?>" class="btn btn-info">New User</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<div class="col-xs-4 col-sm-4 widget-container-col" id="widget-container-col-2">
<?php $detail=$this->db->query("SELECT * FROM pegawai where id_pegawai='15'")->row_array(); ?>
    <div class="widget-box widget-color-blue" id="widget-box-2">
        <div class="widget-header">
            
            <h5 class="widget-title bigger lighter">
                <i class="ace-icon fa fa-table"></i>
                Auth User
            </h5>
        </div>
        <div class="widget-body">
            <div class="container">
            
            <i>Npp</i>
            <input type="text" class="form-control" value="<?= $detail['npp']?>">
            
            <i>Nama</i>
            <input type="text" class="form-control" value="<?= $detail['nama']?>">
            
            <i>Whatsapp</i>
            <input type="text" class="form-control" value="<?= $detail['no_wa']?>">

            <i>Kelompok</i>
            <select name="kelompok" id="kelompok">
            <?php $kel = $this->db->query("SELECT * FROM kelompok")->result_array(); 
            foreach($kel as $klp){ ?>
                <option value="<?= $klp['id_kelompok']?>"<?php if($klp['id_kelompok']==$detail['id_kelompok']){echo 'selected';}?>><?= $klp['nama_kelompok']?></option>
            <?php } ?>
            </select>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        'scrollX': false,
        "paging":   false,
        'ordering' : false,
        "scrollY": 200
    } );
} );
</script>