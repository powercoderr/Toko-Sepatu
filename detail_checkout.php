<?php
     $no_transaksi = $_SESSION['no_transaksi'];
     $sql = "SELECT * FROM transaksi WHERE `no_transaksi`='$no_transaksi'";
     $query = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($query);
    
     //pembulatan berat 
     $berat = pembulatanBerat($_SESSION["total_berat"]);
     
     //nentuin ongkir
     $kode_pos = $_SESSION['kode_pos'];

     $sqlOngkir = "SELECT * FROM ongkir WHERE `kodepos_akhir`='$kode_pos'";
     $queryOngkir = mysqli_query($conn, $sqlOngkir);
     $rowOngkir = mysqli_fetch_assoc($queryOngkir);
     if(is_null($rowOngkir)){
        $ongkir = "Kode Pos Tidak Terdeteksi, Ongkir Error .";
     }else{
        $ongkir = $berat  * $rowOngkir['ongkir_per_kilo'];

     }


     function pembulatanBerat($berat) {
         $berat = $berat / 1000;
         if($berat <=1){
             return 1;
         }else{
            $decimal = $berat -floor($berat);
            if($decimal <= 0.3){
                return floor($berat);
            }else{
                return ceil($berat);
            }
         }
        //jika 0-3
        
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
            td, th{
                padding: 1em;
                border: 1px solid black;
            }
            img{
                background: url(blah.jpg) 50% 50% no-repeat; /* 50% 50% centers image in div */
                width: 250px;
                height: 250px;
            }
        </style>
</head>
<body>
    <div class="container-fluid detail-checkout p-2 pl-5">
        <h4>Costumer Detail</h4>
        <p><b>Nomor Transaksi : </b><?php echo $row['no_transaksi'];?></p>
        <p><b>Tanggal Transaksi : </b><?php echo $row['tanggal'];?></p>
        <p><b>Nama Customer : </b><?php echo $row['nama_pembeli'];?></p>
        <p><b>No Telepon : </b><?php echo $row['no_telepon'];?></p>
        <p><b>Alamat : </b><?php echo $row['alamat'];?></p>
        <p><b>Kecamatan : </b><?php echo $row['kecamatan'];?></p>
        <p><b>Kota : </b><?php echo $row['kota'];?></p>
        <p><b>Kode Pos : </b><?php echo $row['kode_pos'];?></p>
        <p><b>Total Harga Barang : </b><?php echo $row['total_harga'];?></p>
        <p><b>Total Ongkos Kirim : </b><?php echo $ongkir;?></p>
        <?php 
            if(is_null($rowOngkir)){
                ?>
                <p><b>Total Transaksi : </b>Tidak Diketahui</p>
                <?php
             }else{
                ?>
                <p><b>Total Transaksi : </b><?php echo ($row['total_harga']+$ongkir);?></p>
                <?php
        
             }
        ?>
        

        <br><br>
        <h4>Detail Transaksi</h4>
        <?php 
            include "detailPesanan.php";
        ?>
    </div>


</body>
</html>