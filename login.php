<?php 
session_set_cookie_params(3600);
session_start();
require 'connect.php';
if (isset($_SESSION['admin_logged_in'])) {
    // Jika belum, arahkan ke halaman login
    header("Location: admin_home.php");
    exit;
}
if (isset($_SESSION['user_logged_in'])) {
    // Jika belum, arahkan ke halaman login
    header("Location: index.php");
    exit;
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
</head>
<body class="body-login">
    <section class="login-section">
        <h1>Login</h1>
        <br>
        <div>
            <form action="" method="post">
            <p>
                <label for="name">Username</label>
                <br>
                <input type="text" id="username" name="username">
            </p>
            <p>
                <label for="password">Password</label>
                <br>
                <input type="password" id="password" name="password">
            </p>
            <p>
            <button type="submit" name="submit" class="button-submit">Masuk</button>
            </p>
            </form>
            
        </div>
        <div><a>Belum punya akun?</a>
        <a href="sign_in.php">Daftar</a></div>
    </section>
    <?php
           if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
        
            // Cek autentikasi admin
            $admin_result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
            if(!$admin_result) {
                echo "Error: " . mysqli_error($conn);
                exit;
            }
            
            if(mysqli_num_rows($admin_result) === 1) {
                // Ambil data admin dari database
                $admin_row = mysqli_fetch_assoc($admin_result);
        
                // Verifikasi password
                if (password_verify($password, $admin_row["password"])) {
                    $_SESSION['admin_logged_in'] = true;
                    // Jika autentikasi admin berhasil, arahkan ke halaman admin_home.php
                    echo "<script>window.location='admin_home.php';</script>";
                    exit;
                } else {
                    echo "Password tidak cocok";
                    exit;
                }
            }
        
            // Cek autentikasi user biasa
            $user_result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
            if(!$user_result) {
                echo "Error: " . mysqli_error($conn);
                exit;
            }
            
            if(mysqli_num_rows($user_result) === 1) {
                // Ambil data user dari database
                $user_row = mysqli_fetch_assoc($user_result);
        
                // Verifikasi password
                if (password_verify($password, $user_row["password"])) {
                    $_SESSION['user_logged_in'] = true;
                    // Jika autentikasi user berhasil, arahkan ke halaman index.php
                    header("Location: index.php");
                    exit;
                } else {
                    echo "<script>
                    alert('username atau password salah');
                    </script>";;
                    exit;
                }
            }
        
            // Jika username tidak ditemukan, set error flag
            echo "Username tidak ditemukan";
        }
        
            
            ?>
</body>
</html>