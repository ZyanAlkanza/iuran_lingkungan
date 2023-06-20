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
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/adminVerifikasi_detail.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/')?>/img/favicon.ico">

    <title>Verifikasi Pembayaran</title>
  </head>
  <body>
    <div class="halaman">
      <!-- Konten -->
      <div class="konten">
        <div class="judul">
          <h1>Detail Pembayaran</h1>
        </div>

        <?php foreach($transaksi as $tr): ?>
        <form method="POST" action="<?php echo base_url('adminVerifikasi/update')?>" enctype="multipart/form-data">
          <div class="isi">  
            
            <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?php echo $tr->id_transaksi?>">
            <div class="teks">         
              <div class="nama">
                <h1>Nama</h1>
                <h2><?php echo $tr->nama_warga ?></h2>
              </div>
              <div class="alamat">
                <h1>Blok Rumah</h1>
                <h2><?php echo $tr->blok_rumah ?></h2>
              </div>
              <div class="rt">
                <h1>RT / RW</h1>
                <h2>0<?php echo $tr->rt ?> / 0<?php echo $tr->rw ?></h2>
              </div>
              <div class="atasNama">
                <h1>Atas Nama</h1>
                <h2><?php echo $tr->atas_nama ?></h2>
              </div>
              <div class="tanggal">
                <h1>Tanggal Pembayaran</h1>
                <h2><?php echo date('d F Y', strtotime($tr->tanggal_pembayaran)); ?></h2>
              </div>
              <div class="bulan">
                <h1>Pembayaran Bulan</h1>
                <h2><?php echo $tr->pembayaran_bulan ?></h2>
              </div>
              <h1>Status Pembayaran</h1>
              <select class="form-control" name="status" id="status" autofocus>
                <option selected>-- <?php if($tr->status == 0){
                  echo 'Proses Verifikasi';
                }elseif ($tr->status == 1) {
                  echo 'Belum Bayar';
                }else{
                  echo 'Sudah Bayar';
                } ?> --</option>
                <option value="0">Proses Verifikasi</option>
                <option value="1">Belum Bayar</option>
                <option value="2">Sudah Bayar</option>
              </select>      
              <div class="keterangan">
                <h1>Keterangan</h1>
                <textarea name="keterangan" id="keterangan" readonly><?php echo $tr->keterangan ?></textarea>
              </div>
            </div>  
            <div class="gambar">
              <h1>Bukti Pembayaran</h1>
              <img src="<?php echo base_url('assets/img/bukti/')?><?php echo $tr->bukti_pembayaran?>" alt="" />
            </div>  
          </div>  
          <div class="tombol">
            <button type="submit" name="submit" class="btn btn-primary">Verifikasi Pembayaran</button>
          </div>
        </form>
        <?php endforeach; ?>
        
       

      </div>
    </div>
  </body>
</html>