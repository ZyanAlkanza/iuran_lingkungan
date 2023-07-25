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
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/rwData.css" />

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
          <a href="<?php echo base_url('rwData')?>">
            <li>
              <i class="fa-solid fa-file-circle-check"></i>
              <span>Data Pembayaran</span>
            </li>
          </a>

          <a href="<?php echo base_url('rwDaftarRt')?>">
            <li>
              <i class="fa-solid fa-user-group"></i>
              <span>Daftar Ketua RT</span>
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
          <h1>Data Pembayaran</h1>

          <form action="" method="POST">
              <!-- <input type="text" class="form-control pencarian" name= "pencarian" placeholder="Cari Nama, Blok Rumah atau Bulan..." autocomplete="off" aria-label="Recipient's username" aria-describedby="button-addon2"> -->
              <select name="bulan" id="pencarian" class="form-control">
                <option value="">-- Pilih Bulan --</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
              </select>

              <select name="rt" id="pencarian" class="form-control">
                <option value="">-- Pilih RT --</option>
                <option value="8">RT.08</option>
                <option value="9">RT.09</option>
              </select>

              <div class="input-group-append">
                <button class="btn btn-outline-primary cari" type="submit" id="button-addon2">Cari</button>
              </div>
            </form>

        </div>
        <div class="bungkus">
          <table>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Blok Rumah</th>
              <th>RT</th>
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
              <td>RT. 0<?php echo $tr->rt ?></td>
              <td><?php echo date('d F Y', strtotime($tr->tanggal_pembayaran)) ?></td>
              <td><?php echo $tr->pembayaran_bulan ?></td>
              <td><?php echo $tr->jenis_iuran ?></td>
              <td><?php if ($tr->status == 0) {
                    echo '<span class="badge badge-pill badge-warning p-1 pr-2 pl-2">Belum di Verifikasi</span>';
                  } elseif ($tr->status == 1) {
                    echo '<span class="badge badge-pill badge-secondary p-1 pr-2 pl-2">Ditolak</span>';
                  }elseif ($tr->status == 2) {
                    echo '<span class="badge badge-pill badge-danger p-1 pr-2 pl-2">Belum Bayar</span>';
                  } else {
                    echo '<span class="badge badge-pill badge-success p-1 pr-2 pl-2">Sudah Bayar</span>';
                  }?></td>
            </tr>

            <?php endforeach; ?>

          </table>

          <?php if(empty($transaksi)) :?>
          <div class="alert alert-danger mt-3" role="alert">
            Data Tidak Ditemukan!
          </div>
          <?php endif; ?>

        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
