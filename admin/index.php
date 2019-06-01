<html>
<head>
  <title>SISPRAK</title>
  <!-- Panggil Bootstrap -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="jquery/jquery.min.js"></script>
  <script src="jquery/bootstrap.min.js"></script>
  <style type="text/css">
    body{
      background-color: #f0f5f5;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
       <!-- Skrip dibawah ini akan aktif ketika posisi mobile -->
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="index.php">SISPRAK</a>
     </div>
     <!-- Daftar menu yang diinginkan-->
     <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li>
          <a href="index.php">
            <span class="glyphicon glyphicon-home"></span> Beranda
          </a>
        </li>
        <!-- mata praktikum -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-folder-open"></span> 
            &nbsp;Mata praktikum
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="index.php?lihat=mp/index">
                <span class="glyphicon glyphicon-book"></span> 
                &nbsp; Mata Praktikum
              </a>
            </li>
            <li>
             <a href="index.php?lihat=materi/index">
               <span class="glyphicon glyphicon-user"></span> 
               &nbsp; Materi
             </a>
           </li>
           <li>
             <a href="index.php?lihat=detailmateri/index">
               <span class="glyphicon glyphicon-lock"></span> 
               &nbsp; Detail Materi
             </a>
           </li>
         </ul>
       </li>
       <!-- USER -->
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="glyphicon glyphicon-folder-open"></span> 
          &nbsp;User
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="index.php?lihat=mahasiswa/index">
              <span class="glyphicon glyphicon-book"></span>
              &nbsp;Mahasiswa
            </a>
          </li>
          <li>
            <a href="index.php?lihat=karyawan/index">
              <span class="glyphicon glyphicon-user"></span> 
              &nbsp;Master karyawan
            </a>
          </li>
          <li>
            <a href="index.php?lihat=asprak/index">
              <span class="glyphicon glyphicon-user"></span> 
              &nbsp;Master Asprak
            </a>
          </li>
          <li>
            <a href="index.php?lihat=jurusan/index">
              <span class="glyphicon glyphicon-book"></span> 
              &nbsp;Master Jurusan
            </a>
          </li>
        </ul>
      </li>
      <!--  JADWAL  -->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="glyphicon glyphicon-folder-open"></span> 
          &nbsp;Jadwal
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="index.php?lihat=kelas/index">
              <span class="glyphicon glyphicon-lock"></span> 
              &nbsp;kelas
            </a>
          </li>
          <li>
            <a href="index.php?lihat=laboratorium/index">
              <span class="glyphicon glyphicon-time"></span> 
              &nbsp;laboratorium
            </a>
          </li>
          <li>
            <a href="index.php?lihat=tahunajaran/index">
              <span class="glyphicon glyphicon-book"></span> 
              &nbsp;Tahun Ajaran
            </a>
          </li>
          <li>
            <a href="index.php?lihat=jam/index">
              <span class="glyphicon glyphicon-time"></span> 
              &nbsp;Jam
            </a>
          </li>
        </ul>
      </li>
      <!-- Penilaian -->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="glyphicon glyphicon-folder-open"></span> 
          &nbsp;Nilai
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
         <li>
          <a href="index.php?lihat=jenisnilai/index">
            <span class="glyphicon glyphicon-time"></span> 
            &nbsp; Jenis Nilai
          </a>
        </li>
      </ul>
    </li>
    <!-- AKTIVASI -->
    <li>
      <a href="index.php?lihat=Aktivasi/index">
        <span class="glyphicon glyphicon-usd"></span> 
        Aktivasi
      </a>
    </li>
    <!-- KRP -->
    <!-- Logout -->
    <li>
      <a href="index.php?lihat=krp/index">
        <span class="glyphicon glyphicon-usd"></span> 
        KRP
      </a>
    </li>
    <!-- Request -->
    <li>
      <a href="index.php?lihat=Aktivasi/index">
        <span class="glyphicon glyphicon-usd"></span> 
        Request
      </a>
    </li>
    <!-- Logout -->
    <li>
      <a href="index.php?lihat=Aktivasi/index">
        <span class="glyphicon glyphicon-usd"></span> 
        Logout
      </a>
    </li>
  </ul>
</div>
<!-- #navbar -->
</div>
<!-- .container -->
</nav>
<!-- .navbar -->

<div class="container">
  <?php
      	// Skrip dibawah berfungsi memanggil perintah sesuai nama file
  if(!empty($_GET['lihat'])){
    include('panggil/'.$_GET['lihat'].'.php');
  }
  else{
    include 'beranda.php';
  }
  ?>
</div> <!-- .container -->
<!-- Panggil JavaScript -->
<!-- <script src="jquery/jquery.min.js"></script> -->
<!-- <script src="bootstrap/js/bootstrap.min.js"></script>     -->
</body>

</html>
