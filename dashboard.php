<?php
// 1. Query data Article
$sql1 = "SELECT * FROM article ORDER BY tanggal DESC";
$hasil1 = $conn->query($sql1);
$jumlah_article = $hasil1->num_rows;

// 2. Query data Gallery (Tambahan)
$sql2 = "SELECT * FROM galery"; // Pastikan nama tabelnya 'galery' (sesuai database)
$hasil2 = $conn->query($sql2);
$jumlah_galery = $hasil2->num_rows;

// 3. Query User untuk mengambil foto profil (Tambahan)
$username = $_SESSION['username'];
$sql_user = "SELECT * FROM user WHERE username = '$username'";
$result_user = $conn->query($sql_user);
$user_data = $result_user->fetch_assoc();
$foto_profil = $user_data['foto'];
?>

<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center pt-4">
    
    <div class="col-md-12 text-center mb-4">
        <h4 class="fw-normal">Selamat Datang,</h4>
        <h1 class="text-danger fw-bold"><?= $username ?></h1>
        
        <div class="my-4">
            <?php
            // Cek apakah ada file foto
            if (!empty($foto_profil) && file_exists('img/' . $foto_profil)) {
                echo '<img src="img/' . $foto_profil . '" class="rounded-circle border border-danger border-4" style="width: 150px; height: 150px; object-fit: cover;" alt="Foto Profil">';
            } else {
                // Foto default jika belum ada
                echo '<img src="https://via.placeholder.com/150" class="rounded-circle border border-danger border-4" style="width: 150px; height: 150px; object-fit: cover;" alt="Foto Default">';
            }
            ?>
        </div>
    </div>

    <div class="col">
        <div class="card border border-danger mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-newspaper"></i> Article</h5> 
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-danger fs-2"><?php echo $jumlah_article; ?></span>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
    
    <div class="col">
        <div class="card border border-danger mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-camera"></i> Gallery</h5> 
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-danger fs-2"><?php echo $jumlah_galery; ?></span>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
</div>