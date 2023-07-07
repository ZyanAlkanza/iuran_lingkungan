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
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/adminIuran_edit.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/')?>/img/favicon.ico">

    <title>Edit Daftar Iuran</title>
  </head>
  <body>
    <div class="halaman">
        <!-- Konten -->

        <?php foreach($iuran as $irn) : ?>

        <form method="POST" action="<?php echo base_url('adminIuran/update')?>" enctype="multipart/form-data">
            <h1>Edit Data Iuran</h1>

            <div class="form-group">
                <input type="hidden" class="form-control" name="id_iuran" value="<?php echo $irn->id_iuran?>">
            </div>
            
            <div class="form-group">
                <label for="jenis-iuran">Jenis Iuran <span class="text-danger">*</span></label>
                <input type="text" pattern="[A-Za-z\s]*" class="form-control" id="jenis-iuran" aria-describedby="emailHelp" name="jenis_iuran" value="<?php echo $irn->jenis_iuran?>" autocomplete="off">
            </div>
            
            <div class="form-group">
                <label for="biaya">Biaya Iuran <span class="text-danger">*</span></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">Rp.</div>
                    </div>
                    <input type="number" pattern="[0-9]*" class="form-control" id="biaya" placeholder="100000"  name="biaya" value="<?php echo $irn->biaya?>" autocomplete="off">
                </div>
            </div>
            
            <div class="text-small text-danger">*Wajib diisi</div>
            <button type="submit" class="btn btn-primary submit" name="submit">Simpan Perubahan</button>
        </form>

        <?php endforeach; ?>

  </body>
</html>
