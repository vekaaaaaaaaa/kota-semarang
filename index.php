<?php
//menyertakan code dari file koneksi
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kota Semarang - Bootstrap</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background-color: #f8f9fa;
    }
    header h1 {
      font-weight: 700;
      letter-spacing: 2px;
    }
    .nav-link {
      font-weight: 500;
    }
    .hero {
      background: url('img/tugu.webp') center/cover no-repeat;
      height: 60vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.6);
    }
    .hero h2 {
      font-size: 3rem;
      background: rgba(0,0,0,0.4);
      padding: 10px 20px;
      border-radius: 10px;
    }
    footer {
      background-color: #0d6efd;
      color: white;
    }
  </style>
  </style>
<style>
    /* BODY */
    [data-bs-theme="dark"] body {
        background-color: #121212!important;
        color: white !important;
    }

    /* NAVBAR */
    [data-bs-theme="dark"] .navbar {
        background-color: #1f1f1f !important;
    }

    /* CARD */
    [data-bs-theme="dark"] .card {
        background-color: #1e1e1e !important;
        color: white !important;
        border-color: #333 !important;
    }

    /* ACCORDION */
    [data-bs-theme="dark"] .accordion-button {
        background-color: #2a2a2a !important;
        color: white !important;
    }
    [data-bs-theme="dark"] .accordion-body {
        background-color: #1e1e1e !important;
        color: white !important;
    }

    /* BG-LIGHT → DARK */
    [data-bs-theme="dark"] .bg-light {
        background-color: #1e1e1e !important;
        color: white !important;
    }

    /* FOOTER */
    [data-bs-theme="dark"] footer {
        background-color: #0e0228 !important;
        color: white !important;
    }

    /* FORM INPUTS */
    [data-bs-theme="dark"] .form-control,
    [data-bs-theme="dark"] textarea,
    [data-bs-theme="dark"] input {
        background-color: #2a2a2a !important;
        color: white !important;
        border-color: #444 !important;
    }

    /* HERO TEXT */
    [data-bs-theme="dark"] .hero h2 {
        background: rgba(0,0,0,0.6) !important;
    }
</style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Kota Semarang</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#beranda">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
          <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
          <li class="nav-item"><a class="nav-link" href="#schedule">schedule</a></li>
          <li class="nav-item"><a class="nav-link" href="#about me">about me</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php" target="_blank">Login</a></li>
           <li class="nav-item ms-3">
           <button class="btn btn-outline-dark btn-sm me-1" onclick="ubahKeDark()">
             <i class="bi bi-moon-stars-fill"></i> Dark
           </button>
           <button class="btn btn-outline-warning btn-sm" onclick="ubahKeLight()">
             <i class="bi bi-sun-fill"></i> Light
           </button>
          </li>
        </ul>     
      </div>
    </div>
  </nav>

  <section id="beranda" class="hero">
    <div class="col-md-6 text-sm-start mt-4 mt-md-0">
      <h2 class="fw-bold display-4">Selamat Datang di kota Semarang</h2>
      <div class="h5 text-danger">
      <span id="tanggal"></span> | <span id="jam"></span>
    </div>
  </section>

  <section class="container my-5 text-center">
    <h3 class="fw-bold mb-3">KOTA SEMARANG</h3>
    <p class="lead">
      Semarang adalah ibu kota dan kota terbesar di Provinsi Jawa Tengah, Indonesia. 
      Kota ini merupakan pelabuhan utama pada masa penjajahan Belanda, dan masih menjadi pusat regional dan pelabuhan penting hingga saat ini. 
      Kota ini dinobatkan sebagai destinasi wisata terbersih di Asia Tenggara oleh Standar Kota Wisata Bersih ASEAN untuk periode 2020–2022. 
      Seperti kota besar lainya, Kota Semarang mengenal sistem pembagian wilayah kota yang terdiri atas: Semarang Tengah atau Semarang Pusat, Semarang Timur, Semarang Selatan, Semarang Barat, dan Semarang Utara. 
      Pembagian wilayah kota ini bermula dari pembagian wilayah sub-residen oleh Pemerintah Hindia Belanda yang setingkat dengan kecamatan. 
      Namun saat ini, pembagian wilayah kota ini berbeda dengan pembagian administratif wilayah kecamatan.
      Meskipun pembagian kota ini jarang dipergunakan dalam lingkungan Pemerintahan Kota Semarang. 
      Namun pembagian kota ini digunakan untuk mempermudah dalam menerangkan suatu lokasi menurut letaknya terhadap pusat kota Semarang. 
      Pembagian kota ini juga digunakan oleh beberapa instansi di lingkungan Kota Semarang untuk mempermudah jangkauan pelayanan, seperti PLN dan PDAM.
    </p>
  </section>
   <!--article begin-->
    <section id="article" class="text-center p-5">
    <div class="container">
        <h1 class="fw-bold display-4 pb-3">article</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        <?php
        $sql = "SELECT * FROM article ORDER BY tanggal DESC";
        $hasil = $conn->query($sql); 

        print_r($hasil);
        while ($row = $hasil->fetch_assoc()){
        ?>
            <!--col begin-->
            <div class="col">
                <div class="card h-100">
                    <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title"><?= $row["judul"]?></h5>
                        <p class="card-text">
                            <?= $row["isi"]?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">
                            <?= $row["tanggal"]?>
                        </small>
                    </div>
                </div>
            </div>
            <!--col end-->
            <?php
            }
            ?>  
        </div>
    </div>
</section>
<!--artile end-->

  <section id="gallery" class="text-center p-5 bg-danger-subtle">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Gallery</h1>
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <?php
                    // Panggil koneksi (biasanya di index.php sudah ada include "koneksi.php" di atas)
                    // Jika belum ada, uncomment baris bawah ini:
                    // include "koneksi.php";

                    $sql = "SELECT * FROM galery ORDER BY tanggal DESC";
                    $hasil = $conn->query($sql);

                    // Variabel untuk mengecek item pertama (agar bisa dikasih class 'active')
                    $first_item = true;

                    while ($row = $hasil->fetch_assoc()) {
                    ?>
                        <div class="carousel-item <?php if ($first_item) { echo 'active'; $first_item = false; } ?>">
                            <img src="img/<?= $row['gambar'] ?>" class="d-block w-100" alt="Gambar Gallery">
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
 <section id="schedule" class="text-center p-5">
    <div class="container">
        <h1 class="fw-bold display-4 pb-3">Schedule</h1>
        
        <div class="row g-4 justify-content-center">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card h-100 p-4 shadow-sm">
                    <div class="display-4 text-danger mb-3"><i class="bi bi-book"></i></div>
                    <h5 class="fw-bold">Membaca</h5>
                    <p class="small text-muted">Menambah wawasan setiap pagi sebelum beraktivitas.</p>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card h-100 p-4 shadow-sm">
                    <div class="display-4 text-danger mb-3"><i class="bi bi-laptop"></i></div>
                    <h5 class="fw-bold">Menulis</h5>
                    <p class="small text-muted">Mencatat setiap pengalaman harian di jurnal pribadi.</p>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card h-100 p-4 shadow-sm">
                    <div class="display-4 text-danger mb-3"><i class="bi bi-people"></i></div>
                    <h5 class="fw-bold">Diskusi</h5>
                    <p class="small text-muted">Bertukar ide dengan teman dalam kelompok belajar.</p>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card h-100 p-4 shadow-sm">
                    <div class="display-4 text-danger mb-3"><i class="bi bi-bicycle"></i></div>
                    <h5 class="fw-bold">Olahraga</h5>
                    <p class="small text-muted">Menjaga kesehatan dengan bersepeda sore hari.</p>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card h-100 p-4 shadow-sm">
                    <div class="display-4 text-danger mb-3"><i class="bi bi-film"></i></div>
                    <h5 class="fw-bold">Movie</h5>
                    <p class="small text-muted">Menonton film yang bagus di bioskop.</p>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card h-100 p-4 shadow-sm">
                    <div class="display-4 text-danger mb-3"><i class="bi bi-bag"></i></div>
                    <h5 class="fw-bold">Belanja</h5>
                    <p class="small text-muted">Membeli kebutuhan bulanan di supermarket.</p>
                </div>
             </div>
         </div>
     </div> </section>

     <section id="aboutme">
  <div class="container text-center">
    <h1 class="fw-bold mb-4">About Me</h1>
    <div class="accordion" id="accordionPanelsStayOpenExample">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button bg-danger-subtle" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
            Universitas Dian Nuswantoro (2024-Now)
          </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
          <div class="accordion-body">
            <strong>This is the first item’s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
           SMA Theresiana 01 Semarang (2024-2021)
          </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
          <div class="accordion-body">
            <strong>This is the second item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
          SMP Theresiana 01Semarang (2021-2018)
          </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
          <div class="accordion-body">
            <strong>This is the third item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
          </div>
        </div>
      </div>
    </div>

 

  <section id="kontak" class="container py-5">
    <h3 class="text-center fw-bold mb-4">Buku Tamu</h3>
    <p class="text-center">Silakan tinggalkan pesan, kritik, atau saran Anda melalui form di bawah ini.</p>

    <form class="mx-auto col-md-8 col-lg-6 bg-white p-4 rounded shadow-sm">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama Anda" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="nama@email.com" required>
      </div>
      <div class="mb-3">
        <label for="pesan" class="form-label">Pesan</label>
        <textarea class="form-control" id="pesan" rows="4" placeholder="Tulis pesan Anda di sini..." required></textarea>
      </div>
      <button type="submit" class="btn btn-primary w-100">Kirim</button>
    </form>
  </section>


  <footer class="text-center p-3 bg-danger-subtle">
			<div>
				<a href="https://www.instagram.com/udinusofficial"><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
				<a href="https://twitter.com/udinusofficial"><i class="bi bi-twitter h2 p-2 text-dark"></i></a>
				<a href="https://wa.me/+62812685577"><i class="bi bi-whatsapp h2 p-2 text-dark"></i></a>
			</div>
			<div>vincent j.k &copy; 2025</div>
    </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

    <button type="button" id="backToTop" class="btn btn-danger rounded-circle position-fixed bottom-0 end-0 m-3 d-none p-3 shadow">
        <i class="bi bi-arrow-up h4"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script type="text/javascript">
        
        function tampilWaktu() {
            var waktu = new Date();
            var bulan = waktu.getMonth();
            var tanggal = waktu.getDate();
            var tahun = waktu.getFullYear();
            var jam = waktu.getHours();
            var menit = waktu.getMinutes();
            var detik = waktu.getSeconds();

            var arrBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

            var tanggal_full = tanggal + " " + arrBulan[bulan] + " " + tahun;
            var jam_full = jam + ":" + menit + ":" + detik;

            document.getElementById("tanggal").innerHTML = tanggal_full;
            document.getElementById("jam").innerHTML = jam_full;
        }

        tampilWaktu(); 
        setInterval(tampilWaktu, 1000);

        const backToTopBtn = document.getElementById("backToTop");

        backToTopBtn.addEventListener("click", function() {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });

        window.addEventListener("scroll", function() {
            if (window.scrollY > 300) {
                backToTopBtn.classList.remove("d-none"); 
                backToTopBtn.classList.add("d-block");  
            } else {
                backToTopBtn.classList.remove("d-block"); 
                backToTopBtn.classList.add("d-none");    
            }
        });

        function ubahKeDark() {
            document.documentElement.setAttribute('data-bs-theme', 'dark');
        }
        function ubahKeLight() {
            document.documentElement.setAttribute('data-bs-theme', 'light');
        }
    </script>
</body>
</html>
