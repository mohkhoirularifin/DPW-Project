<?php
    require 'functions.php';

    if (isset($_POST['register'])) 
    {
        if (registrasi($_POST) > 0) 
        {
            echo "
                <style>
                    alert('User berhasil ditambahkan');
                </style>
                ";
        } else 
        {
            echo mysqly_error($conn);
        }
        
    }
?>
<html>
<head>
    <title>Registrasi</title>
    <link rel="stylesheet" href="style/style.css">
    <style>
        label {
            display:block;
        }
    </style>
</head>
<body>
    <div class="konten">
        <div class="kepala">
            <div class="lock"></div>
            <h2 class="judul"> Registrasi </h2>
        </div>
        <div class="artikel">
            <form action="" method="post">
                <div class="grup">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username">
                </div>
                <div class="grup">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <div class="grup">
                        <label for="password2">Konfirmasi Password</label>
                        <input type="password" name="password2" id="password"placeholder="Konfirmasi Password">
                </div>
                <div class="grup">
                        <input type="submit" name="register" value="Registrasi">
                        <br>
                        <p class="message">Registrasi Apoteker? <a href="registrasiadm.php">Registrasi Apoteker</a></p>
                        <p class="message">Already Registered? <a href="login.php">Log In</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>