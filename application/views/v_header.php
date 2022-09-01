<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Pengadaan Bahan Pustaka | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/jqvmap/jqvmap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/dist/css/adminlte.min.css') ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/daterangepicker/daterangepicker.css') ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/summernote/summernote-bs4.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/toastr/toastr.min.css') ?>">
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper ">



  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

    
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-dark elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="#" class="brand-link" style="text-align: center;">
      <span ><b>Sistem Pengadaan <b/><br>Bahan Pustaka</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/Images/user.jpg') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" >
          <a href="#" class="d-block"><?php echo $this->session->userdata('unit'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
       

         <?php if ($this->session->userdata('jenis_user')=='user') { ?>
          <li class="nav-item" >
            <a id="pilih_buku" href="<?php echo base_url('User') ?>" class="nav-link ">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pilihan Buku
              </p>
            </a>
          </li>
          <li class="nav-item" >
            <a id="terpilih" href="<?php echo base_url('User/terpilih') ?>" class="nav-link ">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Buku Terpilih
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a id="hasil" href="<?php echo base_url('Buku/katalog') ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Hasil Pengadaan
              </p>
            </a>
          </li>
        <?php } 
         if ($this->session->userdata('jenis_user')=='admin') { 
           ?>

          
           <li class="nav-item" >
            <a id="dashboard" href="<?php echo base_url('Dashboard') ?>" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a id="buku" href="<?php echo base_url('Buku') ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Database Koleksi Buku
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a id="katalog" href="<?php echo base_url('Buku/katalog') ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Katalog
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a id="terpilih_user" href="<?php echo base_url('Buku/pilihan_user') ?>" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Seleksi Pengadaan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a id="hasil" href="<?php echo base_url('Buku/hasil_rekomendasi') ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Hasil Rekomendasi
              </p>
            </a>
          </li>

          <?php } 
           ?>
          <li class="nav-item">
            <a href="<?php echo base_url('Login/unauth') ?>" class="nav-link">
              <i class="nav-icon fas fa-arrow-circle-right"></i>
              <p>
                Sign Out
              </p>
            </a>
          </li>
      

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>