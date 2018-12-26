<?php
session_start();

if (!isset($_SESSION["login"])) 
{
    echo $_SESSION["login"];
    header("Location:loginadm.php");
    exit;
}

require 'functions.php';

$id=$_GET["id"];

if(hapusobat ($id) > 0){
    echo "
    <script>
        alert('data berhasil dihapus');
        document.location.href='dataobat.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('data gagal dihapus');
        document.location.href='tambah_dataobat.php';
    <script>";
    echo "<br>";
    echo mysqli_error($conn);
}
?>