<?php
require 'functions.php';
$mahasiswa=query("SELECT * FROM pasien");
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Daftar Pasien</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <h1>Daftar Pasien</h1>

    <a href="tambah_data.php">Tambah Data Mahasiswa</a>
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
            <!-- kita buat contoh data static -->
            <?php foreach ($mahasiswa as $row):?>
        </thead>
        <tbody>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["Nama"]; ?></td>
                <td><?= $row["Nomor Pasien"]; ?></td>
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
</body>
</html>