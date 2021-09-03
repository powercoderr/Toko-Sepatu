<?php 
    //Add barang to cart (adding the quantity)
    if(isset($_GET['kodeBarang'])){
        $kodeBarang = $_GET['kodeBarang'];
        if($_SESSION['cart'][$kodeBarang]["quantity"]<$_SESSION['cart'][$kodeBarang]["stok"]){
            $_SESSION['cart'][$kodeBarang]["quantity"] += 1;
            $_SESSION['cart'][$kodeBarang]["total_harga"] = 
                $_SESSION['cart'][$kodeBarang]["harga_barang"] * $_SESSION['cart'][$kodeBarang]["quantity"];
        }else{
            echo '<p id="error-message">Gagal menambahkan ke cart karena stok tidak cukup !!</p>';
        }
        
        unset($_GET['kodeBarang']);
    }
    /*Notes
        p yang di-echo akan muncul di bawah navigasi karena di echo di paling atas cart. 
        Dan cart itu merupakan kontent yang di bawah navigasi.
     */
?>

