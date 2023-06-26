<?php
@include 'config.php';

$message = array(); // Inisialisasi array pesan
// input
if(isset($_POST['add_product'])){
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_name = 'img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image)){
      $message[] = 'Silakan isi semua kolom.';
   }else{
      $insert = "INSERT INTO daftar_makanan (`nama makanan`, harga, gambar) VALUES ('$product_name', '$product_price', '$product_image_name')";
      $upload = mysqli_query($con, $insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_name);
         $message[] = 'Produk baru berhasil ditambahkan.';
      }else{
         $message[] = mysqli_error($con);
         $message[] = 'Gagal menambahkan produk.';
      }
   }
}
// delete
if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($con, "DELETE FROM daftar_makanan WHERE id = $id");
   header('location: admin_page.php');
   exit;
}
// update
if(isset($_POST['update_product'])){
   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];

   $update = "UPDATE daftar_makanan SET `nama makanan` = '$product_name', harga = '$product_price' WHERE id = $product_id";
   $result = mysqli_query($con, $update);
   if($result){
      $message[] = 'Produk berhasil diperbarui.';
   }else{
      $message[] = mysqli_error($con);
      $message[] = 'Gagal memperbarui produk.';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Halaman Admin</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/admin.css" />

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $msg){
      echo '<span class="message">'.$msg.'</span>';
   }
}
?>

<div class="container">
   <div class="admin-product-form-container">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Tambah Produk Baru</h3>
         <input type="text" placeholder="Masukkan nama produk" name="product_name" class="box">
         <input type="number" placeholder="Masukkan harga produk" name="product_price" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <input type="submit" class="btn" name="add_product" value="Tambah Produk">
      </form>
   </div>

   <?php
   $select = mysqli_query($con, "SELECT * FROM daftar_makanan");
   ?>

   <div class="product-display">
      <table class="product-display-table">
         <thead>
            <tr>
               <th>Gambar Produk</th>
               <th>Nama Produk</th>
               <th>Harga Produk</th>
               <th>Aksi</th>
            </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="<?php echo $row['gambar']; ?>" height="100" alt=""></td>
            <td><?php echo $row['nama makanan']; ?></td>
            <td>Rp<?php echo $row['harga']; ?></td>
            <td>
               <a href="edit_product.php?id=<?php echo $row['id']; ?>"><button class="btn">Edit</button></a>
               <a href="?delete=<?php echo $row['id']; ?>"><button class="btn">Delete</button></a>
            </td>
         </tr>
         <?php } ?>
      </table>
   </div>
   <a href="data.php"><button class="btn">Daftar Pesanan</button></a>
</div>

</body>
</html>
