<?php 
    session_start();
    include "connect_database.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="./asset/css/custome.css?v=<?php echo time();?>">
        <link rel="stylesheet" href="./asset/css/index.css?v=<?php echo time();?>">
        <title>Toko Sepatu</title>
    </head>

<body>
    <!--Navigasi-->
    <nav class="navbar navbar-expand-lg navbar-light bg-custome p-3">
        <a class="navbar-brand" href="home.php?content=<?php echo'landing_page.php'?>">Toko Sepatu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item active">
                    <a class="nav-link current"  href="home.php?content=<?php echo'landing_page.php'?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item current">
                    <a class="nav-link" href="home.php?content=<?php echo'product.php'?>">Produk</a>
                </li>
                <li class="nav-item current">
                    <a class="nav-link" href="home.php?content=<?php echo'cart.php'?>">Cart</a>
                </li>
            </ul>
        </div>
    </nav>

    
    <!--Content(landing page / product / cart / form / etc) -->
    <?php
        if(isset($_GET['content'])){
            $content = $_GET['content'];
            include $content;
        }else{
            include "landing_page.php";
        }   
    ?>
</body>
</html>