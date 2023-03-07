<style>
    div#wrapper{
        background-image: url('<?= base_url_yobel('/assets_yobel/image/bg.png') ?>');
        background-size: cover;
    }

    .shadowing-yobel{
        background: rgba(254, 254, 254, 0.85);
        box-shadow: none;
    }
</style>

<div class="d-flex" id="wrapper">
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light"><span class="badge bg-primary">BPN PENGADU</span></div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= base_url_yobel('/dashboard_yobel/home_yobel.php') ?>"><i class="fa fa-home"></i> Dashboard</a>

            <?php if ($_SESSION['role_user_yobel'] == 'admin') : ?>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= base_url_yobel('/dashboard_yobel/petugas_yobel.php') ?>"><i class="fa fa-user-gear"></i> Petugas</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= base_url_yobel('/dashboard_yobel/masyarakat_yobel.php') ?>"><i class="fa fa-user"></i> Masyarakat</a>
                <!-- <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= base_url_yobel('/dashboard_yobel/laporan_yobel.php') ?>" target="_blank">Buat Laporan</a> -->
            <?php endif; ?>
            <?php if (check_valid_role_yobel(['admin', 'petugas'])) : ?>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= base_url_yobel('/dashboard_yobel/list_keluhan_yobel.php') ?>"><i class="fa fa-file-lines"></i> Aduan/Keluhan</a>
            <?php endif; ?>

            <?php if ($_SESSION['role_user_yobel'] == 'masyarakat') : ?>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= base_url_yobel('/dashboard_yobel/keluhan_kamu_yobel.php') ?>">Aduan Kamu</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= base_url_yobel('/dashboard_yobel/buat_aduan_yobel.php') ?>">Buat Aduan</a>
            <?php endif; ?>

            <?php if ($_SESSION['role_user_yobel'] == 'admin') : ?>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= base_url_yobel('/dashboard_yobel/log_yobel.php') ?>"><i class="fa fa-gear"></i> Log</a>
            <?php endif; ?>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= base_url_yobel('/dashboard_yobel/misc_yobel/logout_yobel.php') ?>"><i class="fa fa-right-from-bracket"></i> Logout</a>
        </div>
    </div>
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle"><i class="fa fa-bars"></i></button>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#!">Action</a>
                                <a class="dropdown-item" href="#!">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#!">Something else here</a>
                            </div>
                        </li>
                    </ul>
                </div> -->
            </div>
        </nav>
        <div class="shadowing-yobel pt-2 pb-4 shadow">
        <div class="container-fluid">
            <?php if (isset($_SESSION['berhasil_yobel'])) : ?>
                <div class="row justify-content-center m-0">
                    <div class="col">
                        <div class="alert alert-success"><?= $_SESSION['berhasil_yobel'] ?></div>
                    </div>
                </div>
            <?php unset($_SESSION['berhasil_yobel']);
            endif; ?>

            <?php if (isset($_SESSION['gagal_yobel'])) : ?>
                <div class="row justify-content-center m-0">
                    <div class="col">
                        <div class="alert alert-danger"><?= $_SESSION['gagal_yobel'] ?></div>
                    </div>
                </div>
            <?php unset($_SESSION['gagal_yobel']);
            endif; ?>
        </div>