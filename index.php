<?php
session_set_cookie_params(3600);
session_start();

// session_start();
require 'connect.php';

// if (!isset($_SESSION['user_logged_in'])) {
//   // Jika belum, arahkan ke halaman login
//   header("Location: login.php");
//   exit;
// }


$pencarian = "";

// Periksa apakah ada input pencarian yang dikirimkan
if(isset($_GET['search'])) {
    $pencarian = $_GET['search'];
    // Query untuk mendapatkan produk berdasarkan kata kunci pencarian
    $produk = mysqli_query($conn, "SELECT * FROM product WHERE nama_produk LIKE '%$pencarian%'");
} else {
    // Jika tidak ada input pencarian, tampilkan semua produk
    $produk = mysqli_query($conn, "SELECT * FROM product");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INIBRAND</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

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

<div id="searchPopup" class="popup">
    <span class="close" onclick="closePopup()">&times;</span>
    <h2>Popup Pencarian</h2>
    <p>Isi dari form pencarian dapat ditambahkan di sini.</p>
    <form method="GET" action="shop.php">
      <input id="formsearch" type="text"/>
      <button type="submit">Cari</button>
    </form>
</div>
    
    <!-- carousel product -->
    <section class="section-1">
        <!-- carousel -->
        <div class="carousel-web">
            <div class="carousel-section">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="img/carousel-1.png" class="d-block mx-auto w-50" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="img/carousel-2.png" class="d-block mx-auto w-50" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="img/carousel-3.png" class="d-block mx-auto w-50" alt="...">
                      </div>
                    </div>
                  </div>
            </div>
        </div>
       
        <!-- carousel potrait -->
        <div class="carousel-potrait"> 
            <div class="carousel-section">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="img/carousel-1.png" class="d-block mx-auto w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="img/carousel-2.png" class="d-block mx-auto w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="img/carousel-3.png" class="d-block mx-auto w-100" alt="...">
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </section>
    <!-- journey -->
    <section>
      <div>

      </div>
    </section>
    <!-- history -->
    <section class="section-2">
        <div class="section-history">
            <h2 class="section-history-title">History</h2>
            <p class="section-history-content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti tenetur perspiciatis et modi repellendus aperiam officia dolores sit. Provident, nostrum non libero tempora veritatis totam nemo atque dolorum ullam facere?
            </p>
        </div>
        <img class="history-img" src="img/history.png"/>
    </section>

    <!-- footer -->
   
   <!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span></span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="footer-content">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Brand
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Produk
          </h6>
          <p>
            <a href="#!" class="text-reset">T-Shirt</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Pants</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Cap</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Aksesoris</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Bantuan
          </h6>
          <p>
            <a href="#!" class="text-reset">Size Chart</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Cara Order</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Store</a>
          </p>
          <p>
            <a href="#!" class="text-reset"></a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Kontak</h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2024 Copyright
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Brand Ini</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="main.js"></script>

</body>
</html>