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
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/adminIuran.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/')?>/img/favicon.ico">

    <title>Daftar Iuran</title>
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
          <h1>Daftar Iuran</h1>
          <div class="tombol">
            <a href="<?php echo base_url('adminIuran/tambah')?>">
              <button class="btn btn-primary">Tambah</button>
            </a>
          </div>
        </div>

        <div class="flashdata">
          <?php echo $this->session->flashdata('pesan') ?>
        </div>  

        <table>
          <tr>
            <th class="no">No</th>
            <th class="jenis">Jenis Iuran</th>
            <th class="biaya">Biaya</th>
            <th class="aksi">Aksi</th>
          </tr>

          <?php 
          $no = 1;
          foreach ($iuran as $irn) :
          ?>
          
          <tr>
            <td class="no"><?php echo $no++ ?></td>
            <td class="jenis"><?php echo $irn->jenis_iuran ?></td>
            <td class="biaya">Rp. <?php echo number_format($irn->biaya, 0, ',', '.') ?></td>
            <td class="aksi">
              <div class="tombol">
                <a href="<?php echo base_url('adminIuran/edit/') .$irn->id_iuran?>">
                  <button class="btn btn-success">Edit</button>
                </a>
              </div>
              <div class="tombol">
                <button class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Hapus</button>
              </div>
            </td>
          </tr>

          <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Hapus Data Iuran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Anda akan menghapus data Iuran ini. Yakin?
                </div>

                <div class="modal-footer">
                  <a href="<?php echo base_url('adminIuran')?>">
                    <button type="button" class="btn btn-secondary pt-1 pd-1 text-small" data-dismiss="modal">Batal</button>
                  </a>
                  <a href="<?php echo base_url('adminIuran/hapus/') .$irn->id_iuran?>">
                    <button type="button" class="btn btn-danger pt-1 pd-1 text-small">Hapus</button>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <?php endforeach; ?>

        </table>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
