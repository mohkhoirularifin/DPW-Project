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
    $nopas=htmlspecialchars($data["Nomor Pasien"]);
    $alamat=htmlspecialchars($data["Alamat"]);
    $ruang=htmlspecialchars($data["Ruamg"]);
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
    var_dump($password);

    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>