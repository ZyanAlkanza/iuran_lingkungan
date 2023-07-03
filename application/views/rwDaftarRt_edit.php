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
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/rwDaftarRt_edit.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/')?>/img/favicon.ico">

    <title>Edit Profil Ketua RT</title>
  </head>
  <body>
    <div class="halaman">
        <!-- Konten -->
        <form method="POST" action="<?php echo base_url('rwDaftarRt/editdata')?>" enctype="multipart/form-data">
            <h1>Edit Profil Ketua RT</h1>

              <?php foreach ($warga as $wg) : ?>
            
                <input type="hidden" value="<?php echo $wg->id_warga?>" name="id_warga">

                <label for="nama_warga">Nama Ketua RT <span class="text-danger">*</span></label>
                <input type="text" pattern="[A-Za-z0-9\s]*" class="form-control" id="nama_warga" aria-describedby="emailHelp" name="nama_warga" value="<?php echo $wg->nama_warga?>" required>
                <div class="text-small text-danger"><?php echo form_error('nama_warga'); ?></div>       
                
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo $wg->email?>" required>
                <div class="text-small text-danger"><?php echo form_error('email'); ?></div>
            
                <label for="blok_rumah">Blok Rumah <span class="text-danger">*</span></label>
                <input type="text" pattern="[A-Z0-9]*" class="form-control" id="blok_rumah" aria-describedby="emailHelp" name="blok_rumah" value="<?php echo $wg->blok_rumah?>" required>
                <div class="text-small text-danger text-blok">*Ditulis huruf besar</div>
                <div class="text-small text-danger"><?php echo form_error('blok_rumah'); ?></div>
                        
                <label for="rt">RT <span class="text-danger">*</span></label>
                <select name="rt" id="rt" class="form-control">
                  <?php foreach ($rt as $r) : ?>
                    <?php if($r == $wg->rt) : ?>
                      <option value="<?= $r;?>" selected>RT. 0<?= $r;?></option>
                      <?php else : ?>
                      <option value="<?= $r;?>">RT. 0<?= $r;?></option>
                      <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                <div class="text-small text-danger"></div>
                
                <label for="telepon">Telepon <span class="text-danger">*</span></label>
                <input type="text" pattern="[0-9]*" class="form-control" id="telepon" aria-describedby="emailHelp" name="telepon" value="<?php echo $wg->telepon?>" required>
                <div class="text-small text-danger"><?php echo form_error('telepon'); ?></div>            
                
              <?php endforeach; ?>  

            <div class="text-small text-danger wajib">*Wajib diisi</div>
            <button type="submit" class="btn btn-primary submit" name="submit">Simpan Perubahan</button>
        </form>


  </body>
</html>
