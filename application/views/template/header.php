<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="<?= base_url('image/amplop.gif') ?>"/>
  <title>Dashboard - Smailling</title>

  <meta name="description" content="overview &amp; stats" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>" />
  <link rel="stylesheet" href="<?= base_url('assets/font-awesome/4.5.0/css/font-awesome.min.css')?>" />
  <link rel="stylesheet" href="<?= base_url('assets/fontawesome-free-5.15.1-web/css/all.css')?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/fonts.googleapis.com.css')?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/ace.min.css')?>" class="ace-main-stylesheet" id="main-ace-style" />
  <link rel="stylesheet" href="<?= base_url('assets/css/ace-skins.min.css')?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/ace-rtl.min.css')?>" />
  <link rel="stylesheet" href="<?= base_url('assets/my_assets/datatables.css')?>">
  <script src="<?= base_url('assets/js/ace-extra.min.js')?>"></script>
  <script src="<?= base_url('assets/my.js')?>"></script>
  <link rel="stylesheet" href="<?= base_url('assets/my.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/mysecond.css')?>">
  <script src="<?= base_url('assets/jquery.js')?>"></script>
  <style>

    #loading {
      -webkit-animation: rotation 5s infinite linear;
    }

    @-webkit-keyframes rotation {
      from {
        -webkit-transform: rotate(0deg);
      }
      to {
        -webkit-transform: rotate(359deg);
      }
    }
  </style>
  
</head>
<?php // php untuk ambil data user berdasarkan session
    $npp   =  $this->session->userdata('smailling_npp');
    $user = $this->db->query("SELECT * FROM 
    pegawai a left join menu_grup b on a.id_jabatan=b.id_grup where a.npp='$npp'")->row_array();
    ?>
<body class="no-skin">


<!-- STAR MODAL NEW -->
<div class="modal fade" id="modal-info">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="<?= base_url('administrator/data/upload_data') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-header center">
               
                <img class="nav-user-photo " src="<?= base_url('image/abdi.jpg') ?>" 
                data-toggle="modal" data-target="#modal-info" style="width: 80%;"  /><br>
                <h5><b><?= $user['nama'] ?></b></h5>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- END MODAL NEW -->

  <div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
      <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
        <span class="sr-only">Toggle sidebar</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>
      </button>

      <div class="navbar-header pull-left">
        <a href="index.html" class="navbar-brand">
          <small>
            <!-- <i class="fa fa-leaf" id="loading"></i> -->
            <i class="fa fa-gear" id="loading" style="color:white;border-radius:20%"></i>
            SMail<b> BNI</b>
          </small>
        </a>
      </div>

      <div class="navbar-buttons navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">

<!-- MESSAGE -->
              <?php 
              $npp = $this->session->userdata("smailling_npp");
              $datasurat  =$this->db->query("SELECT * FROM surat a
                                            LEFT JOIN pegawai b on a.npp_pembuat=b.npp where npp_approver='$npp' and terbaca='0'")->result_array();
              $blmterbaca =$this->db->query("SELECT count(*)'jml' FROM surat where npp_approver='$npp' and terbaca='0'")->row_array(); ?>
            <li class="green dropdown-modal" > 
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-danger"><?= $blmterbaca['jml'] ?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									<?= $blmterbaca['jml'].' Surat Belum Di Baca' ?>
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">

              <?php 
              foreach($datasurat as $surat){ ?>
										<li>
											<a href="<?= base_url('adm/pesan/us')?>" class="clearfix">
												<img src="<?= base_url('image/mail_orange.png')?>" class="msg-photo" alt="" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue"><?= $surat['nama']?></span>
														<?= $surat['perihal_surat'] ?>
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span><?= date("Y-m-d",strtotime($surat['tgl_buat'])) ?></span>
													</span>
												</span>
											</a>
										</li>
              <?php } ?>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
<!-- ENDMESSAGE -->

          <li class="light-blue dropdown-modal">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
              <img class="nav-user-photo" src="<?= base_url('image/abdi.jpg') ?>" />
              <span class="user-info">
                <small>Welcome,</small>
                <?= $user['nama'] ?>
              </span>

              <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
              <li>
                <a href="#">
                  <i class="ace-icon fa fa-cog"></i>
                  Settings
                </a>
              </li>

              <li>
                <a href="#">
                  <i class="ace-icon fa fa-user"></i>
                  Profile
                </a>
              </li>

              <li class="divider"></li>

              <li>
                <a href="<?= base_url('adm/welcome/logout_dashboard')?>">
                  <i class="ace-icon fa fa-power-off"></i>
                  Logout
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div><!-- /.navbar-container -->
  </div>

  <div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
      try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar responsive ace-save-state">
      <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
      </script>

      <div class="sidebar-shortcuts" id="sidebar-shortcuts">
      <img class="nav-user-photo" src="<?= base_url('image/abdi.jpg') ?>" data-toggle="modal" data-target="#modal-info" style="width: 20%;"  /><br>
      <h5><b><?= $user['nama'] ?></b></h5>
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
          <button class="btn btn-success">
            <i class="ace-icon fa fa-signal"></i>
          </button>

          <button class="btn btn-info">
            <i class="ace-icon fa fa-pencil"></i>
          </button>

          <button class="btn btn-warning">
            <i class="ace-icon fa fa-users"></i>
          </button>

          <button class="btn btn-danger">
            <i class="ace-icon fa fa-cogs"></i>
          </button>
        </div>

      </div><!-- /.sidebar-shortcuts -->

      <ul class="nav nav-list">

        <!-- <li class="active">
          <a href="<?= base_url('administrator/dashboard')?>">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
          </a>
        </li> -->

        <?php 
        
        $data=$this->db->get_Where('menu_access',['id_grup'=>$user['id_jabatan']])->result_array();
        foreach($data as $data1){
          $data2[]=$data1['id_menu'];
        }
        // var_dump($user['id_jabatan']);
       $this->db->where_in('id',$data2);
       $this->db->where('level',1);
       $this->db->order_by('sort','ASC');
       $query = $this->db->get('menu')->result_array();

       // $data=$this->db->query("SELECT * FROM menu where level=1 order by sort asc")->result_array();
        // var_dump($data);die();

       ?>


       <?php foreach ($query as $menu_f) { ?>
        <li class="">
          <a href="<?= base_url().$menu_f['link'] ?>">
            <i class="<?= $menu_f['icon'] ?>" style="padding-left:5px;"></i>
            <span class="menu-text" style="padding-left:5px;"> <?= $menu_f['nama']?> </span>
          </a>
          <b class="arrow"></b>
        </li>
      <?php } ?>
          <!-- <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-tag"></i>
              <span class="menu-text"> More Pages </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
              <li class="">
                <a href="profile.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  User Profile
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="inbox.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Inbox
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="pricing.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pricing Tables
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="invoice.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Invoice
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="timeline.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Timeline
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="search.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Search Results
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="email.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Email Templates
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="login.html">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Login &amp; Register
                </a>

                <b class="arrow"></b>
              </li>
            </ul>
          </li> -->
        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
      </div>

      <div class="main-content">
        <div class="main-content-inner">