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
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/adminWarga.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/')?>/img/favicon.ico">

    <title>Daftar Warga</title>
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
        <a href="<?php echo base_url('adminIuran')?>">
            <li>
            <i class="fas fa-money-check-alt"></i>
              <span>Iuran</span>
            </li>
          </a>

          <a href="<?php echo base_url('adminWarga')?>">
            <li>
              <i class="fas fa-user-friends"></i>
              <span>Daftar Warga</span>
            </li>
          </a>

          <a href="<?php echo base_url('adminVerifikasi')?>">
            <li>
              <i class="fas fa-user-check"></i>
              <span>Verifikasi Pembayaran</span>
            </li>
          </a>

          <a href="<?php echo base_url('adminData')?>">
            <li>
              <i class="fa-sharp fa-solid fa-file-invoice-dollar"></i>
              <span>Data Pembayaran</span>
            </li>
          </a>

          <a href="<?php echo base_url('login')?>">
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
          <h1>Daftar Warga</h1>
          <!-- <div class="tombol">
            <a href="php echo base_url('adminWarga/tambah')">
              <button class="btn btn-primary">Tambah</button>
            </a>
          </div> -->
        </div>

        <table>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Blok Rumah</th>
            <th>RT</th>
            <th>RW</th>
            <th>Telepon</th>
            <!-- <th>Aksi</th> -->
          </tr>

          <?php 
          $no = 1;
          foreach ($warga as $wg) :
          ?>
          
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $wg->nama_warga ?></td>
            <td><?php echo $wg->blok_rumah ?></td>
            <td>RT. 0<?php echo $wg->rt ?></td>
            <td>RW. 0<?php echo $wg->rw ?></td>
            <td><?php echo $wg->telepon ?></td>
            <!-- <td class="aksi">
              <div class="tombol">
                <a href=" php echo base_url('adminWarga/edit/') .$wg->id_warga?>">
                  <button class="btn btn-warning">Edit</button>
                </a>
              </div>
              <div class="tombol">
                <a href=" php echo base_url('adminWarga/hapus/') .$wg->id_warga?>">
                  <button class="btn btn-danger">Hapus</button>
                </a>
              </div>
            </td> -->
          </tr>

          <?php endforeach; ?>

        </table>
      </div>
    </div>
  </body>
</html>
