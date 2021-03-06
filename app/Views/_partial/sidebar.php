<aside class="main-sidebar sidebar-dark-success elevation-4">
  <a href="<?php echo base_url('/'); ?>" class="brand-link navbar-success">
    <img src="<?php echo base_url('assets'); ?>/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle">
    <span class="brand-text font-weight-info"><b>SMK</b> Wahid Hasyim</span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/img/' . session()->get('img')) ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?php echo base_url('profile'); ?>" class="d-block"><?= session()->get('nama_user') ?></a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <?php if (session()->get('level') == 1) { ?>

          <li class="nav-item">
            <a href="<?php echo base_url('/'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Data Manager
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('guru'); ?>" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('siswa'); ?>" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('kelas'); ?>" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('pelajaran'); ?>" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('jadwal'); ?>" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>Jadwal</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-microchip"></i>
              <p>
                User Manager
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('user'); ?>" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>Role</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('kehadiran'); ?>" class="nav-link">
              <i class="nav-icon far fa-calendar-check"></i>
              <p>Kehadiran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('nilai'); ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Nilai</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('kbm'); ?>" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>KBM</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('rapor'); ?>" class="nav-link">
              <i class="nav-icon fas fa-award"></i>
              <p>Rapor</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p class="text">Logout</p>
            </a>
          </li>

        <?php } elseif (session()->get('level') == 2) { ?>

          <li class="nav-item">
            <a href="<?php echo base_url('/'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Data Manager
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('guru'); ?>" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('siswa'); ?>" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('kelas'); ?>" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('pelajaran'); ?>" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('jadwal'); ?>" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>Jadwal</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-microchip"></i>
              <p>
                User Manager
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('user'); ?>" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>Role</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p class="text">Logout</p>
            </a>
          </li>

        <?php } elseif (session()->get('level') == 3) { ?>

          <li class="nav-item">
            <a href="<?php echo base_url('/'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('kehadiran'); ?>" class="nav-link">
              <i class="nav-icon far fa-calendar-check"></i>
              <p>Kehadiran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('nilai'); ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Nilai</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('kbm'); ?>" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>KBM</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('rapor'); ?>" class="nav-link">
              <i class="nav-icon fas fa-award"></i>
              <p>Rapor</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p class="text">Logout</p>
            </a>
          </li>
        <?php } ?>
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