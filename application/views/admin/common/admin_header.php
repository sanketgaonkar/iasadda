<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>IASADDA Admin</title>
        <!-- Bootstrap core CSS-->
        <link href="<?= base_url('assets/admin/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="<?= base_url('assets/admin/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="<?= base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="<?= base_url('assets/admin/css/sb-admin.css') ?>" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    </head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="index.html">IASADDA.IN</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        
                        <?=anchor('admin/','<i class="fa fa-fw fa-dashboard"></i><span class="nav-link-text">Dashboard</span>','class="nav-link"')?>
                        <?=anchor('admin/Questions','<i class="fa fa-fw fa-dashboard"></i><span class="nav-link-text">Questions</span>','class="nav-link"')?>
                        <?=anchor('admin/Aspirants','<i class="fa fa-fw fa-dashboard"></i><span class="nav-link-text">Aspirants</span>','class="nav-link"')?>
                        <?=anchor('admin/Evaluators','<i class="fa fa-fw fa-dashboard"></i><span class="nav-link-text">Evalutors</span>','class="nav-link"')?>

                    </li>
                   
                </ul>
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler">
                            <i class="fa fa-fw fa-angle-left"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item">
                        
                        <?= anchor('admin/logout', '<i class="fa fa-fw fa-sign-out"></i>Logout', 'class="nav-link"') ?>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="container">
