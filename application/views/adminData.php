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
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/adminData.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/')?>/img/favicon.ico">

    <title>Data Pembayaran</title>
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
          <form method="POST" action="<?php base_url('adminData')?>">  
            <div class="judul">
              <h1>Data Pembayaran</h1>
              <div class="tombol">
                <a href="<?php echo base_url().'adminData/pdf/?dari='.set_value('dari').'&sampai='.set_value('sampai')?>" class="btn btn-primary">
                Cetak PDF
                </a>
              </div>
            </div>

            <div class="filter">
              <label for="dari">Dari tanggal</label>
              <input type="date" name="dari" class="form-control">
              <label for="sampai">Sampai tanggal</label>
              <input type="date" name="sampai" class="form-control">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
              </div>
            
            <div class="bungkus">
              <table>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Blok Rumah</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Pembayaran Bulan</th>
                  <th>Jenis Iuran</th>
                  <th>Status</th>
                </tr>

                <?php 
                $no = 1;
                foreach ($transaksi as $tr) : 
                ?>
                
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $tr->nama_warga ?></td>
                  <td><?php echo $tr->blok_rumah ?></td>   
                  <td><?php echo date('d F Y', strtotime($tr->tanggal_pembayaran)) ?></td>
                  <td><?php echo $tr->pembayaran_bulan ?></td>
                  <td><?php echo $tr->jenis_iuran ?></td>
                  <td><?php if ($tr->status == 0) {
                    echo '<span class="badge badge-pill badge-warning p-1 pr-2 pl-2">Belum di Verifikasi</span>';
                  } elseif ($tr->status == 1) {
                    echo '<span class="badge badge-pill badge-danger p-1 pr-2 pl-2">Belum Bayar</span>';
                  } else {
                    echo '<span class="badge badge-pill badge-success p-1 pr-2 pl-2">Sudah Bayar</span>';
                  }?></td>
                </tr>

                <?php endforeach; ?>

              </table>
            </div>
          
          </form>
        </div>
      
    </div>
  </body>
</html>
