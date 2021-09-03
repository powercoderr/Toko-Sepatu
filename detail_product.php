<?php 
    //Mengecek Variable kode_sepatu yang dikirim halaman sebelumnya
    if(isset($_GET['kode_sepatu'])){
        include "connect_database.php";
        $kode_sepatu = $_GET['kode_sepatu'];

        //Cek stok sepatu
        $sqlCekStok = "SELECT SUM(stok) AS `total_stok` FROM detailsepatu WHERE kode_sepatu='$kode_sepatu'";
        $queryCekStok = mysqli_query($conn, $sqlCekStok);
        $resultCekStok = mysqli_fetch_assoc($queryCekStok);
        
        if($resultCekStok['total_stok']==0){
            $readyStok = false;
        }else{
            $readyStok = true;
                    
            //Query untuk mendapatkan data sepatu
            $sqlSepatu = "SELECT * FROM sepatu WHERE kode_sepatu ='$kode_sepatu'";
            $querySepatu = mysqli_query($conn, $sqlSepatu);
            $resultSepatu = mysqli_fetch_assoc($querySepatu);

            //Query untuk mendapatkan list varian ukuran dari sepatu
            $sqlUkuran = "SELECT DISTINCT ukuran FROM detailsepatu WHERE stok > 0 AND kode_sepatu = '$kode_sepatu'";
            $queryUkuran = mysqli_query($conn, $sqlUkuran);

            //Query untuk mendapatkan list varian warna dari sepatu
            $sqlWarna = "SELECT DISTINCT warna FROM detailsepatu WHERE stok > 0 AND kode_sepatu = '$kode_sepatu'";
            $queryWarna = mysqli_query($conn, $sqlWarna);
        }
    }
    //Menambah barang ke cart jika button diklik.
    if(isset($_POST['submit'])){
        $ukuran = $_POST['ukuran'];
        $warna = $_POST['warna'];
        foreach($_SESSION['cart'] as $key => $value){
            if($_SESSION['cart'][$key]["kode_sepatu"] == $_GET['kode_sepatu']){
                //_session['cart'][$key] tuh menunjuk ke 1 baris di detailsepatu
                if($_SESSION['cart'][$key]["warna"]==$warna && $_SESSION['cart'][$key]['ukuran'] == $ukuran){//Jika ditemukan row dengan kode_sepatu $key, ukuran $ukuran, dan warna $warna
                    if($_SESSION['cart'][$key]["quantity"] < $_SESSION['cart'][$key]["stok"]){
                        $_SESSION['cart'][$key]["quantity"] += 1;
                        $_SESSION['cart'][$key]["total_harga"] = 
                            $_SESSION['cart'][$key]["harga"] * $_SESSION['cart'][$key]["quantity"];        
                        echo "<script> alert('Barang berhasil ditambahkan ke cart')</script>";
                    }else{
                        echo "<script> alert('Stok Barang Tidak Mencukupi, Gagal Menambahkan Ke Cart')</script>";
                    }
                    
                }
            }
        }
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container-fluid product-detail">
        <?php 
            if($readyStok==true){
               ?>
                <!--Gambar Produk-->
                <img class="product_img" src="./asset/img/<?php echo $resultSepatu['foto'];?>.jpg" alt="Sepatu">
                
                <!--Pemilihan Varian Produk-->
                <div class="detail text-center w-100 p-2">
                    <!--Nama Produk-->
                    <h2><?php echo $resultSepatu['nama_sepatu'];?></h2>
                    <p>Rp. //Continue later</p>
                    <hr>

                    <!--Form Varian-->
                    <form action="" method="post">
                        <!--Pemilihan Ukuran-->
                        <label for="ukuran">Pilih Ukuran:</label>
                        <select name="ukuran" id="ukuran">
                            <?php while($rowUkuran=mysqli_fetch_array($queryUkuran)){
                                ?>
                                <option value="<?php echo $rowUkuran['ukuran'];?>"><?php echo $rowUkuran['ukuran'];?></option>
                                <?php
                            }
                        ?>
                        </select>
                        <br>
                        
                        <!--Pemilihan Warna-->
                        <label for="warna">Pilih Warna:</label>
                        <select name="warna" id="warna">
                            <?php while($rowWarna=mysqli_fetch_array($queryWarna)){
                                ?>
                                <option value="<?php echo $rowWarna['warna'];?>"><?php echo $rowWarna['warna'];?></option>
                                <?php
                            }
                        ?>
                        </select>
                        <br><br><br><hr>
                    
                        <!--Button Add To Cart-->
                        <input class="btn btn-light" type="submit" name="submit" value="Add To Cart">
                    </form>
                </div>

               <?php 
            }else{
                ?>
                <div class="error">
                    <h6>We Are Out Of Stock</h6>
                </div>
                <?php
            }
        ?>
        
    </div>
</body>
</html>