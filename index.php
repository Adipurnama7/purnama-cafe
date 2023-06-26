<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Purnama Coffe</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  </head>
  <body>
    
    <!-- ======================== navigasi ========================= -->
    <nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand">Purnama Caffe</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars text-white"></i>
        </button>
    <div class="collapse navbar-collapse text-right" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#menu">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#booking">Booking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#kontak">Contact</a>
        </li>
      </ul>
    </div>  
  </div>
</nav>

    <!--      =========================== Home ============================= -->
    <main id="home" class="flex-center">
      <div class="home_text">
        <h1>Nikmati Hidangan lezat Kami</h1>
        <p>Cara Terbaik Untuk Memulai Hari Kita Mulai Minum Kopi Bersama Dan Membuat Hari Ini Menjadi Luar Biasa.</p>
        <a href="#menu"><button type="button "><h5>Beli sekarang</h5></button></a>
      </div>
    </main>


    <!--  =========================   Tentang ======================-->

    <section class="about" id="about">
      <div class="img-container">
        <div class="images">
          <div class="img1"><img src="./img/about1.jpg" /></div>
          <div class="img2"><img src="./img/about2.jpg" /></div>
        </div>
        <div class="images2">
          <div class="img1"><img src="./img/about3.jpg" /></div>
          <div class="img2"><img src="./img/about4.jpg" /></div>
        </div>
      </div>
      <div class="about-description">
        <h4>Tentang Kami <span></span></h4>
        <h1>Selamat Datang Di  Purnama Caffe</h1>
        <p class="p1">Kami Bangga Memberikan Pengalaman Yang Tak Terlupakan Untuk Para Pelanggan Kami. Kami Berkomitmen Untuk Menyajikan hidangan Terbaik.</p>
        <p class="p2"> Kami Senang Menjadi Bagian Dari Komunitas Kopi Lokal Dan Membangun Hubungan Yang Kokoh Dengan Para Pelanggan Kami. Selamat Datang Di PURNAMA COFFEE, Tempat Di Mana Kopi Dan Kehangatan Selalu Menyatu.</p>
        <div class="experience">
        <div class="button">
         <a href="#booking"> <button class="botton1">Pesan Sekarang</button></a>
        </div>
      </div>
    </section>

    <!--================================  menu   =================================-->
    <?php
      require ('config.php');
     $makanan = query("SELECT * FROM daftar_makanan");
    ?>
    <div class="container text-center" id="menu">
  <h2 class="display-3">Menu</h2>
  <div class="text_menu">
    <!-- Mulai perulangan -->
    <?php $count = 0; ?>
    <div class="row pt-5 gx-4 gy-4">
      <?php foreach ($makanan as $mkn) : ?>
        <div class="col-md-4">
          <div class="card crop-img bg-light">
            <img src="<?php echo $mkn["gambar"]; ?>" class="card-img-top" width="200" height="300" />
            <div class="card-body">
              <h5 class="card-title"><?php echo $mkn["nama makanan"]; ?></h5>
              <a href="#booking" class="btn btn-primary">Rp.<?php echo $mkn["harga"]; ?></a>
            </div>
          </div>
        </div>
        <?php
        $count++;
        if ($count % 3 == 0) {
          echo '</div><div class="row pt-5 gx-4 gy-4">';
        }
        ?>
      <?php endforeach; ?>
    </div>
    <!-- Selesai perulangan -->
  </div>
</div>


   <!-- ===================  Pesan  ===================== -->

  <section class="booking-section" id="booking">
      <div class="reservation">
        <!-- form akan mengarah ke pesan.php untuk diproses datanya (Dikirim dengan metode POST) -->
        <form action="pesan.php" method="post"> 
          <h1 class="h-1">PESAN HIDANGAN</h1>
          <div class="data">
              <input type="text" name="nama" placeholder="Nama"required>
              <select name="menu"  required readonly>
              <option  disabled selected hidden> pilih menu</option >
              <?php foreach ($makanan as $mkn) : ?>
                <option value="<?php echo $mkn["nama makanan"]; ?>"><?php echo $mkn["nama makanan"]; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="data">
              <input type="Handphon" name="telpon" placeholder="No Telepon" required>
              <input type="text" name="jumlah" placeholder=" jumlah dipesan" required>
          </div>
          <textarea placeholder="Special Request" name="ket" ></textarea>
          <button type="submit" name="pesan" class="reserve-button">Pesan Sekarang</button>
        </form>      
      </div>
</section>
<!--======================= kontak======================  -->
<nav class="navbar navbar-expand-lg navbar-dark" id="kontak">
  <div class="container">
    <ul class="navbar-nav ml-auto" style="margin-left: auto; margin-right: auto;">
      <li class="nav-item">
        <a class="nav-link" href="https://wa.me/62082321568554?text=Halo%2C+saya+tertarik+untuk+menghubungi+Anda"target="_blank"><i class="fab fa-whatsapp"></i> whatsapp</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.instagram.com/adiipurnamaaa"target="_blank"><i class="fab fa-instagram"></i> instagram</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.facebook.com/adi.purnama.9484941?mibextid=ZbWKwL"target="_blank"><i class="fab fa-facebook"></i> Fecebook</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mailto:adipurnamaa8@gmail.com"target="_blank"><i class="far fa-envelope"></i> Email</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.linkedin.com/in/adi-purnama-83674b278" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a>
      </li>
    </ul>
  </div>
</nav>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-eZj6fzhoHB5UuN8ve1BAd9NlJp6t/Hdk6nlJoqL42dt4OEXaTTurH6iS2sAwAVD0BRs3yB6PgJhOKZB+G9oGZg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
