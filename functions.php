<?php
$conn=mysqli_connect("localhost","root","","project");

if (!$conn) {
    die('Koneksi Error: '.mysqli_connect_error().' - '.mysqli_connect_error());
}
$pasien=mysqli_query($conn,"SELECT * FROM pasien");


function query($query_kedua){
    global $conn;
    $result = mysqli_query($conn, $query_kedua);
    $rows=[];
    while ($row = mysqli_fetchassoc($result)) {
        $rows[]=$row;
    }
    return $row;
}

function tambah($data)
{
    global $conn;

    $nama=htmlspecialchars($data["Nama"]);
    $nopas=htmlspecialchars($data["NomorPasien"]);
    $alamat=htmlspecialchars($data["Alamat"]);
    $ruang=htmlspecialchars($data["Ruang"]);
    $derita=htmlspecialchars($data["Derita"]);

    $foto=upload();
    if (!$foto)
    {
        return false;
    }

    $query= "INSERT INTO pasien
                VALUES 
                ('','$nama','$nopas','$alamat','$ruang','$derita','$foto')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $nama_file  =$_FILES['Foto']['name'];
    $ukuran_file=$_FILES['Foto']['size'];
    $error      =$_FILES['Foto']['error'];
    $tmpfile    =$_FILES['Foto']['tmp_name'];

    if ($error===4) 
    {
        // pastikan pada inputan gambar tidak terdapat atribut required
        echo "
            <script>
                alert('Tidak ada gambar yang diupload');
            </script>
        ";
        return false;
    }

    $jenis_gambar=['jpg', 'jpeg', 'gif'];
    $pecah_gambar=explode('.', $nama_file);
    $pecah_gambar=strtolower(end($pecah_gambar));
    if (!in_array($pecah_gambar, $jenis_gambar)) 
    {
        echo "
            <script>
                alert('Yang anda upload bukan file gambar');
            </script>
            ";
            return false;
    }


    // cek kapasitas gambar dalam bute kalau 1000000 byte = 1 Megabyte
    if ($ukuran_file > 1000000) 
    {
        echo "
            <script>
                alert('ukuran gambar terlalu besar');
            </script>
        ";
        return false;
    }

    // generate id untuk penamaan gambar dengan function uniquid()
    $namafilebaru=uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $pecah_gambar;
    

    move_uploaded_file($tmpfile, 'image/'.$namafilebaru);

    // kita return nama file nya agar dapat masuk ke $gambar=$upload() pada function tambah
    return $namafilebaru;
}

function registrasi($data)
{
    global $conn;

    $username=strtolower(stripcslashes($data['username']));

    $password=mysqli_real_escape_string($conn, $data['password']);
    $password2=mysqli_real_escape_string($conn, $data['password2']);

    $result=mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");

    if (mysqli_fetch_assoc($result)) 
    {
        echo "
            <script>
                alert('username sudah ada');
            </script>
        ";
        return false;
    }

    if ($password!==$password2) 
    {
        echo "
            <script>
                alert('password anda tidak sama');
            </script>
        ";
        return false;
    }

    $password=password_hash($password, PASSWORD_DEFAULT);
    // var_dump($password);

    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>