<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Sistem Informasi Pengelolaan Penitipan Barang">
    <meta name="author" content="Muhammad Pascal Rahmadi">
    <link rel="icon" href="images/favicon/favicon.ico">

    <title>SIPIRANG</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="manifest" href="images/favicon/site.webmanifest">
    <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Sweet Alert -->
    <link type="text/css" href="css/sweetalert2.min.css" rel="stylesheet">

    <!-- Volt CSS OK-->
    <link rel="stylesheet" href="css/volt.css">

    <?= $this->renderSection('pageStyles') ?>
</head> 

<body>
    <?= view('Myth\Auth\Views\_navbar') ?>

    <main role="main" class="<?= logged_in() ? "content" : "p-2" ?>">
        <?= $this->renderSection('main') ?>

        <?= view('Myth\Auth\Views\_footer') ?>
    </main>

    <!-- Sweet Alerts 2 -->
    <script src="js/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Core OK-->
    <script src="js/popperjs/umd/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Vanilla JS Datepicker OK-->
    <script src="js/vanillajs-datepicker/datepicker.min.js"></script>

    <!-- Volt JS OK-->
    <script src="js/volt.js"></script>

    <?= $this->renderSection('pageScripts') ?>
</body>

</html>