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
    if(tambahobat($_POST) > 0){
        echo "
            <script>
                alert('data berhasil disimpan');
                document.location.href='dataobat.php';
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
    <h1 class="text-center">Tambah Data Obat</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <label for="nomor">Nomor: </label>
        <input type="text" class="form-control" name="nomor" id="nomor" placeholder="Input field"required>
        <label for="nama">Nama Obat :</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Input field"required>
        <label for="supplier">Nama Supplier: </label>
        <input type="text" class="form-control" name="supplier" id="supplier" placeholder="Input field"required>
        </div>
        <button type="submit" name="submit"> Tambah </button>
    </form>
</body>
</html>