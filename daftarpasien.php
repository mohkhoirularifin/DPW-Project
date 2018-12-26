<?php
    session_start();
    if (!isset($_SESSION["login"])) 
    {
        echo $_SESSION["login"];
        header("Location:login.php");
        exit;
    }

    require 'functions.php';
    $pasien=mysqli_query($conn,"SELECT * FROM pasien");
    if(isset($_POST["cari"]))
    {
    $pasien=cari($_POST["keyword"]);
    }
?>
<html>
<head>
    <title>Daftar Pasien</title>
    <!-- <link rel="stylesheet" href="style/style.css"> -->
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
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="daftarpasien.php">Daftar Pasien</a></li>
            </ul>
            <form class="navbar-form navbar-right" action="" method="post">
                <div class="form-group">
                <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian" autocomplete="off">
                </div>
                <button type="submit" name="cari"> Cari</button>
            </form>
            <ul class="nav navbar-right">
                <li class="active"><a href="logout.php">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    
    <div id="site_content">
        <div id="banner"></div>
        <div id="content">
            <h1>Daftar Pasien Klinik Sehat Ceria</h1> 
        </div>
        <a href="tambah_data.php">Tambah Data Pasien</a>
    <form action="" method="post">
    </form>
    <br>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No. </th>
                <th>Nama </th>
                <th>Nomor Pasien </th>
                <th>Alamat </th>
                <th>Ruang </th>
                <th>Derita </th>
                <th>Foto </th>
                <th>Aksi </th>
            </tr>
        <?php $i=1 ?>
        <?php foreach ($pasien as $row):?>
        </thead>
        <tbody>
        
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["Nama"]; ?></td>
                <td><?= $row["NomorPasien"]; ?></td>
                <td><?= $row["Alamat"]; ?></td>
                <td><?= $row["Ruang"]; ?></td>
                <td><?= $row["Derita"]; ?></td>
                <td> <img src="image/<?php echo $row["Foto"]; ?>" alt="" height="100" width="100" srcset=""></td>
                <td>
                    <a href="edit.php?id=<?php echo $row["id"];?>">Edit</a>
                    <a href="hapus.php?id=<?php echo $row["id"]; ?>"onclick="return confirm('Apakah data ini akan dihapus?')">Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
            <?php endforeach;?>
        </tbody>
    </table>
        <div id="content_footer"></div>
        <div id="footer">
            <p><a href="index.php">Home</a> | <a href="about.html">About Klinik</a> | <a href="contact.html">Contact Us</a></p>
            <p>Copyright &copy; arifinproduction </p>
        </div>
    </div>
</body>
</html>