<?php 
    session_start();
    foreach ($_SESSION['cart'] as $key => $value) {
        
        //Just print the item that have been added to cart (quanitity isn't 0)
        echo $_SESSION['cart'][$key]['total_harga'];
        echo "<br>" ;
        if($_SESSION['cart'][$key]['quantity'] != 0){
            echo $key;
        echo "asu";
            $_SESSION["total_harga"] = $_SESSION["total_harga"] + $_SESSION['cart'][$key]['harga'];
            //$_SESSION["total_berat"] = $_SESSION["total_berat"] + $_SESSION['cart'][$key]['berat']*$_SESSION['cart'][$key]['quantity'];

            //another loop because multidimentional array (value is an array)
            foreach ($value as $sub_key => $sub_val) {      
                // if($sub_key=="gambar"){
                //     echo "<td><img alt='Gambar Produk' src='img/$sub_val'></td>";
                // }else{
                //     echo "<td>". $sub_val. "</td>";
                // }         
                echo "<td>". $sub_val. "</td>";
            }
            ?>
            <td><a href="home.php?content=cart.php&kodeBarang=<?php echo $key?>">Delete</a></td>
            <?php
            echo "</tr>";
        }
    }
?>