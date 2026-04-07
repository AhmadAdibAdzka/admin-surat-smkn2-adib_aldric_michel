<?php
include '../../config/koneksi.php';
include '../../config/helper.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_kategori    = $_POST['id_kategori'];
    $tujuan         = $_POST['tujuan'];
    $perihal        = $_POST['perihal'];
    $tgl_kirim      = $_POST['tgl_kirim'];

    // mengambil fungsi penomoran
    $penomoran  = generateNoSurat($conn, $id_kategori);
    $no_urut    = $penomoran['no_urut'];
    $no_lengkap = $penomoran['no_lengkap'];

    // proses upload file (Disesuaikan dari 'files' ke 'file' agar sesuai dengan tambah.php)
    $nama_file = "";
    if($_FILES['file']['name'] != ""){
        $nama_file = time()."_".$_FILES['file']['name'];
        // Gunakan move_uploaded_file (Tanpa s)
        move_uploaded_file($_FILES['file']['tmp_name'], "../../uploads/surat-keluar/".$nama_file);
    }

    // QUERY SIMPAN DATA (Nama kolom disesuaikan dengan database: 'file')
    $query = "INSERT INTO surat_keluar (no_urut, no_lengkap, id_kategori, tujuan, perihal, tgl_kirim, file)
        VALUES ('$no_urut','$no_lengkap','$id_kategori','$tujuan','$perihal','$tgl_kirim','$nama_file')";
    
    if(mysqli_query($conn, $query)){
        header("Location: index.php?status=sukses");
    } else {
        echo "Error: ".mysqli_error($conn);
    }
}
?>