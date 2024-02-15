<?php 

require_once('connection/koneksi.php');
if(isset($_POST['tombol']))
{
    $temp = $_FILES['fileGallery']['tmp_name'];
    $name = rand(0,9999).$_FILES['fileGallery']['name'];
    $nameTrim = str_replace(' ', '', $name);
    $size = $_FILES['fileGallery']['size'];
    $type = $_FILES['fileGallery']['type'];
    $deskripsiGallery = $_POST['deskripsiGallery'];
    $deskripsiJudul = $_POST['deskripsiJudul'];
    $folder = "gallery/";
    $dest = $folder.$nameTrim;

    if ($size < 9048000 and ($type =='image/jpeg' or $type == 'image/png')) {
        move_uploaded_file($temp, $folder . $nameTrim);
        // mysqli_query($con, "INSERT INTO w_upload_transfer (nama_file,deskripsi,tipe_file,ukuran_file, id_pesan) VALUES ('$name','$keterangan','$type','$size', '$id_pesan')");
        $sql = "INSERT INTO w_gallery (deskripsi, title, url, nama_file, tipe_file, ukuran_file) VALUES ('$deskripsiGallery', '$deskripsiJudul',  '$dest', '$nameTrim', '$type', '$size')";

        if ($con->query($sql) === TRUE) {
            echo "<b>Berhasil upload, Kembali untuk lanjutkan transaksi</b>";
            echo "<br>";
            echo "<a href='/eWedding/pages/adminpage/index.php?content=gallery'> OKE !</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }else{
        echo "<b>Gagal Upload File</b>";
        echo "<br>";
        echo "<a href='/eWedding/pages/adminpage/index.php?content=gallery'> BACK !</a>";
    }
}
?>