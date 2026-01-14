<?php
include "koneksi.php";

// 1. Perbaikan: Cek apakah ada keyword dikirim, jika tidak kosongkan
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : "";

// Query pencarian dengan Prepared Statement (Aman dari SQL Injection)
$sql = "SELECT * FROM article 
        WHERE judul LIKE ? OR isi LIKE ? OR tanggal LIKE ? OR username LIKE ?
        ORDER BY tanggal DESC";

$stmt = $conn->prepare($sql);
$search = "%" . $keyword . "%";
$stmt->bind_param("ssss", $search, $search, $search, $search);
$stmt->execute();
$hasil = $stmt->get_result();

$no = 1;
while ($row = $hasil->fetch_assoc()) {
?>
    <tr>
        <td><?= $no++ ?></td>
        <td>
            <strong><?= $row["judul"] ?></strong>
            <br>
            <small class="text-muted">
                pada : <?= $row["tanggal"] ?> <br>
                oleh : <?= $row["username"] ?>
            </small>
        </td>
        <td style="white-space: normal; max-width: 600px;">
    <?= nl2br(htmlspecialchars($row["isi"])) ?>
</td>

        <td>
            <?php
            if ($row["gambar"] != '') {
                if (file_exists('img/' . $row["gambar"] . '')) {
            ?>
                    <img src="img/<?= $row["gambar"] ?>" width="100">
            <?php
                }
            }
            ?>
        </td>
        <td>
            <div class="d-flex flex-column align-items-center gap-2">
                <a href="#" title="edit" class="btn btn-success btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row["id"] ?>">
                    <i class="bi bi-pencil"></i>
                </a>
                <a href="#" title="delete" class="btn btn-danger btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row["id"] ?>">
                    <i class="bi bi-x-circle"></i>
                </a>
            </div>

            <div class="modal fade" id="modalEdit<?= $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Article</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="hidden" name="gambar_lama" value="<?= $row['gambar'] ?>">
                                
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul" value="<?= $row['judul'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="floatingTextarea2">Isi</label>
                                    <textarea class="form-control" name="isi" required><?= $row['isi'] ?></textarea>
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
                                    <label for="formGroupExampleInput" class="form-label">Yakin akan menghapus artikel "<strong><?= $row['judul'] ?></strong>"?</label>
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