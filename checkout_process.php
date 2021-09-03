<?php
    //Insert tabel transaksi
    $no_transaksi= $_POST['no_transaksi'];
    $_SESSION['no_transaksi']=$no_transaksi;
    $nama_pembeli = $_POST['nama_pembeli'];
    $no_telepon = $_POST['no_telepon'];
    $alamat = $_POST['alamat'];
    $kecamatan = $_POST['kecamatan'];
    $kota = $_POST['kota'];
    $kode_pos = $_POST['kode_pos'];     
    $_SESSION['kode_pos']=$kode_pos;
    
    $sql = "INSERT INTO `transaksi`(`no_transaksi`, `tanggal`, `nama_pembeli`, `no_telepon`, `alamat`, `kecamatan`, `kota`, `kode_pos`, `total_harga`) VALUES ('$no_transaksi', CURDATE(),'$nama_pembeli','$no_telepon','$alamat','$kecamatan','$kota','$kode_pos','')";
    $query = mysqli_query($conn, $sql);
        
    //Move cart to db
    foreach ($_SESSION['cart'] as $key => $value) {            
        //Hanya menambahkan sepatu yang ditambahkan di cart (quantity cart >0)
        if($_SESSION['cart'][$key]["quantity"] > 0){

            //Memperbaharui stok di table sepatu
            $quantity = $_SESSION['cart'][$key]["quantity"];
            $stok = $_SESSION['cart'][$key]["stok"]-$quantity;
            $kode_sepatu = $_SESSION['cart'][$key]["kode_sepatu"];
            $warna = $_SESSION['cart'][$key]["warna"];
            $ukuran = $_SESSION['cart'][$key]["ukuran"];
            $sql = "UPDATE `detailsepatu` SET `stok`='$stok' WHERE (`kode_sepatu`='$kode_sepatu' AND `warna`='$warna' AND `ukuran`='$ukuran')";
            mysqli_query($conn, $sql);

            //inset tabel jual
            $harga_jual = $_SESSION['cart'][$key]["total_harga"];
            $sql = "INSERT INTO jual VALUES ('$no_transaksi', '$kode_sepatu', '$warna', '$ukuran', '$quantity', '$harga_jual')";
            mysqli_query($conn, $sql);
        }
    }
    $total_harga = $_SESSION['harga_all_item'];
    //insert total_harga tabel transaksi
    $sql= "UPDATE `transaksi` SET `total_harga`='$total_harga' WHERE `no_transaksi`='$no_transaksi'";
    mysqli_query($conn, $sql);
    

   
?>