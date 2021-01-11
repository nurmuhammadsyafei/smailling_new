<!-- STAR MODAL NEW -->
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="<?= base_url('adm/access/add_jabatan') ?>" method="POST">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Kelompok</h4>
            </div>
            <div class="modal-body">

                <div class="row"><div class="col-md-12"><b>Nama Jabatan</b>
                    <input type="text"name="_nama"class="form-control">
                </div></div>

                <div class="row"><div class="col-md-12"><b>Detail Nama Jabatan</b>
                    <input type="text"name="_detail"class="form-control">
                </div></div>

                <div class="row"><div class="col-md-12"><b>Divisi</b>
                    <input type="text"name="id_divisi"class="form-control" value="SLN" disabled>
                    <!-- <select name="id_divisi" id="id_divisi" class="form-control">
                    <?php $div=$this->db->query("SELECT * FROM divisi")->result_array();
                    foreach($div as $data){ ?>
                        <option value="<?= $data['id_divisi'] ?>"><?= $data['nama_divisi'] ?></option>
                    <?php } ?>
                    </select> -->
                </div></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- END MODAL NEW -->

<div class="row">
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="box-title">Access Menu</h3>
                    </div>
                    <div class="col-md-3" >
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Jabatan Baru</button>
                    </div>
                    <div class="col-md-5" id="mydiv">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
            </div>
            <div class="box-body no-padding">
                <div class="row">
                <div class="col-md-5  col-sm-9">

                </div>
                <div class="col-md-2  col-sm-9">
                </div>
                <div class="col-md-12 col-sm-9">
                        <table id="tabel_kelompok" class="example2 table compact table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jabatan</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($jabatan as $a ){?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a['nama_jabatan']?></td>
                                    <td><?= $a['detail_jabatan']?></td>
                                    <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" onclick="window.location.href='<?= base_url('adm/access/view_detail/').$a['id_jabatan'] ?>'"><i class="fa fa-pencil"></i></button>
                                        <a href="<?= base_url('adm/access/delete_grup/').$a['id_jabatan'] ?>"class="btn btn-danger" onclick="return confirm('Hapus Akun Ini ?');"><i class="fa fa-close"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                
                            <?php } ?> 
                            </tbody>
                            
                        </table>
                         
                <div class="col-md-3 col-sm-4">
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
setTimeout(function() {
    $('#mydiv').fadeOut(5000);
}, 3000); 
$(document).ready(function() {

$('#tabel_kelompok').DataTable( {
    'scrollX': false,
    "paging":   false,
    'ordering' : false,
    "scrollY": 200
} );
} );
</script>

