<?php 
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    // Jika belum, arahkan ke halaman login
    header("Location: login.php");
    exit;
}
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label for="nama">Nama Barang</label>
            <input type="text" name="nama" placeholder="Kaos Loreng..." required>
        </div>
        <div>
            <label for="kategori">Kategori</label>
            <select name="kategori" id="">
                <option value="">pilih</option>
                <?php 
                    $kategori = mysqli_query($conn, "SELECT * FROM category ORDER BY id_category");
                    while($r = mysqli_fetch_array($kategori)){
                ?>
                <option value="<?php echo $r['id_category'] ?>"><?php echo $r['category_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
        <label for="gambar1">Foto Produk 1</label>
        <input type="file" name="gambar1" required>
    </div>
    <!-- Input kedua -->
    <div>
        <label for="gambar2">Foto Produk 2</label>
        <input type="file" name="gambar2" required>
    </div>
    <!-- Input ketiga -->
    <div>
        <label for="gambar3">Foto Produk 3</label>
        <input type="file" name="gambar3" required>
    </div>
        <div>
            <label for="harga">Harga</label>
            <input type="text" name="harga" placeholder="Harga" required>
        </div>
        <div>
            <label for="deskripsi">Deskripsi</label>
            <textarea  class="form-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status">
                <option value="">--Pilih--</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php 
    if(isset($_POST['submit'])){
        // Ambil data dari formulir
        $nama_barang = $_POST['nama'];
        $kategori_id = $_POST['kategori'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $status = $_POST['status'];
    
        // Proses unggah gambar
        $lokasi_gambar = [];
        for($i = 1; $i <= 3; $i++) {
            $nama_file = $_FILES['gambar'.$i]['name'];
            $tmp_file = $_FILES['gambar'.$i]['tmp_name'];
            $lokasi_gambar[] = "produk/".$nama_file;
            move_uploaded_file($tmp_file, "produk/".$nama_file);
        }
    
        // Memasukkan data ke dalam database
        $insert = mysqli_query($conn, "INSERT INTO `product` VALUES (
            null,
            '$kategori_id',
            '$nama_barang',
            '$harga',
            '$deskripsi',
            '$lokasi_gambar[0]',
            '$lokasi_gambar[1]',
            '$lokasi_gambar[2]',
            '$status',
            null
        )");
        
    
        // Cek jika query berhasil dijalankan
        if($insert){
            echo "Data berhasil disimpan.";
        } else{
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
     <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>

</html>
