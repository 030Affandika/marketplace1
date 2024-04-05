<?php
session_set_cookie_params(3600);
session_start();
if (!isset($_SESSION['user_logged_in'])) {
  // Jika belum, arahkan ke halaman login
  header("Location: login.php");
  exit;
}
require 'connect.php';

$produk = mysqli_query($conn, "SELECT * FROM product WHERE id_product = '".$_GET['id']."' ");
$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
/>
</head>
<body>

<nav>
    <div class="nav-section">
      <div class="hamburger">&#9776;</div>
        <a href="index.php"><img class="logo" href="index.php" src="img/"/></a>
        <div class="search-nav" style="width:20vw;" id="showPopup">
          <img class="search-btn" src="img/search icon.png"/>
          <a>Cari</a>
        </div>
        <!-- pop up search -->


          <ul class="menu-nav">
            <li>
            <?php
    $kategori = mysqli_query($conn, "SELECT * FROM category ORDER BY id_category");
    if(mysqli_num_rows($kategori) > 0){
        while($k = mysqli_fetch_array($kategori)){
            echo '<a href="product_category.php?category_id='.$k['id_category'].'">'.$k['category_name'].'</a>';
        }
    } else {
        echo '<p>Kategori tidak ada</p>';
    }
?>
                <a href="shop.php">Shop</a>
                <a href="beranda.html">About</a>
                <?php 
                  if ($_SESSION){
                    echo '<a href="logout.php">Logout</a>';
                  } else {
                    echo '<a href="login.php">Login</a>';
                  }
                  ?>
            </li>
        </ul>
        
        <img class="search-btn-potrait" src="img/search icon.png" />
    </div>
   
</nav>  

<!-- prodct details -->
    <div class="detail-box" >
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo $p->product_image_1 ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo $p->product_image_2 ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo $p->product_image_3 ?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        
    </div>
    
    <div>
    <div class="product-detail-spec">
        <p><?php echo $p->product_spec ?></p> 
        </div>
   
        <div class="product-name-price">
        <p><?php echo $p->name_product ?></p>
        <p>Rp. <?php echo $p->product_price ?></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
</body>
</html>