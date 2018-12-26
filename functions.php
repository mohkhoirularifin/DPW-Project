<?php
$conn=mysqli_connect("localhost","root","","project");

if (!$conn) {
    die('Koneksi Error: '.mysqli_connect_error().' - '.mysqli_connect_error());
}
$result=mysqli_query($conn,"SELECT * FROM pasien");


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

    if ($ukuran_file > 1000000) 
    {
        echo "
            <script>
                alert('ukuran gambar terlalu besar');
            </script>
        ";
        return false;
    }

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

function registrasiadm($data)
{
    global $conn;

    $username=strtolower(stripcslashes($data['username']));

    $password=mysqli_real_escape_string($conn, $data['password']);
    $password2=mysqli_real_escape_string($conn, $data['password2']);

    $result=mysqli_query($conn, "SELECT username FROM admin WHERE username='$username'");

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

    mysqli_query($conn, "INSERT INTO admin VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $sql= "SELECT * FROM pasien
            WHERE
            Nama LIKE '%$keyword%' OR
            NomorPasien LIKE '%$keyword%' OR
            Alamat LIKE '%$keyword%' OR
            Ruang LIKE '%$keyword%' OR
            Derita LIKE '%$keyword%'
            ";

            return mysqli_query($sql);
}

function edit ($data){
    global $conn;

    $id=$data["id"];
    $nama=htmlspecialchars($data["Nama"]);
    $nopas=htmlspecialchars($data["NomorPasien"]);
    $alamat=htmlspecialchars($data["Alamat"]);
    $ruang=htmlspecialchars($data["Ruang"]);
    $derita=htmlspecialchars($data["Derita"]);

    

    $query= " UPDATE pasien SET
                Nama = '$nama',
                NomorPasien = '$nopas',
                Alamat = '$alamat',
                Ruang = '$ruang',
                Derita = '$derita'
                WHERE id= $id ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
    
}

function hapus ($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM pasien WHERE id =$id ");
    return mysqli_affected_rows($conn);
}

function hapusobat ($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM obat WHERE id =$id ");
    return mysqli_affected_rows($conn);
}

function tambahobat($data)
{
    global $conn;

    $nomor=htmlspecialchars($data["nomor"]);
    $nama=htmlspecialchars($data["nama"]);
    $supplier=htmlspecialchars($data["supplier"]);

    $query= "INSERT INTO obat
                VALUES 
                ('','$nomor','$nama','$supplier')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
?>