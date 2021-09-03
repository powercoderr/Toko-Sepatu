<?php
    //Create cart session if not done before
    include "create_cart.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!--Produk-->
    <div class="products p-2">
        <div class="container mx-auto">
            <div class="row">
                <?php
                    //Query untuk mengambil data sepatu dari database.
                    $sql = 'SELECT * FROM sepatu';
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($query)){
                        ?>
                        <div class="card col-lg-3 bg-light m-3 p-3">
                            <img class="product-image" src="./asset/img/<?php echo $row['foto'];?>.jpg" alt="<?php echo $row['nama_sepatu'];?>">
                            <br>
                            <p><span class="kode_sepatu">[<?php echo $row['kode_sepatu']?>]</span>
                            <span class="nama_sepatu"><?php echo $row['nama_sepatu']?></span></p>
                            <p><span>Berat Sepatu : </span> <?php echo $row['berat']?>gr</p>
                            
                            <!--Ketika button add to cart diklik maka masuk ke halaman detail product.-->
                            <a class="btn btn-primary" href="home.php?content=detail_product.php&kode_sepatu=<?php echo $row['kode_sepatu']; ?>">Add To Chart</a>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
</body>
</html>