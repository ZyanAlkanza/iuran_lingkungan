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
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/rtDaftarWarga.css" />

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
          <a href="<?php echo base_url('rtData')?>">
            <li>
              <i class="fa-solid fa-file-circle-check"></i>
              <span>Data Pembayaran</span>
            </li>
          </a>

          <a href="<?php echo base_url('rtDaftarWarga')?>">
            <li>
              <i class="fa-solid fa-user-group"></i>
              <span>Daftar Warga</span>
            </li>
          </a>

          <a href="<?php echo base_url('rtDaftarPetugas')?>">
            <li>
              <i class="fas fa-user-shield"></i>
              <span>Daftar Petugas</span>
            </li>
          </a>

          <!-- <a href="php echo base_url('rtRiwayat')?>">
            <li>
              <i class="fa-solid fa-clock-rotate-left"></i>
              <span>Riwayat Pembayaran</span>
            </li>
          </a> -->

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
          <h1>Daftar Warga</h1>
          <div class="tombol">
            <a href="<?php echo base_url('rtDaftarWarga/tambah')?>">
              <button class="btn btn-primary">Tambah</button>
            </a>
          </div>
        </div>
        <div class="bungkus">

          <?php echo $this->session->flashdata('pesan') ?>

          <table>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Blok Rumah</th>
              <th>RT</th>
              <th>RW</th>
              <th>Telepon</th>
              <th class="aksi">Aksi</th>
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
              <td class="aksi">
                <div class="tombol">
                  <a href="<?php echo base_url('rtDaftarWarga/detail/') .$wg->id_warga?>">
                    <button class="btn btn-primary">Detail</button>
                  </a>
                </div>
                <div class="tombol">
                  <a href="<?php echo base_url('rtDaftarWarga/edit/') .$wg->id_warga?>">
                    <button class="btn btn-success">Edit</button>
                  </a>
                </div>
                <div class="tombol">
                  <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $wg->id_warga?>">Hapus</button>
                </div>
              </td>
            </tr>

            <div class="modal fade" id="delete<?php echo $wg->id_warga?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Hapus Data Warga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Anda akan menghapus data Warga ini. Yakin?
                  </div>

                  <div class="modal-footer">
                    <a href="<?php echo base_url('rtDaftarWarga')?>">
                      <button type="button" class="btn btn-secondary pt-1 pd-1 text-small" data-dismiss="modal">Batal</button>
                    </a>
                    <a href="<?php echo base_url('rtDaftarWarga/hapus/') .$wg->id_warga?>">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
