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

    // proses upload files
    $nama_files = "";
    if($_FILES['files']['name'] != ""){
        $nama_files = time()."_".$_FILES['files']['name'];
        move_uploaded_files($_FILES['files']['tmp_name'], "../../uploads/".$nama_files);
    }

    // QUERY SIMPAN DATA    
    $query = "INSERT INTO surat_keluar (no_urut, no_lengkap, id_kategori, tujuan, perihal, tgl_kirim, files)
        VALUES ('$no_urut','$no_lengkap','$id_kategori','$tujuan','$perihal','$tgl_kirim','$nama_files')";
    
    if(mysqli_query($conn,$query)){
        header("Location: index.php?status=sukses");
    } else {
        echo "Error".mysqli_error($conn);
    }
}

?>