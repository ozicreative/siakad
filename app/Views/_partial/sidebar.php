<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?php echo base_url('/'); ?>" class="brand-link">
    <!-- <img src="<?php echo base_url('assets'); ?>/img/bg.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
    <span class="brand-text font-weight-light"><b>SIAKAD</b></span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url('assets'); ?>/img/default.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin</a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo base_url('/'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('bagian'); ?>" class="nav-link">
            <i class="nav-icon fas fa-server"></i>
            <p>Bagian</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('user'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>User</p>
          </a>
        </li>
        <li class="nav-header">ACCOUNT</li>
        <li class="nav-item">
          <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">