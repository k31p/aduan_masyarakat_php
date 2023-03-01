<?php require_once '../autoloader_yobel.php'; ?>
<?php require_once PROJECT_ROOT_YOBEL . '/helper_yobel/authcheck_yobel.php' ?>

<?php
  $qInfo_keluhan_pending_yobel = query_yobel("SELECT COUNT(pen.id_pengaduan_yobel) AS total_pending FROM pengaduan_yobel pen WHERE pen.status_yobel = '0'");
  $qInfo_keluhan_proses_yobel = query_yobel("SELECT COUNT(pen.id_pengaduan_yobel) AS total_proses FROM pengaduan_yobel pen WHERE pen.status_yobel = 'proses'");
  $qInfo_keluhan_selesai_yobel = query_yobel("SELECT COUNT(pen.id_pengaduan_yobel) AS total_selesai FROM pengaduan_yobel pen WHERE pen.status_yobel = 'selesai'");
  
  $total_pending_yobel = mysqli_fetch_object($qInfo_keluhan_pending_yobel)->total_pending;
  $total_proses_yobel = mysqli_fetch_object($qInfo_keluhan_proses_yobel)->total_proses;
  $total_selesai_yobel = mysqli_fetch_object($qInfo_keluhan_selesai_yobel)->total_selesai;
?>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/head_yobel.php' ?>
<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/partials_yobel/sidebarStart_yobel.php' ?>

<div class="container-fluid">
  <div class="row mb-3">
    <div class="col">
      Selamat datang, kamu adalah <?= $_SESSION['nama_user_yobel'] ?>. Role kamu <?= $_SESSION['role_user_yobel'] ?>
    </div>
  </div>
  <?php if (check_valid_role_yobel('admin')) : ?>
  <div class="row mb-3">
    <div class="col">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#opsiPrint_yobel">
        <i class="fa fa-print"></i> Buat Laporan
      </button>
    </div>
  </div>
  <?php endif; ?>
  <?php if (check_valid_role_yobel(['admin', 'petugas'])) : ?>
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header text-light" style="background-color: #d96e00">
          <h4 class="card-title text-center">Aduan Pending</h4>
        </div>
        <div class="card-body text-light" style="background-color: #d96e00">
          <div class="row">
            <div class="col text-center">
              <h5><?= $total_pending_yobel ?> Aduan</h5>  
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card shadow">
        <div class="card-header text-light bg-primary">
          <h4 class="card-title text-center">Aduan Diproses</h4>
        </div>
        <div class="card-body text-light bg-primary">
          <div class="row">
            <div class="col text-center">
              <h5><?= $total_proses_yobel ?> Aduan</h5>  
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card shadow">
        <div class="card-header text-light bg-success">
          <h4 class="card-title text-center">Aduan Selesai</h4>
        </div>
        <div class="card-body text-light bg-success">
          <div class="row">
            <div class="col text-center">
              <h5><?= $total_selesai_yobel ?> Aduan</h5>  
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="col-6">
        <h4>Win Rate</h4>
        <div id="winrateChart_yobel"></div>
        <script>
          document.addEventListener('DOMContentLoaded', () => {
            const winrateOptions = {
              chart: {
                type: 'line'
              },
              series: [{
                name: 'Pengaduan DPS',
                data: [10, 11, 10, 15, 17, 20]
              }],
              // xaxis: {
              //   categories: [1991, 1992] 
              // }
            }
            const chartWinRate = new ApexCharts(document.querySelector('#winrateChart_yobel'), winrateOptions)
            chartWinRate.render()
          })
        </script>
    </div> -->
  </div>
  <?php endif; ?>
</div>

<!-- Modal -->
<div class="modal fade" id="opsiPrint_yobel" tabindex="-1" aria-labelledby="opsiPrint_yobelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="opsiPrint_yobelLabel">Opsi Print</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="laporan_yobel.php" method="get">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="">Tanggal Awal</label>
                <input type="date" name="date_start_yobel" id="" class="form-control" value="<?= date('Y-m-d') ?>" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="">Tanggal Akhir</label>
                <input type="date" name="date_end_yobel" id="" class="form-control" value="<?= date('Y-m-d') ?>" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-arrow-left"></i></button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/partials_yobel/sidebarEnd_yobel.php' ?>
<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/foot_yobel.php' ?>