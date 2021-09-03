<?php 
    session_start();
    foreach($_SESSION['cart'] as $sepatu){
        echo "kode sepatu : ".$sepatu['kode_sepatu']."<br>";
        echo "warna : ".$sepatu['warna']."<br>";
        echo "ukuran : ".$sepatu['ukuran']."<br>";
        echo "harga : ".$sepatu['harga']."<br>";
        echo "stok : ".$sepatu['stok']."<br>";
        echo "quantity : ".$sepatu['quantity']."<br>";
        echo "Total Harga : ".$sepatu['total_harga']."<br>";
        echo "<br><br>";
    }

    
?>