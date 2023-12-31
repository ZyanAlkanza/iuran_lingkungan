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

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/login.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/')?>/img/favicon.ico">

    <title>Login</title>
  </head>
  <body>
    <div class="halaman">
      <div class="teks">
        <form method="POST" action="<?php echo base_url('auth/login')?>">
          <div class="judul">
            <h5>Sistem Informasi</h5>
            <h1>Iuran Lingkungan</h1>
          </div>

          <?php echo $this->session->flashdata('pesan') ?>


          <div class="nama">
            <label for="">Email</label>
            <input class="form-control" type="text" name="email" autocomplete="off"/>
            <div class="text-small text-danger"><?php echo form_error('email'); ?></div>
          </div>
          <div class="sandi">
            <label for="">Kata Sandi</label>
            <input
              class="form-control"
              type="password"
              pattern="[A-Za-z0-9]*"
              name="password"
            />
            <div class="text-small text-danger"><?php echo form_error('password'); ?></div>
          </div>
          <div class="tombol">
            <!-- <a href="<php echo base_url('#')?>"> -->
              <button class="btn btn-primary" type="submit" name="submit">Masuk</button>
            <!-- </a> -->
          </div>
        </form>
      </div>
      <div class="gambar">
        <div class="cover">
            <img src="<?php echo base_url('assets/')?>img/rumah.png">
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
