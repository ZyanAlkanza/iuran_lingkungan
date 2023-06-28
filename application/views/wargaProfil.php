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
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/wargaProfil.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/')?>/img/favicon.ico">

    <title>Profil</title>
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
          <h1>Profil</h1>
        </div>

        <?php echo $this->session->flashdata('pesan') ?>

        <?php foreach($warga as $wg) : ?>
        <div class="isi">
          <div class="nama">
            <h1>Nama Warga</h1>
            <h2><?php echo $wg->nama_warga ?></h2>
          </div>

          <div class="alamat">
            <h1>Alamat</h1>
            <h2>Puri Kencana Blok <?php echo $wg->blok_rumah ?> RT. 0<?php echo $wg->rt ?> / RW. 0<?php echo $wg->rw ?></h2>
          </div>

          <div class="telepon">
            <h1>Telepon</h1>
            <h2><?php echo $wg->telepon ?></h2>
          </div>

          <div class="email">
            <h1>Email</h1>
            <h2><?php echo $wg->email ?></h2>
            <a href="<?php echo base_url('wargaProfil/gantiemail')?>">
              <button class="btn btn-outline-primary">Ubah Email</button>
            </a>
          </div>

          <div class="tombol">
            <h1>Kata Sandi</h1>
            <a href="<?php echo base_url('wargaProfil/gantisandi')?>">
              <button class="btn btn-outline-primary">Ubah Sandi</button>
            </a>
          </div>
          <div class="tombol mt-3">
            <a href="<?php echo base_url('wargaProfil/edit')?>">
              <button class="btn btn-primary">Ubah Profil</button>
            </a>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
