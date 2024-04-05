<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

</head>
<body class="body-login">
    <section class="sign-section">
        <h1>Daftar</h1>
        <div>
            <form method="post" action="">
                <p>
                    <label for="nama">Nama</label>
                    <br>
                    <input type="text" id="nama" name="nama">
                </p>
                <p>
                    <label for="nama">Username</label>
                    <br>
                    <input type="text" id="username" name="username">
                </p>
                <p>
                    <label for="email">Email</label>
                    <br>
                    <input type="text" id="email" name="email">
                </p>
                <p>
                    <label for="no_hp">No HP</label>
                    <br>
                    <input type="text" id="no_hp" name="no_hp">
                </p>
                <p>
                    <label for="password">Password</label>
                    <br>
                    <input type="password" id="password" name="password">
                </p>
                <p>
                    <label for="password2">Konfirmasi Password</label>
                    <br>
                    <input type="password" id="password" name="password2">
                </p>
                <p>
                    <button class="button-submit" type="submit" name="submit">Daftar</button>
                </p>
            </form>
            </div>
        <div><a>Sudah punya akun?</a>
        <a href="login.php">Login</a></div>
        </div>
    </section>

    <?php
    require 'connect.php';
    if(isset($_POST['submit'])){

        if( regristasi($_POST) > 0) {
            echo "<script>
            alert('resgristasi berhasil');
            </script>";
            header("Location: login.php");
    
        }else{
            echo mysqli_error($conn);
        }
    }

?>
</body>
</html>
