<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
</head>
<body>
    <section>
        <h1>Daftar</h1>
        <div>
            <form method="post" action="">
                <p>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama">
                </p>
                <p>
                    <label for="nama">Username</label>
                    <input type="text" id="username" name="username">
                </p>
                <p>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email">
                </p>
                <p>
                    <label for="no_hp">No HP</label>
                    <input type="text" id="no_hp" name="no_hp">
                </p>
                <p>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </p>
                <p>
                    <label for="password2">konfirmasi Password</label>
                    <input type="password" id="password" name="password2">
                </p>
                <p>
                    <button type="submit" name="submit">Daftar</button>
                </p>
            </form>
        </div>
    </section>

    <?php
    require 'connect.php';
    if(isset($_POST['submit'])){

        if( regris($_POST) > 0) {
            echo "<script>
            alert('resgristasi berhasil');
            </script>";
    
        }else{
            echo mysqli_error($conn);
        }
    }

?>
</body>
</html>
