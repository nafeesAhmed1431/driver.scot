<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $page_title ?? "Driver Scot" ?></title>

    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/favicon.ico') ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/boxicons.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/core.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/theme-default.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/apex-charts/apex-charts.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/spinkit/spinkit.css') ?>" />
    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/js/helpers.js') ?>"></script>
    <script src="<?= base_url('assets/js/config.js') ?>"></script>
    <script>
        let base_url = "<?= base_url() ?>";
    </script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="spinner-grow text-primary" id="ajax_loader" style=" display:none; position: absolute;top: 25px;right: 40px;" role="status"></div>
            <!-- Menu -->