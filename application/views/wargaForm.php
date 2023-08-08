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
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/wargaForm.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/')?>/img/favicon.ico">

    <title>Form Pembayaran</title>
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
          <h1>Form Pembayaran</h1>
        </div>
        
        <?php echo $this->session->flashdata('pesan') ?>

        <form method="POST" action="<?php echo base_url('wargaForm/tambahdata')?>" enctype="multipart/form-data">
          
          <div class="bungkus">
            <div class="bungkus-kiri">
              <?php foreach($warga as $wg) :?>
                <input type="hidden" value="<?php echo $wg->id_warga?>" name="id_warga">
              <?php endforeach; ?>
    
              <div class="jenis-iuran">
                <h3>Jenis Iuran <span class="text-danger">*</span></h3>
                <select class="form-control" id="id_iuran" name="id_iuran" required>
                  <option value="">Pilih Iuran</option>
                  <?php foreach($iuran as $iu) :?>
                  <option value="<?php echo $iu->id_iuran?>"><?php echo $iu->jenis_iuran ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="input-nama">
                <h3>Pembayaran Atas Nama <span class="text-danger">*</span></h3>
                <input class="form-control" type="text" placeholder="a.n. " name="atas_nama" autocomplete="off"/>
              </div>
              <div class="input-tanggal">
                <h3>Tanggal Pembayaran <span class="text-danger">*</span></h3>
                <input class="form-control" type="date" name="tanggal_pembayaran"/>
              </div>

              <!-- <label for="pembayaran_bulan">Pembayaran Bulan <span class="text-danger">*</span></label>
              <div class="row bulan">
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
                <button class="btn btn-danger hapus">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </div>

              <div class="row bulan">
                <select class="form-control" id="pembayaran_bulan" name="bulan2">
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
                <button class="btn btn-danger hapus">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </div>

              <div class="row bulan">
                <select class="form-control" id="pembayaran_bulan" name="bulan3">
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
                <button class="btn btn-danger hapus">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </div> -->
              
              <!-- <div class="input-group mb-3"> -->
                <!-- <select class="form-control" id="pembayaran_bulan" name="pembayaran_bulan" required>
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
                </select> -->
                
                <label for="pembayaran_bulan">Pembayaran Bulan <span class="text-danger">*</span></label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Januari" id="Januari" name="bulan1">
                <label class="form-check-label" for="Januari">
                  Januari
                </label>
  
                <input class="form-check-input" type="checkbox" value="Februari" id="Februari" name="bulan2">
                <label class="form-check-label" for="Februari">
                  Februari
                </label>
  
                <input class="form-check-input" type="checkbox" value="Maret" id="Maret" name="bulan3">
                <label class="form-check-label" for="Maret">
                  Maret
                </label>
  
                <input class="form-check-input" type="checkbox" value="April" id="April" name="bulan4">
                <label class="form-check-label" for="April">
                  April
                </label>
  
                <br>
  
                <input class="form-check-input" type="checkbox" value="Mei" id="Mei" name="bulan5">
                <label class="form-check-label" for="Mei">
                  Mei
                </label>
  
                <input class="form-check-input" type="checkbox" value="Juni" id="Juni" name="bulan6">
                <label class="form-check-label" for="Juni">
                  Juni
                </label>
  
                <input class="form-check-input" type="checkbox" value="Juli" id="Juli" name="bulan7">
                <label class="form-check-label" for="Juli">
                  Juli
                </label>
  
                <input class="form-check-input" type="checkbox" value="Agustus" id="Agustus" name="bulan8">
                <label class="form-check-label" for="Agustus">
                  Agustus
                </label>
  
                <br>
  
                <input class="form-check-input" type="checkbox" value="September" id="September" name="bulan9">
                <label class="form-check-label" for="September">
                  September
                </label>
  
                <input class="form-check-input" type="checkbox" value="Oktober" id="Oktober" name="bulan10">
                <label class="form-check-label" for="Oktober">
                  Oktober
                </label>
  
                <input class="form-check-input" type="checkbox" value="November" id="November" name="bulan11">
                <label class="form-check-label" for="November">
                  November
                </label>
  
                <input class="form-check-input" type="checkbox" value="Desember" id="Desember" name="bulan12">
                <label class="form-check-label" for="Desember">
                  Desember
                </label>
              </div>
            </div>

            <div class="bungkus-kanan">
              <div class="input-bukti">
                <h3>Bukti Pembayaran <span class="text-danger">*</span></h3>
                <input class="form-control" type="file" name="bukti_pembayaran" required/>
              </div>
              <div class="input-keterangan">
                <h3>Keterangan</h3>
                <textarea name="keterangan" id="keterangan" maxlength="300"></textarea>
              </div>
            </div> 
          </div>

          <h3 class="wajib"><span class="text-danger">*</span>Wajib Diisi</h3>
          <button type="submit" class="btn btn-primary">Konfirmasi</button>

        </form>
        
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
