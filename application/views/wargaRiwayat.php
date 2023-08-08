<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter&family=Nunito:wght@300;400;600;700&family=Poppins&display=swap"
      rel="stylesheet"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />

    <!-- Bootstrap CSS Offline -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>fontawesome/css/all.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/wargaRiwayat.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/')?>/img/favicon.ico">


    <title>Riwayat Pembayaran</title>
  </head>
  <body>
    <div class="halaman">
      <div class="menu">
        <!-- Logo -->
        <div class="logo">
          <i class="fa-sharp fa-solid fa-money-bill-wave"></i> &nbsp;
          <h1>Iuran Lingkungan</h1>
        </div>

        <!-- Menu -->
        <ul>
          <a href="<?php echo base_url('wargaProfil')?>">
            <li>
              <i class="fa-solid fa-user"></i>
              <span>Profil</span>
            </li>
          </a>

          <a href="<?php echo base_url('wargaKonfirmasi')?>">
            <li>
              <i class="fa-sharp fa-solid fa-file-invoice-dollar"></i>
              <span>Form Pembayaran</span>
            </li>
          </a>

          <a href="<?php echo base_url('wargaRiwayat')?>">
            <li>
              <i class="fa-solid fa-clock-rotate-left"></i>
              <span>Riwayat Pembayaran</span>
            </li>
          </a>

          <a href="<?php echo base_url('wargaForm')?>">
            <li>
              <i class="fa-solid fa-circle-info" style="color: #ffff00;"></i>
              <span style="color: #ffff00;">Form Pembayaran</span>
            </li>
          </a>

          <a href="<?php echo base_url('auth/logout')?>">
            <li class="keluar">
              <i class="fa-solid fa-right-from-bracket"></i>
              <span>Keluar</span>
            </li>
          </a>
        </ul>
      </div>

      <!-- Konten -->
      <div class="konten">
        <div class="judul">
          <h1>Riwayat Pembayaran</h1>
        </div>

        <div class="bungkus">
          <table>
            <tr>
              <th>No</th>
              <th>Pembayaran Bulan</th>
              <th>Tanggal Bayar</th>
              <th>Pembayaran Atas Nama</th>
              <th>Jenis Iuran</th>
              <th>Status Pembayaran</th>
              <th>Keterangan</th>
            </tr>

            <?php
            $no = 1; 
            foreach ($warga as $wg) : 
            ?>

            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $wg->pembayaran_bulan ?></td>
              <td><?php echo date('d F Y', strtotime($wg->tanggal_pembayaran)) ?></td>
              <td><?php echo $wg->atas_nama ?></td>
              <td><?php echo $wg->jenis_iuran ?></td>
              <td><?php if ($wg->status == 0) {
                      echo '<span class="badge badge-pill badge-warning p-1 pr-2 pl-2">Belum di Verifikasi</span>';
                    } elseif ($wg->status == 1) {
                      echo '<span class="badge badge-pill badge-secondary p-1 pr-2 pl-2">Ditolak</span>';
                    } elseif ($wg->status == 2) {
                      echo '<span class="badge badge-pill badge-danger p-1 pr-2 pl-2">Belum Bayar</span>';
                    } else {
                      echo '<span class="badge badge-pill badge-success p-1 pr-2 pl-2">Sudah Bayar</span>';
                    }?>
              </td>
              <td><?php echo $wg->keterangan ?></td>
            </tr>

            <?php endforeach; ?>

          </table>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
