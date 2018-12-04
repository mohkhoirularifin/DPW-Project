<html>
<head>
    <title>Home</title>
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
            <a class="navbar-brand" href="#">Link</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="daftarpasien.php">Daftar Pasien</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Cari">
                </div>
                <button type="submit" class="btn btn-default">Cari</button>
            </form>
            <ul class="nav navbar-right">
                <li class="active"><a href="logout.php">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    
    <div id="site_content">
    <div id="banner"></div>
    <div id="content">
        <!-- insert the page content here -->
        <h1>Selamat Datang di Website Klinik Sehat Ceria</h1>
        <p>Klinik Sehat Ceria adalah klinik yang didirikan oleh Dr. Arifin Prasetyo, Sp.PD</p>
        <p>Klinik ini didirikan pada tanggal 22 November 2020 bertepatan pada Hari Ulang Tahun Beliau.</p>
        <p>Klinik ini dibangun pada lahan seluas 100m persegi dan dibangun pada tanah wakaf.</p>
        <p>Klinik Sehat Ceria sudah resmi terdaftar pada Dinas Kesehatan pada tanggal 22 Desember 2020.</p>
        <h2>Fasilitas</h2>
        <p>Klinik ini memiliki banyak fasilitas, diantaranya:</p>
            <ul>
                <li>Ruang Pendaftaran/Ruang Tunggu</li>
                <li>Ruang Konsultasi Dokter</li>
                <li>Ruang Administrasi</li>
                <li>Ruang Tindakan</li>
                <li>Ruang Farmasi</li>
                <li>Kamar Mandi/WC</li>
            </ul>
        </div>

        <div id="content_footer"></div>
        <div id="footer">
            <p><a href="index.php">Home</a> | <a href="about.html">About Klinik</a> | <a href="contact.html">Contact Us</a></p>
            <p>Copyright &copy; arifinproduction </p>
        </div>
    </div>
</body>
</html>