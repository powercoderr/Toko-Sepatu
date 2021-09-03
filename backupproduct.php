<?php
    //Add barang to cart (adding the quantity) if add to chart button clicked
    include "add_cart_item.php";
    
    //Query to get data from database
    include "connect_database.php";
    $sql = 'SELECT * FROM barang';
    $query = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Online Shop</title>
        <style>
            span{
                font-weight: bold;
            }
            .col-3{
                line-height: 0.8;
                border-radius: 7.5px;
            }
            #error-message{
                margin: 1.5em;
                color: red;
            }
            .col-3>img{
                background: url(blah.jpg) 50% 50% no-repeat; /* 50% 50% centers image in div */
                width: 250px;
                height: 250px;
            }
        </style>
    </head>

    <body>    
        <!--Produk-->
        <div class="container">
            <h4 class="ml-5 mt-3"><i>Katalog Produk</i></h4>
            <br>
            <div class="row">
                <?php
                    while ($row = mysqli_fetch_array($query)){
                        ?>
                        <div class="col-3 card bg-light m-3 ml-auto p-3">
                            <img src="img/<?php echo $row['gambar'];?>" alt="gambar product">
                            <br>
                            <p><span>Kode Barang :</span> <?php echo $row['kode_barang']?></p>
                            <p><span>Nama Barang : </span> <?php echo $row['nama_barang']?></p>
                            <p><span>Berat Barang : </span> <?php echo $row['berat']?>gr</p>
                            <p><span>Stok : </span> <?php echo $row['stok']?></p>
                            <p><span>Harga Barang : </span> Rp.<?php echo $row['harga_barang']?></p>
                            <!--When the button clicked then kodeBarang variable will be initialize to trigger adding quantity-->
                            <a class="btn btn-primary" href="home.php?content=product.php&kodeBarang=<?php echo $row['kode_barang']; ?>">Add To Chart</a>
                        </div>
                        <?php
                    }
                ?>
            </div>
            <br>
            <div class="download ml-5 mt-3">
                <p><i>Download PDF Katalog Produk</i></p>
                <form class="form-inline" method="post" action="generate_pdf.php">
                    <input type="submit" id="pdf" name="generate_pdf" class="btn btn-primary" value="Download">
                </form>
            </div>
            <br>
        </div>
    </body>
</html>