<html>
<head>
    <title>Registrasi</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="konten">
        <div class="kepala">
            <div class="lock"></div>
            <h2 class="judul"> Registrasi </h2>
        </div>
        <div class="artikel">
            <form action="#" method="post">
                <div class="grup">
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Username">
                </div>
                <div class="grup">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password">
                </div>
                <div class="grup">
                        <label for="password2">Konfirmasi Password</label>
                        <input type="password" name="password2" placeholder="Konfirmasi Password">
                </div>
                <div class="grup">
                        <input type="submit" value="Registrasi">
                        <br>
                        <p class="message">Already Registered? <a href="login.php">Log In</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>