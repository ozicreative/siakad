<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>
    <style type="text/css" id="debugbar_dynamic_style"></style>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template'); ?>/css/adminlte.min.css">
    <!-- Sweet Alert2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins'); ?>/sweetalert2/sweetalert2.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins'); ?>/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template'); ?>/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins'); ?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins'); ?>/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- <script type="text/javascript" id="debugbar_dynamic_script"></script>
    <script type="text/javascript" id="debugbar_loader" data-time="1585277113" src="<?php echo base_url('assets/template/plugins/'); ?>/index.php?debugbar"></script> -->

    <style>
        .table.dataTable {
            font-family: roboto;
            font-size: 14px;
        }

        .color-palette {
            height: 35px;
            line-height: 35px;
            text-align: right;
            padding-right: .75rem;
        }

        .color-palette.disabled {
            text-align: center;
            padding-right: 0;
            display: block;
        }

        .color-palette-set {
            margin-bottom: 15px;
        }

        .color-palette span {
            display: none;
            font-size: 12px;
        }

        .color-palette:hover span {
            display: block;
        }

        .color-palette.disabled span {
            display: block;
            text-align: left;
            padding-left: .75rem;
        }

        .color-palette-box h4 {
            position: absolute;
            left: 1.25rem;
            margin-top: .75rem;
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            display: block;
            z-index: 7;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-dark navbar-success">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="<?php echo base_url('auth/logout'); ?>" class="dropdown-item">
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>