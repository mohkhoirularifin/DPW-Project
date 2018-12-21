<?php
    session_start();
    require 'functions.php';
    //check cookie
    // if (isset($_COOKIE['login'])) 
    // {
    //     if ($_COOKIE['login']=='true') 
    //     {
    //         $_SESSION['login']=true;
    //     }
    // }

    // if (isset($_SESSION["login"])) 
    // {
    //     header("Location:index.php");
    //     exit;
    // }
    if (isset($_COOKIE['id'])&& isset($_COOKIE['username'])) 
    {
        $id=$_COOKIE['id'];
        $key=$_COOKIE['key'];
        $result=mysqli_query($conn,"SELECT username FROM user WHERE id=$id");
        $row=mysqli_fetch_assoc($result);
        if ($key === hash('sha256',$row['username'])) 
        {
            $_SESSION['login']=true;
        }
    }
    if (isset($_POST["login"])) 
    {
        $username=$_POST["username"];
        $password=$_POST["password"];
        $result=mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
        if (mysqli_num_rows($result)===1) 
        {
            $row=mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) 
            {
                $_SESSION["login"]=true;
                if (isset($_POST['remember'])) 
                {
                    setcookie('id',$row['id'], time() +60);
                    setcookie('key',hash(sha256,$row['username']),time()+60);
                }
                header("Location:index.php");
                exit;
            }
        }
        $error=true;
    }
?>

<html>
<head>
    <title>Log In</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="konten">
        <div class="kepala">
            <div class="lock"></div>
            <h2 class="judul">Log In</h2>
        </div>
        
        <?php if (isset($error)):?>
        <p style="color:red;font-style=bold">
        Username dan Password Salah</p>
        <?php endif?>

        <div class="artikel">
            <form action="" method="post">
                <div class="grup">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="grup">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                <div class="grup">
                    <input type="submit" name="login" value="Log In">
                    <br>
                    <p class="message">Not registered? <a href="registrasi.php">Create an account</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>