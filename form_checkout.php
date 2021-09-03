<?php
    if(isset($_POST['checkoutButton'])){  
        include "checkout_process.php";
        //Menampilkan detail checkout
        $host = $_SERVER['SERVER_NAME'] . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
            if($host == "localhost/TokoSepatu/home.php"){
                header("Location: http://localhost/TokoSepatu/home.php?content=detail_checkout.php");
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .alamat{
            width: 75%;
        }
    </style>
</head>
<body>
    <div class="container-fluid form-checkout">
        <div class="d-flex flex-column border border-secondary rounded bg-light p-2">
            <div class="text-center">
                <h4>Form Data Diri Online Shop</h4>
                <p><i>Silakan isi data diri terlebih dahulu untuk melanjutkan transaksi</i></p>
            </div>    
            <form method="post" action="" class="">
                <br>
                <label class="form-label" for="no_transaksi">Nomor Transaksi : </label><br/>
                <input type="text" name="no_transaksi" id="no_transaksi" placeholder="Ex : tr001" required><br/><br/>
                
                <label class="form-label" for="nama_pembeli">Nama : </label><br/>
                <input type="text" name="nama_pembeli" id="nama_pembeli" placeholder="Ex : Udin" required><br/><br/>

                <label class="form-label" for="no_telepon">Nomor Telepon : </label><br/>
                <input type="text" name="no_telepon" id="no_telepon" placeholder="Ex : 0813222828" required><br><br/>

                <label class="form-label" for="alamat">Alamat : </label><br>
                <input class = "w-md-75" type="text" name="alamat" id="alamat" placeholder="Ex : Jalan raya gunung batu no 2 rt 3r rw 11 desa gunung batu" required><br><br/>

                <label class="form-label" for="kecamatan">Kecamatan : </label><br>
                <input type="text" name="kecamatan" id="kecamatan" placeholder="Ex : Majapahit" required><br><br/>

                <label class="form-label" for="kota">Kota : </label><br>
                <input type="text" name="kota" id="kota" placeholder="Ex : Majalaya" required><br><br/>

                <label class="form-label" for="kode_pos">Kode Pos : </label><br>
                <input type="text" name="kode_pos" id="kode_pos" placeholder="Ex : 51662" required><br><br/>
                <br>
                <input type="submit" name="checkoutButton" value="Checkout" class="btn btn-success">
            </form>
        </div>
    </div>
</body>
</html>