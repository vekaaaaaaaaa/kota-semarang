<?php
include "koneksi.php";
include "upload_foto.php";
?>

<div class="container">
    <div class="row mb-2">
        <div class="col-md-6">
            <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus-lg"></i> Tambah Galery
            </button>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" id="search" class="form-control"
                    placeholder="ketikan minimal 3 karakter untuk pencarian..">
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="result"></tbody>
        </table>
    </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Galery</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
function loadData(keyword = '') {
    $.ajax({
        url: "galery_search.php",
        type: "POST",
        data: { keyword: keyword },
        success: function (data) {
            $("#result").html(data);
        }
    });
}

loadData();

$("#search").on("keyup", function () {
    let keyword = $(this).val();
    if (keyword.length >= 3 || keyword.length === 0) {
        loadData(keyword);
    }
});
</script>

<?php
/* ================= SIMPAN / UPDATE ================= */
if (isset($_POST['simpan'])) {

    $judul    = $_POST['judul'];
    $tanggal  = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $gambar   = '';

    if (!empty($_FILES['gambar']['name'])) {
        $upload = upload_foto($_FILES['gambar']);
        if ($upload['status']) {
            $gambar = $upload['message'];
        } else {
            echo "<script>alert('{$upload['message']}');</script>";
            exit;
        }
    }

    if (!empty($_POST['id'])) {
        // UPDATE
        $id = $_POST['id'];

        if ($gambar == '') {
            $gambar = $_POST['gambar_lama'];
        } else {
            unlink("img/" . $_POST['gambar_lama']);
        }

        $stmt = $conn->prepare(
            "UPDATE galery SET judul=?, gambar=?, tanggal=?, username=? WHERE id=?"
        );
        $stmt->bind_param("ssssi", $judul, $gambar, $tanggal, $username, $id);

    } else {
        // INSERT
        $stmt = $conn->prepare(
            "INSERT INTO galery (judul, gambar, tanggal, username)
             VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("ssss", $judul, $gambar, $tanggal, $username);
    }

    $stmt->execute();
    echo "<script>alert('Simpan data sukses');location='admin.php?page=galery';</script>";
}

/* ================= HAPUS ================= */
if (isset($_POST['hapus'])) {

    $id     = $_POST['id'];
    $gambar = $_POST['gambar'];

    if ($gambar != '') {
        unlink("img/" . $gambar);
    }

    $stmt = $conn->prepare("DELETE FROM galery WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo "<script>alert('Hapus data sukses');location='admin.php?page=galery';</script>";
}
?>
