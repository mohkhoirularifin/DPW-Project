<?php
session_start();

if (!isset($_SESSION["login"])) 
{
    echo $_SESSION["login"];
    header("Location:login.php");
    exit;
}
    require 'functions.php';
    $nama = $_GET['Nama'];
    $row = mysqli_query("SELECT * FROM obat WHERE Nama='$nama'")[0];
    if(isset($_POST['submit']))
    {
        if(edit($_POST) > 0)
        {
            echo "
                <script>
                    alert('data berhasil diperbarui');
                    document.location.href='dataobat.php';
                </script>

                ";
        } else {
            echo "
            <script>
                alert('data gagal diperbarui');
                document.location.href='editobat.php';
            </script>";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }

?>


<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Update data</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="style/index.css">

    </head>
    <body>
        
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost/Project/daftarpasien.php">Daftar Pasien</a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Update Data</a></li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div><!-- /.navbar-collapse -->
        </nav>
        
        <h1>Update Data Obat</h1>
        <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?= $row[id] ?>">
                    <label for="nomor">Nomor:</label>
                    <input type="text" class="form-control" name="Nama" id="Nama" value="<?= $row[Nama]; ?>">
                    <label for="nama">Nama Obat:</label>
                    <input type="text" class="form-control" name="NomorPasien" id="NomorPasien" value="<?= $row[NomorPasien]; ?>">
                    <label for="supplier">Nama Supplier</label>
                    <input type="text" class="form-control" name="Alamat" id="Alamat" value="<?= $row[Alamat]; ?>">
                </div>
                <button type="submit" name="submit"> Update </button>
        </form>
    </body>
</html>