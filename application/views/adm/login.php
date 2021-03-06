<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="<?= base_url('image/amplop.gif') ?>"/>
  <title>Login Page - Smailling</title>
  <meta name="description" content="User login page" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/font-awesome/4.5.0/css/font-awesome.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/fonts.googleapis.com.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/ace.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/ace-rtl.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/my.css') ?>" />
  <script src="<?= base_url('assets/my.js')?>"></script>
</head>

<style>
    .spin{
    -webkit-animation-name: spin;
    -webkit-animation-duration: 500ms;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-timing-function: linear;
    -moz-animation-name: spin;
    -moz-animation-duration: 500ms;
    -moz-animation-iteration-count: infinite;
    -moz-animation-timing-function: linear;
    -ms-animation-name: spin;
    -ms-animation-duration: 500ms;
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



<body class="login-layout mylogin-page" >
  <div class="main-container"  id="rowlogin">
    <div class="main-content">
      <div class="row" >
        <div class="col-sm-10 col-sm-offset-1">
          <div class="login-container">
            <div class="center form-atas">
              <h1 class="company-text-atas">
                <i class="ace-icon fa cl-birubni"></i><i class="ace-icon fa"style="color:white">Login</i>
                <i class="ace-icon fa cl-birubni">SM</i><i class="ace-icon fa"style="color:white">ailling</i>
              </h1>
              <h4 class="company-text bold">&copy; <span class="white">BNI</span> Divisi SLN</h4>
            </div>
            <div class="position-relative">
              <div class="my-widget-body " >
                <div class="widget-main center">

                  <?= form_open( base_url('adm/welcome') ,['method' => 'POST']); ?>
                  <fieldset>
                      <b class="pull-left">Npp</b>
                        <input name="loginnpp" id="loginnpp" type="text" class="form-control loginnpp" placeholder="Npp" maxlength='7' />

                    <!-- <label class="block clearfix">
                      <span class="block input-icon input-icon-right">
                        <input name="_password"type="password" class="form-control" placeholder="Password" />
                        <i class="ace-icon fa fa-lock"></i>
                      </span>
                    </label> -->
                    <div class="space-6"></div>
                    <div class="clearfix">
                      <div class="space-4"></div>
                        <b id="backtoregist">Registrasi</b>
                      <button type="button" class="width-35 pull-right btn btn-sm btn-primary" id="sendotp">
                        <span class="bigger-110">Berikutnya <i class="fa fa-adjust spin" style="display:none"></i> </span>
                      </button>
                    </div>

                  </fieldset>
                  <?= form_close(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- START OTP -->
  <div class="main-container" id="rowotp" style="display:none">
    <div class="main-content">
      <div class="row" >
        <div class="col-sm-10 col-sm-offset-1">
          <div class="login-container">
            <div class="center form-atas">
              <h1 class="company-text-atas">
                <i class="ace-icon fa cl-birubni"></i><i class="ace-icon fa"style="color:white">Login</i>
                <i class="ace-icon fa cl-birubni">SM</i><i class="ace-icon fa"style="color:white">ailling</i>
              </h1>
              <h4 class="company-text bold">&copy; <span class="white">BNI</span> Divisi SLN</h4>
            </div>
            <div class="position-relative">
              <div class="my-widget-body " >
                <div class="widget-main center">

                  <fieldset>
                  <center><p style="width:70%;font-family: 'Times New Roman', Times, serif;font-size:16px">Masukkan <b>OTP</b> yang dikirimkan ke nomor whatsap anda <b id="nomorwa"></b></p></center>
                      
                  <div class="form_otp">
                    <center>
                    <table>
                        <thead>
                            <tr>
                            <!-- <input type="hidden" name="idnpp" id="idnpp" value="<?= $idnpp ?>"> -->
                                
                                <th class="kol-otp"><input type="text" class="form-control otp" id="otp1" maxlength="1"  ></th>
                                <th style="color:transparent">-</th>
                                <th class="kol-otp"><input type="text" class="form-control otp" id="otp2" maxlength="1" ></th>
                                <th style="color:transparent">-</th>
                                <th class="kol-otp"><input type="text" class="form-control otp" id="otp3" maxlength="1" ></th>
                                <th style="color:transparent">-</th>
                                <th class="kol-otp"><input type="text" class="form-control otp" id="otp4" maxlength="1" ></th>
                              </tr>
                            </thead>
                          </table>
                        </center>
                </div>

                    <!-- <label class="block clearfix">
                      <span class="block input-icon input-icon-right">
                        <input name="_password"type="password" class="form-control" placeholder="Password" />
                        <i class="ace-icon fa fa-lock"></i>
                      </span>
                    </label> -->
                    <div class="space-6"></div>
                    <div class="clearfix">
                      <div class="space-4"></div>
                        <b id="backtologinotp">Back</b>
                      <button type="button" class="width-35 pull-right btn btn-sm btn-primary" id="verivikasiotp">
                        <span class="bigger-110">Verivikasi <i class="fa fa-adjust spin"></i></span>
                      </button>
                    </div>

                  </fieldset>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END OTP -->


  <!-- REGISTRASI -->

  <div class="main-container"  style="display:none" id="rowregistrasi">
    <div class="main-content">
      <div class="row" >
        <div class="col-sm-10 col-sm-offset-1">
          <div class="login-container">
            <div class="center form-atas">
              <h1 class="company-text-atas">
                <i class="ace-icon fa cl-birubni"></i><i class="ace-icon fa"style="color:white">Registration</i>
                <i class="ace-icon fa cl-birubni">SM</i><i class="ace-icon fa"style="color:white">ailling</i>
              </h1>
              <h4 class="company-text bold">&copy; <span class="white">BNI</span> Divisi SLN</h4>
            </div>
            <div class="position-relative">
                <div class="my-widget-body " >
                  <div class="widget-main center">

                    <?php //echo form_open( base_url('adm/welcome') ,['method' => 'POST']); ?>
                    <fieldset>
                    <div id="formnya">
                      <span style="color:red;font-weight:bold"></span>
                        <b class="pull-left">NPP</b>
                        <input name="npp" id="npp" type="text" class="form-control" placeholder="Npp" maxlength="7" />

                        <b class="pull-left">Nama</b>
                        <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama" />
                    
                        <b class="pull-left">Whatsapp</b>
                        <input name="no_wa" id="no_wa" type="text" class="form-control" placeholder="No Whatsapp" onkeypress="return hanyaAngka(event)" />

                        <b class="pull-left">Kelompok</b>
                        <select name="kelompok" id="kelompok" class="form-control">
                          <option value="">-Pilih Kelompok-</option>
                          <?php foreach($kel as $kelompok){ ?>
                          <option value="<?= $kelompok['id_kelompok']?>"><?= $kelompok['nama_kelompok']?></option>
                          <?php } ?>
                        </select>

                        <b class="pull-left">Jabatan</b>
                        <select name="jabatan" id="jabatan" class="form-control">
                          <option value="">-Pilih Jabatan-</option>
                          <?php foreach($jab as $jabatan){ ?>
                          <option value="<?= $jabatan['id_jabatan']?>"><?= $jabatan['nama_jabatan']?></option>
                          <?php } ?>
                          </select>

                      <div class="clearfix">
                        <b id="backtologin">Login</b>
                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                          <span class="bigger-110" id="kirimdata">Kirim Data <i class="fa fa-adjust spin" style="display:none"></i>  </span>
                        </button>
                      </div>
                    </div>
                    </fieldset>
                    <?php //echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- END REGISTRASI -->
  <script src="<?= base_url('assets/js/jquery-2.1.4.min.js') ?>"></script>

<script>
  $(document).ready(function(){ //jquery script

    $('#backtologin').click(function(){
      $('#rowregistrasi').hide(100);
      $('#rowlogin').show(100);
    })

    $('#backtologinotp').click(function(){
      $('#rowotp').hide(100);
      $('#rowlogin').show(100);
    })

    // FOCUS OTP
    $('#otp1').focus();
    $('#otp1').keyup(function(evt){
        $('#otp2').focus();
    })
    $('#otp2').keyup(function(evt){
        $('#otp3').focus();
    })
    $('#otp3').keyup(function(evt){
        $('#otp4').focus();
    })
    // ENDFOCUS OTP

    $("#sendotp").click(function(){
      var loginnpp = $('.loginnpp').val();
      var panjang  = loginnpp.length;
      if(loginnpp==''){
        alert("Npp Wajib Isi!");$('.loginnpp').focus();
      }else{
        if(panjang!='7'){
          alert("Npp Wajib 7 Digit !");$('.loginnpp').focus();
        }else{
          $.ajax({
            type : "POST",
            url  : "<?= base_url('adm/welcome/sendotp1') ?>",
            data : {
              loginnpp  : loginnpp
            },
            beforeSend:function(){
                $(".spin").css("display","inline-block"); //spinner loading start
            },
            success:function(response){
              var ResObj   = JSON.parse(response);
                if(ResObj.parameter=='1'){
                  alert(ResObj.pesan);
                  $(".spin").css("display","none"); 
                }else{
                  $(".spin").css("display","none"); 
                  $('#nomorwa').html(ResObj.no_wa);
                  $('#rowotp').show(100);
                  // alert(ResObj.no_wa);
                  $('#rowlogin').hide(100);
                }
            }
          })
        }
      }
    });
    // VERIVIKASI OTP
    $('#verivikasiotp').click(function(){
      var otp1 = $('#otp1').val();
      var otp2 = $('#otp2').val();
      var otp3 = $('#otp3').val();
      var otp4 = $('#otp4').val();
      var npp  = $('.loginnpp').val();
      if(otp1==''||otp2==''||otp3==''||otp4==''){
        alert("Lengkapi OTP !");$('#otp1').focus();
      }else{
        $.ajax({ 
          type  : "POST",
          url   : "<?= base_url('adm/welcome/verivikasiotp') ?>",
          data  : {
            npp   : npp,
            otp1 : otp1,
            otp2 : otp2,
            otp3 : otp3,
            otp4 : otp4
          },
          beforeSend:function(){
            $(".spin").css("display","inline-block"); //spinner loading start
          },
          success:function(response){
            var ResObj   = JSON.parse(response);
              if(ResObj.id=='1'){
                alert(ResObj.pesan);
                $(".spin").css("display","none"); 
                $('#otp1').focus();
              }else if(ResObj.id=='2'){
                alert(ResObj.pesan);
                window.location.assign("<?= base_url('adm/dash') ?>");
              }
          }
        })
      }
      // 
    })


    $('#backtoregist').click(function(){
      // alert("OK")
      $('#rowregistrasi').show(100);
      $('#rowlogin').hide(100);
    })

    $('#kirimdata').click(function(){
      var npp = $('#npp').val();
      var panjang = npp.length;
      var nama = $('#nama').val();
      var no_wa = $('#no_wa').val();
      var kelompok = $('#kelompok').val();
      var jabatan = $('#jabatan').val();
      // alert(panjang)
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
              if(kelompok==''){
                alert("Kelompok Wajib Isi !"); $("#kelompok").focus();
              }else{
                if(jabatan==''){
                  alert("Jabatan Wajib Isi !"); $("#jabatan").focus();
                }else{
                  $.ajax({
                    type : "POST",
                    url  : "<?= base_url('adm/welcome/regist')?>",
                    data : {
                      npp : npp,
                      nama : nama,
                      no_wa : no_wa,
                      kelompok : kelompok,
                      jabatan : jabatan
                    },
                    beforeSend:function(){
                        $(".spin").css("display","inline-block"); //spinner loading start
                    },
                    success:function(response){
                        alert(response);
                        $(".spin").css("display","none"); 
                        $('#npp').val('');$('#nama').val('');$('#no_wa').val('');$('#kelompok').val('');$('#jabatan').val('');
                    }
                  })
                }
              }
            }
          }
        }
      }

    })



  })
</script>


 </body>
 </html>
