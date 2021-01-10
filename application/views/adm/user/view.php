
<div class="col-xs-8 col-sm-8 widget-container-col" id="widget-container-col-2">
    <div class="widget-box widget-color-blue" id="widget-box-2">
        <div class="widget-header">
            <h5 class="widget-title bigger lighter">
                <i class="ace-icon fa fa-table"></i>
                Auth User
            </h5>
            <?= $this->session->flashdata('message');?>
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
                    <button class="btn btn-minier btn-purple" onclick="openupdate(<?= $data['id_pegawai']?>)">
                        <i class="ace-icon fa fa-wrench  bigger-110 icon-only"></i>
                    </button>
                    <button class="btn btn-minier btn-danger" onclick="hapus('<?= $data['nama'] ?>',<?= $data['id_pegawai'] ?>)">
                        <i class="ace-icon fa fa-trash-o bigger-110 icon-only"></i>
                    </button>
                </td>
            </tr>
        <?php } ?>
            </tbody>
    </table>

                <div class="btn-group">
                    <a href="#" class="btn btn-info" onclick="opennew()">New User</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="rowkedua">
</div>

<script>
    setTimeout(function() {
        $('.alert-ku').fadeOut(2000);
    }, 3000); 
function openupdate(id){
    var hal = "<?= base_url('adm/user_mgt/openupdate/')?>"+id;
    $('.rowkedua').load(hal);
}
function opennew(){
    var hal = "<?= base_url('adm/user_mgt/opennew')?>";
    $('.rowkedua').load(hal);
}

//hapus
function hapus(data,id){
    var r = confirm("Hapus "+data+"?");
    if (r == true) {
        window.location.assign("<?= base_url('adm/user_mgt/deleteget/') ?>"+id);
    } else {
    }
}

$(document).ready(function() {

    $('#example').DataTable( {
        'scrollX': false,
        "paging":   false,
        'ordering' : false,
        "scrollY": 200
    } );
} );
</script>