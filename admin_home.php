<?php
// Mulai session
session_start();

// Periksa apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['admin_logged_in'])) {
    // Jika belum, arahkan ke halaman login
    header("Location: login.php");
    exit;
}

// Tambahkan logika lainnya untuk halaman admin_home di sini

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body class="admin-body">
    <a href="logout.php">Logout</a>
    <div>
        <a href="">Tampilan pengguna</a>
    </div>
    <div class="admin-menu">
        <ul>
            <li>
                <a href="new_product.php">Tambah produk</a>
                <br>
                <a href="edit_product">Edit produk</a>
                <br>
                <a href="">Tambah produk</a>
                <br>
                <a href="">Tambah produk</a>
            </li>
        </ul>
    </div>
</body>
</html>