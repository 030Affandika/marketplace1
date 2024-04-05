<?php
// // Mulai session
// session_set_cookie_params(3600);
// session_start();

// Lakukan koneksi ke database
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "db_websitebrand";

$conn = mysqli_connect($hostname, $username, $password, $db_name);

function regristasi($data) {
    global $conn;

        $name = ($data["nama"]);
        $username = strtolower(stripslashes($data["username"]));
        $email = ($data["email"]);
        $no_hp = ($data["no_hp"]);
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    
    
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)){
            echo "
            <script>
            alert('username sudah terdaftar!!!')
            </script>";
            return false;
        }
    
    
        if( $password !== $password2 ){
            echo "<script>
            alert('konfirmasi password tidak sesuai');
            </script>";
    
            return false;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        mysqli_query($conn, "INSERT INTO user VALUES ('', '$name', '$username', '$email','$no_hp', '$password')");
    
        return mysqli_affected_rows($conn);







    

}


function regris($data) {
    global $conn;

        $name = ($data["nama"]);
        $username = strtolower(stripslashes($data["username"]));
        $email = ($data["email"]);
        // $no_hp = ($data["no_hp"]);
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    
    
        $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)){
            echo "
            <script>
            alert('username sudah terdaftar!!!')
            </script>";
            return false;
        }
    
    
        if( $password !== $password2 ){
            echo "<script>
            alert('konfirmasi password tidak sesuai');
            </script>";
    
            return false;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        mysqli_query($conn, "INSERT INTO admin VALUES ('', '$name', '$email', '$password', '$username')");
    
        return mysqli_affected_rows($conn);







    

}
?>

