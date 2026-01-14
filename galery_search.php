<?php
// File: galery_data.php
include "koneksi.php";

$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : "";

// Query pencarian
$sql = "SELECT * FROM galery WHERE judul LIKE '%$keyword%' OR tanggal LIKE '%$keyword%' ORDER BY tanggal DESC";
$hasil = $conn->query($sql);

$no = 1;
while ($row = $hasil->fetch_assoc()) {
?>
    <tr>
        <td><?= $no++ ?></td>
        <td>
            <strong><?= $row['judul'] ?></strong>
            <br>
            <small class="text-muted">
                pada : <?= $row['tanggal'] ?> <br>
                oleh : <?= isset($row['username']) ? $row['username'] : 'admin' ?>
            </small>
        </td>
        <td>
            <?php
            if ($row['gambar'] != '') {
                if (file_exists('img/' . $row['gambar'] . '')) {
            ?>
                    <img src="img/<?= $row['gambar'] ?>" width="100" class="img-thumbnail">
            <?php
                }
            }
            ?>
        </td>
        <td>
            <div class="d-flex flex-column align-items-center gap-2">
                
                <a href="#" title="Edit" class="btn btn-success btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id'] ?>">
                    <i class="bi bi-pencil"></i>
                </a>

                <a href="#" title="Delete" class="btn btn-danger btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row['id'] ?>">
                    <i class="bi bi-x-circle"></i>
                </a>

            </div>

            <div class="modal fade" id="modalEdit<?= $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Gallery</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul" value="<?= $row['judul'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Ganti Gambar</label>
                                    <input type="file" class="form-control" name="gambar">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput3" class="form-label">Gambar Lama</label>
                                    <?php
                                    if ($row['gambar'] != '') {
                                        if (file_exists('img/' . $row['gambar'] . '')) {
                                    ?>
                                            <br><img src="img/<?= $row['gambar'] ?>" width="100">
                                    <?php
                                        }
                                    }
                                    ?>
                                    <input type="hidden" name="gambar_lama" value="<?= $row['gambar'] ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" value="simpan" name="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalHapus<?= $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Yakin akan menghapus data "<strong><?= $row['judul'] ?></strong>"?</label>
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <input type="hidden" name="gambar" value="<?= $row['gambar'] ?>">
                                    <?php
                                    if ($row['gambar'] != '') {
                                        if (file_exists('img/' . $row['gambar'] . '')) {
                                    ?>
                                            <br><img src="img/<?= $row['gambar'] ?>" width="100">
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" value="hapus" name="hapus" class="btn btn-primary">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </td>
    </tr>
<?php
}
?>