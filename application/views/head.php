<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>InventoryICT | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/select2/select2.min.css">
    <!-- loadjs -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css">
    <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/admin/bootstrap/js/jquery-1.10.2.min.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable(); 
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();
        $(".select2").select2();
      });
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>I</b>CT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Inventory</b>ICT</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/admin/dist/img/icon-user.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->session->userdata('namapengguna'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/admin/dist/img/icon-user.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $this->session->userdata('namapengguna'); ?>
                      <small><i><?php echo $this->session->userdata('deskripsi');?></i></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url();?>index.php/user" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url();?>index.php/login/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>assets/admin/dist/img/icon-user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('namapengguna'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Navigasi Utama</li>
            <li class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>"><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="<?php if($this->uri->segment(1)=="barang" || $this->uri->segment(1)=="unit" || $this->uri->segment(1)=="devisi" || $this->uri->segment(1)=="rakitan"){echo "active";}?> treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($this->uri->segment(1)=="barang"){echo "active";}?>"><a href="<?php echo base_url(); ?>index.php/barang"><i class="fa fa-circle-o"></i> Daftar Barang</a></li>
                <li class="<?php if($this->uri->segment(1)=="unit"){echo "active";}?>"><a href="<?php echo base_url(); ?>index.php/unit"><i class="fa fa-circle-o"></i> Daftar Unit</a></li>
                <li class="<?php if($this->uri->segment(1)=="devisi"){echo "active";}?>"><a href="<?php echo base_url(); ?>index.php/devisi"><i class="fa fa-circle-o"></i> Daftar Divisi</a></li>
                <li class="<?php if($this->uri->segment(1)=="rakitan"){echo "active";}?>"><a href="<?php echo base_url(); ?>index.php/rakitan"><i class="fa fa-circle-o"></i> Daftar Rakitan</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Form Input</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>index.php/barang/tambah"><i class="fa fa-circle-o"></i> Barang</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/unit/tambah"><i class="fa fa-circle-o"></i> Unit</a></li>                
                <li><a href="<?php echo base_url(); ?>index.php/devisi/tambah"><i class="fa fa-circle-o"></i> Devisi</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/rakitan/tambah"><i class="fa fa-circle-o"></i> Rakitan</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>