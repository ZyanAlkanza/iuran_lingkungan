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
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/adminVerifikasi_tambah.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/')?>/img/favicon.ico">

    <title>Tambah Transaksi</title>
  </head>
  <body>
    <div class="halaman">
        <!-- Konten -->
        <form method="POST" action="<?php echo base_url('adminVerifikasi/tambahdata')?>" enctype="multipart/form-data">
            <h1>Tambah Data Transaksi</h1>

            <div class="flashdata">
              <?php echo $this->session->flashdata('pesan') ?>
            </div>

            <div class="kolom">
              
              <div class="kolom1">
                <label for="id_iuran">Jenis Iuran <span class="text-danger">*</span></label>
                <!-- <div class="input-group mb-3"> -->
                  <select class="form-control" id="id_iuran" name="id_iuran" required>
                    <option value="">Pilih Iuran</option>
                    <?php foreach($iuran as $irn) :?>
                    <option value="<?php echo $irn->id_iuran?>"><?php echo $irn->jenis_iuran ?></option>
                    <?php endforeach; ?>
                  </select>
                <!-- </div> -->


                <label for="id_warga">Nama Warga <span class="text-danger">*</span></label>
                <!-- <div class="input-group mb-3"> -->
                  <select class="form-control" id="id_warga" name="id_warga" required>
                    <option value="">Pilih Warga</option>
                    <?php foreach($warga as $wg) :?>
                    <option value="<?php echo $wg->id_warga?>"><?php echo $wg->nama_warga ?></option>
                    <?php endforeach; ?>
                  </select>
                <!-- </div> -->

                <!-- <div class="form-group"> -->
                    <label for="atas_nama">Atas Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="atas_nama" aria-describedby="emailHelp" name="atas_nama" autocomplete="off">
                    <div class="text-small text-danger mt-0 md-0"><?php echo form_error('atas_nama'); ?></div>
                <!-- </div> -->

                <!-- <div class="form-group"> -->
                    <label for="tanggal_pembayaran">Tanggal Pembayaran <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="tanggal_pembayaran" aria-describedby="emailHelp" name="tanggal_pembayaran">
                    <div class="text-small text-danger mt-0 md-0"><?php echo form_error('tanggal_pembayaran'); ?></div>
                <!-- </div> -->

                <label for="pembayaran_bulan">Pembayaran Bulan <span class="text-danger">*</span></label>
                <!-- <div class="input-group mb-3"> -->
                  <select class="form-control" id="pembayaran_bulan" name="pembayaran_bulan" required>
                    <option value="">Pilih Bulan</option>
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
                <!-- </div> -->
              </div>

              

              <div class="kolom2">
                <!-- <div class="form-group"> -->
                    <label for="bukti_pembayaran">Bukti Pembayaran <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" id="bukti_pembayaran" aria-describedby="emailHelp" name="bukti_pembayaran" required>
                    <div class="text-small text-danger">*Format file JPG, JPEG, PNG</div>
                <!-- </div> -->

                <!-- <div class="form-group"> -->
                  <label for="keterangan" class="keterangan">Keterangan</label>
                  <textarea class="form-control" id="keterangan" name="keterangan" maxlength="300"></textarea>
                  <div class="text-small text-danger">*Maksimal 300 karakter</div>
                <!-- </div> -->

                
                <label for="status">Status <span class="text-danger">*</span></label>
                <!-- <div class="input-group mb-3"> -->
                  <select class="form-control" id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="0">Proses Verifikasi</option>
                    <option value="1">Ditolak</option>
                    <option value="2">Belum Bayar</option>
                    <option value="3">Sudah Bayar</option>
                  </select>
                <!-- </div> -->
              </div>

            </div>
            <div class="wajib text-small text-danger">*Wajib diisi</div>
            <button type="submit" class="btn btn-primary submit" name="submit">Tambah Transaksi</button>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
