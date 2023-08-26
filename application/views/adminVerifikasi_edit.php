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
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/adminVerifikasi_edit.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/')?>/img/favicon.ico">

    <title>Edit Transaksi</title>
  </head>
  <body>
    <div class="halaman" >
        <!-- Konten -->
        <form method="POST" action="<?php echo base_url('adminVerifikasi/editdata')?>" enctype="multipart/form-data">
          <h1>Edit Data Transaksi</h1>

          <?php foreach ($transaksi as $tr) : ?>
            <div class="kolom">

              <div class="kolom1">
                <input name="id_transaksi" type="hidden" value="<?php echo $tr->id_transaksi?>">

                <label for="id_iuran">Jenis Iuran <span class="text-danger">*</span></label>
                <select name="id_iuran" id="id_iuran" class="form-control" required>
                  <option value="">-- Pilih Iuran --</option>
                  <?php foreach  ($iuran as $iu) : ?>
                  <option value="<?php echo $iu->id_iuran?>" <?php echo $iu->id_iuran == $tr->id_iuran ? 'selected' : ''?>><?php echo $iu->jenis_iuran ?></option>
                  <?php endforeach; ?>
                </select>

                <label for="id_warga">Nama Warga <span class="text-danger">*</span></label>
                <select name="id_warga" id="id_warga" class="form-control" required>
                  <option value="">-- Pilih Warga --</option>
                  <?php foreach  ($warga as $wg) : ?>
                  <option value="<?php echo $wg->id_warga?>" <?php echo $wg->id_warga == $tr->id_warga ? 'selected' : ''?>><?php echo $wg->nama_warga ?></option>
                  <?php endforeach; ?>
                </select>

                <label for="atas_nama">Atas Nama <span class="text-danger">*</span></label>
                <input name="atas_nama" id="atas_nama" type="text" value="<?php echo $tr->atas_nama?>" class="form-control" autocomplete="off" required>

                <label for="tanggal_pembayaran">Tanggal Pembayaran <span class="text-danger">*</span></label>
                <input name="tanggal_pembayaran" id="tanggal_pembayaran" type="date" value="<?php echo $tr->tanggal_pembayaran?>" class="form-control" required>

                <label for="pembayaran_bulan">Pembayaran Bulan <span class="text-danger">*</span></label>
                <select name="pembayaran_bulan" id="pembayaran_bulan" class="form-control" required>
                  <option value="">--Pilih Bulan--</option>
                <?php foreach ($bulan as $bln) : ?>
                      <?php if($bln == $tr->pembayaran_bulan) : ?>
                        <option value="<?= $bln;?>" selected><?= $bln; ?></option>
                        <?php else : ?>
                        <option value="<?= $bln;?>"><?= $bln; ?></option>
                      <?php endif; ?>
                <?php endforeach; ?>
                  <!-- <option value="">-- <php echo $tr->pembayaran_bulan ?> --</option>
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
                  <option value="Desember">Desember</option> -->
                </select>
              </div>

              <div class="kolom2">
                <label for="bukti_pembayaran">Bukti Pembayaran</label>
                <input name="bukti_pembayaran" id="bukti_pembayaran" type="file" value="<?php echo $tr->bukti_pembayaran?>" class="form-control">
                <div class="text-small text-danger">*Format file JPG, JPEG, PNG</div>

                <label for="keterangan" class="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" maxlength="300"><?php echo $tr->keterangan ?></textarea>
                <div class="text-small text-danger">*Maksimal 300 karakter</div>
              </div>
              
            </div>
          <?php endforeach; ?>
          <div class="text-small text-danger">*Wajib diisi</div>
          <button type="submit" class="btn btn-primary submit" name="submit">Simpan Perubahan</button>
        
        </form>


  </body>
</html>
