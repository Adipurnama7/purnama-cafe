<?php
include("config.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $delete_query = "DELETE FROM pesanan WHERE No = '$id'";
    $delete_result = mysqli_query($con, $delete_query);

    if($delete_result) {
        echo '<script>
        alert("Berhasil Menghapus Pesanan!!");
        document.location.href="data.php";
        </script>';
    } else {
        echo '<script>
        alert("Gagal Menghapus Pesanan!!");
        window.location.href="data.php";
        </script>';
    }
} else {
    echo '<script>
    alert("ID Pesanan tidak ditemukan!!");
    window.location.href="data.php";
    </script>';
}
?>
