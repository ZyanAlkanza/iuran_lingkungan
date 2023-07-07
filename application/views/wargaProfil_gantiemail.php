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
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/wargaProfil_gantiemail.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/')?>/img/favicon.ico">

    <title>Ubah Email</title>
  </head>
  <body>
    <div class="halaman">
        <!-- Konten -->

        <form method="POST" action="<?php echo base_url('wargaProfil/gantiemailbaru')?>" enctype="multipart/form-data">
            <h1>Ubah Email</h1>

            <?php foreach ($warga as $wg) : ?>

            <input class="form-control" type="hidden" id="id_warga" name="id_warga" value="<?php echo $wg->id_warga?>">

            <label for="email_baru">Email Baru <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="email_baru" name="email_baru" autocomplete="off">
            <div class="text-small text-danger"><?php echo form_error('email_baru'); ?></div>

            <label for="konfirmasi_email">Konfirmasi Email Baru <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="konfirmasi_email" name="konfirmasi_email" autocomplete="off">
            <div class="text-small text-danger"><?php echo form_error('konfirmasi_email'); ?></div>

            <div class="text-small text-danger">*Wajib diisi</div>
            <button type="submit" class="btn btn-primary submit" name="submit">Simpan Perubahan</button>

            <?php endforeach; ?>

        </form>
      

  </body>
</html>
