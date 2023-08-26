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
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/adminPengeluaran_detail.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/')?>/img/favicon.ico">

    <title>Detail Pengeluaran</title>
  </head>
  <body>
    <div class="halaman">
      <!-- Konten -->
      <div class="konten">
        <div class="judul">
          <h1>Detail Pengeluaran</h1>
        </div>

        <?php foreach($pengeluaran as $p): ?>
        <!-- <form method="POST" action="<php echo base_url('adminVerifikasi/update')?>" enctype="multipart/form-data"> -->
          <div class="isi">  
            
            <!-- <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?php echo $tr->id_transaksi?>"> -->
            <div class="teks">         
              <div class="nama_pengeluaran">
                <h1>Nama Pengeluaran</h1>
                <h2><?php echo $p->nama_pengeluaran ?></h2>
              </div>
              <div class="tanggal_pengeluaran">
                <h1>Tanggal Pengeluaran</h1>
                <h2><?php echo date('d F Y', strtotime($p->tanggal_pengeluaran)); ?></h2>
              </div>     
              <div class="biaya_pengeluaran">
                <h1>Biaya Pengeluaran</h1>
                <h2>Rp. <?php echo number_format($p->biaya_pengeluaran, 0, ',', '.') ?></h2>
              </div>
              <div class="keterangan_pengeluaran">
                <h1>Keterangan</h1>
                <textarea name="keterangan_pengeluaran" id="keterangan_pengeluaran" readonly><?php echo $p->keterangan_pengeluaran ?></textarea>
              </div>
            </div>  
            <div class="gambar">
              <h1>Bukti Pengeluaran</h1>
              <img src="<?php echo base_url('assets/img/buktiPengeluaran/')?><?php echo $p->bukti_pengeluaran?>" alt="" />
            </div>  
          </div>
        <!-- </form> -->
        <?php endforeach; ?>
        
       

      </div>
    </div>
  </body>
</html>