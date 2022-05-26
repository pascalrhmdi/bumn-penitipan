<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Sistem Informasi Pengelolaan Penitipan Barang">
    <meta name="author" content="Muhammad Pascal Rahmadi">
    <link rel="icon" href="<?= base_url('images/favicon/favicon.ico'); ?>">

    <title>SIPIRANG</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('images/favicon/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('images/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('images/favicon/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?= base_url('images/favicon/site.webmanifest'); ?>">
    <link rel="mask-icon" href="<?= base_url('images/favicon/safari-pinned-tab.svg'); ?>" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Sweet Alert -->
    <link type="text/css" href="<?= base_url('css/sweetalert2.min.css'); ?>" rel="stylesheet">

    <!-- Volt CSS OK-->
    <link rel="stylesheet" href="<?= base_url('css/volt.css'); ?>">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('DataTables/datatables.min.css'); ?>"/>

    <?= $this->renderSection('pageStyles') ?>
</head> 

<body>

    <?= view('Myth\Auth\Views\_navbar') ?>
    
    <main role="main" class="<?php if(logged_in()) : ?> content <?php else : ?> p-2 <?php endif ?> ">

        <?php if(logged_in()): ?>
            <?= view('layouts/admin_header'); ?>
        <?php endif ?>

        <?= $this->renderSection('main') ?>
        
        <?= view('Myth\Auth\Views\_footer') ?>
    </main>
    

    <!-- DataTables JS -->
    <script type="text/javascript" src="<?= base_url('DataTables/datatables.min.js'); ?>"></script>

    <!-- Sweet Alerts 2 -->
    <script src="<?= base_url('js/sweetalert2/sweetalert2.all.min.js'); ?>"></script>

    <!-- Core OK-->
    <script src="<?= base_url('js/popperjs/umd/popper.min.js'); ?>"></script>
    <script src="<?= base_url('js/bootstrap/bootstrap.min.js'); ?>"></script>

    <!-- Vanilla JS Datepicker OK-->
    <script src="<?= base_url('js/vanillajs-datepicker/datepicker.min.js'); ?>"></script>

    <!-- Simplebar -->
    <script src="<?= base_url('js/simplebar/simplebar.min.js'); ?>"></script>

    <!-- Volt JS OK-->
    <script src="<?= base_url('js/volt.js'); ?>"></script>

    <?= $this->renderSection('pageScripts') ?>
</body>

</html>