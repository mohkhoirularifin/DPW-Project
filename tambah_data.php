<?php
session_start();

if (!isset($_SESSION["login"])) 
{
    echo $_SESSION["login"];
    header("Location:login.php");
    exit;
}
require 'functions.php';

if(isset($_POST['submit'])){
    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('data berhasil disimpan');
                document.location.href='daftarpasien.php';
            </script>
            ";
    } else {
        echo "
        <script>
            alert('data gagal disimpan');
            document.location.href='tambah_data.php';
        </script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Tambah Data Pasien</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <label for="Nama">Nama: </label>
        <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Input field"required>
        <label for="NomorPasien">Nomor Pasien :</label>
        <input type="text" class="form-control" name="NomorPasien" id="NomorPasien" placeholder="Input field"required>
        <label for="Alamat">Alamat: </label>
        <input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="Input field"required>
        <label for="Ruang">Ruang: </label>
        <input type="text" class="form-control" name="Ruang" id="Ruang" placeholder="Input field"required>
        <label for="Derita">Derita: </label>
        <input type="text" class="form-control" name="Derita" id="Derita" placeholder="Input field"required>
        <label for="Foto">Foto: </label>
        <input type="file" class="form-control" name="Foto" id="Foto" placeholder="Input field"required>
        </div>
        <button type="submit" name="submit"> Tambah </button>
    </form>
</body>
</html>