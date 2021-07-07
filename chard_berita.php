<?php
session_start();
include "config/koneksi.php";
include "config/function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>RS Nusa Mandiri</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/alertsweet/sweetalert2.min.css">
  <link rel="stylesheet" href="public/css/readmoreinfo.css">
  <script type="text/javascript" src="public/js/jquery.js"></script>
</head>

<style>
  ::-webkit-scrollbar {
    width: 10px;
  }

  ::-webkit-scrollbar-track {
    background: #f1f1f1;
  }

  ::-webkit-scrollbar-thumb {
    background: #ccc;
  }

  .card {
    width: 19rem;
    height: 420px;
  }

  .card img {
    height: 180px;
  }

  .kotak-berita {
    margin-top: 71px;
  }

  .footer-card {
    position: absolute;
    bottom: 10px;
    left: 15px;
    width: 17rem
  }

  .waktu_berita {
    margin-top: -30px;
    font-size: 12px;
  }
</style>

<body>
  <nav id="navbar-example2" class="navbar navbar-light bg-light fixed-top">
    <div class="logo-rs">
      <img src="public/img/logoRS.png">
      <a class="navbar-brand font-weight-bold text-primary nama-rs" href="index.php">RS Nusa Mandiri</a>
    </div>
  </nav>
  <div class="kotak-berita w-100">
    <?php
    $query = mysqli_query($conn, "SELECT * FROM berita ORDER BY id_berita DESC");
    while ($row = mysqli_fetch_array($query)) { ?>
      <div class="card m-3 float-left">
        <img class="card-img-top w-100" src="public/img/gambarberita/<?= $row['gambar_berita'] ?>" alt="Card image cap">
        <div class="card-body">
          <h6 class="card-title mb-0"><?= substr($row['judul_berita'], 0, 35) ?></h6>
          <span class="text-muted font-italic waktu_berita"><?= date('l, d F Y', strtotime($row['waktu_berita'])) ?></span>
          <p class="card-text">
            <?= substr($row['isi_berita'], 0, 150) ?>
            <?= (strlen($row['isi_berita']) > 150) ? '...' : '' ?>
          </p>
          <div class="footer-card">
            <a href="readmoreinfo.php?id_berita=<?= $row['id_berita'] ?>" class="btn btn-sm btn-outline-secondary w-100">Lihat Berita</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</body>
<script src="public/alertsweet/sweetalert2.min.js"></script>
<script>

</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>