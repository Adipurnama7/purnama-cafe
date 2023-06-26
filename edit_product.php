<?php
@include 'config.php';

$message = array(); // Inisialisasi array pesan

if(isset($_GET['id'])){
   $product_id = $_GET['id'];
   $select = mysqli_query($con, "SELECT * FROM daftar_makanan WHERE id = $product_id");
   $product = mysqli_fetch_assoc($select);

   if(isset($_POST['update_product'])){
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];

      $update = "UPDATE daftar_makanan SET `nama makanan` = '$product_name', harga = '$product_price' WHERE id = $product_id";
      $result = mysqli_query($con, $update);
      if($result){
         $message[] = 'Produk berhasil diperbarui.';
         $product = array('nama makanan' => '', 'harga' => ''); // Clear the product variable
      }else{
         $message[] = mysqli_error($con);
         $message[] = 'Gagal memperbarui produk.';
      }
   }
}else{
   header('location: admin_page.php');
   exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Produk</title>

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
      <form action="" method="post">
         <h3>Edit Produk</h3>
         <input type="text" placeholder="Masukkan nama produk" name="product_name" class="box" value="<?php echo $product['nama makanan']; ?>">
         <input type="number" placeholder="Masukkan harga produk" name="product_price" class="box" value="<?php echo $product['harga']; ?>">
         <input type="submit" class="btn" name="update_product" value="Perbarui Produk">
      </form>
   </div>
   <a href="admin_page.php"><button class="btn">Kembali ke Halaman Admin</button></a>
</div>

</body>
</html>
