<table class ="bg-light">
    <tr>   
        <th>Nama Sepatu</th>
        <th>Foto Sepatu</th>
        <th>Kode Sepatu</th>
        <th>Warna Sepatu</th>
        <th>Ukuran Sepatu</th>
        <th>Harga Barang</th>
        <th>Stok</th>
        <th>Quantity</th>
        <th>Total Harga</th>
    </tr>        
    <!--Data cart-->
    <?php
    
    //Manipulasi untuk mencari tahu total harga cart dan total berat cart 
    $_SESSION["harga_all_item"] = 0;
    foreach ($_SESSION['cart'] as $key => $value) {//Value merupakan sebuah array
        echo "<tr>";
        //Hanya memproses (menampilkan data, menghitung berat, dan menghitung harga) dari cart yang quantitynya tidak 0.
        if($_SESSION['cart'][$key]['quantity'] != 0){

            //Manipulasi untuk mendapatkan nama sepatu dan foto(tidak ada di cart), lalu menampilkan data sepatu tsb.
            $kode_sepatu = $_SESSION['cart'][$key]['kode_sepatu'];
            $sqlCariSepatu = "SELECT * FROM sepatu where kode_sepatu='$kode_sepatu'";
            $queryCariSepatu = mysqli_query($conn, $sqlCariSepatu);
            $result = mysqli_fetch_assoc($queryCariSepatu); //Berisi 1 row sepatu dengan kode_sepatu yang sama dengan kode sepatu di cart dengan key $key
            echo "<td>".$result['nama_sepatu']."</td>";
            ?>
            <td>
                <img class="foto_sepatu" src="./asset/img/<?php echo $result['foto'];?>.jpg" alt="Gambar sepatu">
            </td>
            <?php

            //Lanjut manipulasi total harga cart dan total berat cart
            $_SESSION["harga_all_item"] = $_SESSION["harga_all_item"] + $_SESSION['cart'][$key]['total_harga'];

            //Loop lain karena array multi dimensi
            foreach ($value as $sub_key => $sub_val) {      
                echo "<td>". $sub_val. "</td>";
            }
            ?>
            </tr>
            <?php
        }
    }
    //Menampilkan Total Harga Seluruh Cart
    echo "<tr>";
    echo "<td colspan='7'>Total</td>";
    echo "<td colspan='3'>". $_SESSION['harga_all_item']. "</td>";
    echo "</tr>";
    echo "<tr>";
    ?>
</table>