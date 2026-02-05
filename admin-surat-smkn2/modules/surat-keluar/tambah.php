<?php
include '../../config/database.php';
include '../../config/helper.php';
?>

<form action="proses_simpan.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Pilih Jenis Surat</label>
        <select name="id_kategori" id="id_kategori" class="form-control" required>
            <?php
            // ambil data dari tabel referensi kategori
            $tampil = mysqli_query($conn, "SELECT * FROM ref_kategori");
            while($k = mysqli_fetch_array($tampil)){
                echo "<option value='$k[id]'>$k[nama] ($k[kode])</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <input type="text" placeholder="Tujuan Surat" class="form-control" required>
    </div>

    <div class="mb-3">
        <textarea name="perihal" id="perihal" placeholder='Perihal' class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">File Arsip (PDF/JPG)</label>
        <input type="text" name="file" id="file" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Surat Keluar</button>
</form>