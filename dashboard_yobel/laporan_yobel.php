<?php require_once '../autoloader_yobel.php'; ?>

<?php require_once PROJECT_ROOT_YOBEL . '/helper_yobel/authcheck_yobel.php' ?>
<?php
if (!check_valid_role_yobel('admin')) {
    echo "Unauthorized";
    return;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
}

$qInfo_keluhan_pending_yobel = query_yobel("SELECT COUNT(pen.id_pengaduan_yobel) AS total_pending FROM pengaduan_yobel pen WHERE pen.status_yobel = '0'");
$qInfo_keluhan_proses_yobel = query_yobel("SELECT COUNT(pen.id_pengaduan_yobel) AS total_proses FROM pengaduan_yobel pen WHERE pen.status_yobel = 'proses'");
$qInfo_keluhan_selesai_yobel = query_yobel("SELECT COUNT(pen.id_pengaduan_yobel) AS total_selesai FROM pengaduan_yobel pen WHERE pen.status_yobel = 'selesai'");

$info_keluhan_pending_yobel = mysqli_fetch_object($qInfo_keluhan_pending_yobel);
$info_keluhan_proses_yobel = mysqli_fetch_object($qInfo_keluhan_proses_yobel);
$info_keluhan_selesai_yobel = mysqli_fetch_object($qInfo_keluhan_selesai_yobel);

// $qListPetugasWithWinRate_yobel = query_yobel("SELECT petugas_yobel.*, COUNT(tanggapan_yobel.id_tanggapan_yobel) AS total_tanggapan FROM `tanggapan_yobel` INNER JOIN petugas_yobel ON petugas_yobel.id_petugas_yobel = tanggapan_yobel.id_petugas_yobel GROUP BY tanggapan_yobel.id_petugas_yobel ORDER BY total_tanggapan DESC LIMIT 50;"); 
$qListMasyarakatYobel = query_yobel("SELECT * FROM masyarakat_yobel");
?>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/head_yobel.php' ?>

<style>
    td {
        padding: 0 5px;
    }

    .date-column-yobel{
        word-wrap: break-word;
        width: 140px;
    }

    .sticky-downloadbtn-yobel{
        position: sticky;
        position: -webkit-sticky;
        top: 1.1em;
    }
</style>

<div class="container mt-2 sticky-downloadbtn-yobel">
    <div class="row">
        <div class="col text-end">
            <button type="button" class="btn btn-primary" onclick="create_pdf_yobel()"><i class="fa fa-print"></i> Download PDF</button>
        </div>
    </div>
</div>

<div class="container mt-3" id="contentContainerYobel">
    <div class="row">
        <div class="col text-center">
            <h2 style="font-weight: bold;">BPN PENGADU</h2>
            <p>
                Centuric Building Floor 6 Administration and Civil Services<br>
                Jl. Dimana Anda Dapat Mengeluh Asalkan Jelas, Kamarung, Cimahi Utara 40512<br>
                +62813958744
            </p>
        </div>
    </div>
    <div class="row mb-5" style="height: 5px; border-top: 3px solid black; border-bottom: 1px solid black;"></div>
    <div class="row mb-4">
        <div class="col text-center">
            <h4>Laporan Aduan Masyarakat</h4>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col">
            <table>
                <tbody>
                    <tr>
                        <td>Keluhan Pending</td>
                        <td>:</td>
                        <td><?= $info_keluhan_pending_yobel->total_pending ?> Laporan</td>
                    </tr>
                    <tr>
                        <td>Keluhan Diproses</td>
                        <td>:</td>
                        <td><?= $info_keluhan_proses_yobel->total_proses ?> Laporan</td>
                    </tr>
                    <tr>
                        <td>Keluhan Selesai</td>
                        <td>:</td>
                        <td><?= $info_keluhan_selesai_yobel->total_selesai ?> Laporan</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col">
            <table>
                <tbody>
                    <tr>
                        <td>Pembuat Laporan</td>
                        <td>:</td>
                        <td><?= $_SESSION['nama_user_yobel'] ?></td>
                    </tr>
                    <tr>
                        <td>Dibuat pada tanggal</td>
                        <td>:</td>
                        <td><?= date('Y-m-d') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-striped">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Pengadu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($num_yobel = 1; $row_yobel = mysqli_fetch_object($qListMasyarakatYobel); $num_yobel++) : ?>
                        <tr>
                            <td><?= $num_yobel ?></td>
                            <td><?= $row_yobel->nik_yobel ?></td>
                            <td><?= $row_yobel->nama_yobel ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2" class="p-0">
                                <table class="table table-bordered m-0">
                                    <thead>
                                        <tr>
                                            <th class="date-column-yobel">Tanggal Aduan</th>
                                            <th>Isi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $query_yobel = query_yobel("SELECT * FROM `pengaduan_yobel` WHERE `pengaduan_yobel`.`nik_yobel` = '" . $row_yobel->nik_yobel . "' ORDER BY id_pengaduan_yobel DESC"); 
                                            while($row1_yobel = mysqli_fetch_object($query_yobel)):
                                        ?>
                                            <tr>
                                                <td class="date-column-yobel"><?= $row1_yobel->tgl_pengaduan_yobel ?></td>
                                                <td><?= $row1_yobel->isi_laporan_yobel ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url_yobel('/assets_yobel/js/es6-promise.min.js') ?>"></script>
<script src="<?= base_url_yobel('/assets_yobel/js/jspdf.umd.min.js') ?>"></script>
<script src="<?= base_url_yobel('/assets_yobel/js/html2canvas.min.js') ?>"></script>
<script src="<?= base_url_yobel('/assets_yobel/js/html2pdf.js') ?>"></script>
<script>
    function create_pdf_yobel() {
        const element_yobel = document.querySelector('#contentContainerYobel')
        const config_yobel = {
            margin: 2,
            filename: 'laporan_aduan_masyarakat_yobel.pdf',
            image: {
                type: 'jpg',
                quality: 1
            },
            html2canvas: {
                scale: 2
            },
            jspdf: {
                unit: 'cm',
                format: 'a4',
                orientation: 'portrait'
            }
        }
        var worker = html2pdf().set(config_yobel).from(element_yobel).save()
    }
</script>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/foot_yobel.php' ?>