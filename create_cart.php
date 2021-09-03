<?php 
    if(isset($_SESSION['cart'])){
        //Do Nothing
    }else{
        $sql = 'SELECT * FROM detailsepatu';
        $query = mysqli_query($conn, $sql);

        $_SESSION['cart']=array();      
        while ($row = mysqli_fetch_array($query)){
            $_SESSION['cart'][]=[
                "kode_sepatu" => $row['kode_sepatu'],
                "warna" => $row['warna'],
                "ukuran"=>$row['ukuran'],                
                "harga" => $row['harga'],
                "stok" => $row['stok'],
                "quantity" => 0,
                "total_harga" => 0
            ];
        }
    }
?>