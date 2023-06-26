<?php
include("config.php");

if(isset($_POST['pesan'])){
    $nama = $_POST['nama'];
    $menu = $_POST['menu'];
    $telepon = $_POST['telpon'];
    $jumlah = $_POST['jumlah'];
    $ket = $_POST['ket'];

    $sql = "INSERT INTO pesanan (nama, telepon, pesanmenu, jumlah, keterangan) VALUES ('$nama', '$telepon', '$menu', '$jumlah', '$ket')";
    $query = mysqli_query($con, $sql);

    if($query) {
        echo '<script>
        alert("Berhasil Menambahkan Pesanan!!");
        window.location.href="index.php";
        </script>';
    } else {
        echo '<script>
        alert("Gagal Menambahkan Pesanan!!");
        window.location.href="index.php";
        </script>';
    }
}

// Delete record
if(isset($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM pesanan WHERE id = '$delete_id'";
    $delete_result = mysqli_query($con, $delete_query);

    if($delete_result) {
        echo '<script>
        alert("Berhasil Menghapus Pesanan!!");
        window.location.href="pesan.php";
        </script>';
    } else {
        echo '<script>
        alert("Gagal Menghapus Pesanan!!");
        window.location.href="pesan.php";
        </script>';
    }
}
?>
