<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan</title>
    <link rel="stylesheet" href="./css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="tabel ">
        <h1 class="text-center bg-dark text-white p-2 ">Data Pesanan</h1>
        <table class="table align-items-center text-center table-flush " id="dataTable">
            <thead class="thead-light">
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>TELEPON</th>
                    <th>MENU</th>
                    <th>JUMLAH</th>
                    <th>KETERANGAN</th>
                    <th>AKSI</th> <!-- New column for delete action -->
                </tr>
            </thead>
            <tbody>
                <?php
                include ("config.php");
                $query = $con->query("SELECT * FROM pesanan");
                $i = 1;
                while($data = mysqli_fetch_assoc($query)) {
                ?> 
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['telepon'] ?></td>
                    <td><?= $data['pesanmenu'] ?></td>
                    <td><?= $data['jumlah'] ?></td>
                    <td><?= $data['keterangan'] ?></td>
                    <td>
                        <a href="delete_pesanan.php?id=<?= $data['No'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">Delete</a>
                    </td>
                </tr>  
                <?php $i++; } ?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="admin-product-form-container">
        </div>
        <a href="admin_page.php"><button class="btn2"> Halaman Admin</button></a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
            $('#dataTableHover').DataTable();
        });
    </script>
</body>
</html>
