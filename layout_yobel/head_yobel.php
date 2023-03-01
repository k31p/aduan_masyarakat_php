<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title_yobel) ? $title_yobel : 'Aduan Masyarakat' ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url_yobel('/assets_yobel/favicon.jpeg') ?>" />
    <link rel="stylesheet" href="<?= base_url_yobel('/assets_yobel/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url_yobel('/assets_yobel/core/styles.css') ?>">
    <link rel="stylesheet" href="<?= base_url_yobel('/assets_yobel/fontawesome-6.3.0/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url_yobel('/assets_yobel/datatables/dataTables.bootstrap5.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url_yobel('/assets_yobel/apexcharts/apexcharts.css') ?>">
    <link rel="stylesheet" href="<?= base_url_yobel('/assets_yobel/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url_yobel('/assets_yobel/select2/css/select2-bootstrap-5-theme.min.css') ?>">
</head>
<body>
    <?php if(isset($_SESSION['berhasil_yobel'])): ?>
        <div class="row justify-content-center m-0">
            <div class="col">
                <div class="alert alert-success"><?= $_SESSION['berhasil_yobel'] ?></div>
            </div>
        </div>
    <?php unset($_SESSION['berhasil_yobel']); endif; ?>

    <?php if(isset($_SESSION['gagal_yobel'])): ?>
        <div class="row justify-content-center m-0">
            <div class="col">
                <div class="alert alert-danger"><?= $_SESSION['gagal_yobel'] ?></div>
            </div>
        </div>
    <?php unset($_SESSION['gagal_yobel']); endif; ?>
   