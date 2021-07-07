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

<body>
    <nav id="navbar-example2" class="navbar navbar-light bg-light fixed-top">
        <div class="logo-rs">
            <img src="public/img/logoRS.png">
            <a class="navbar-brand font-weight-bold text-primary nama-rs" href="index.php">RS Nusa Mandiri</a>
        </div>
    </nav>
    <div id="top" class="w-100" style="height: 3rem!important"></div>
    <?php
    echo $sql = "SELECT berita.*,nama_user FROM berita JOIN user ON berita.admin = user.id_user WHERE id_berita = '$_GET[id_berita]'";
    $query = mysqli_query($conn, $sql);
    $query_jumlah_komentar = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM komentar WHERE id_berita = '$_GET[id_berita]'");
    $data = mysqli_fetch_array($query);
    $jumlah_komentar = mysqli_fetch_array($query_jumlah_komentar);
    ?>

    <div class="p-5 ml-5">
        <div class="head-berita">
            <div class="kategori">
                <svg width="20" height="20" fill="currentColor" class="text-secondary bi bi-tags-fill mt-1" viewBox="0 0 16 16">
                    <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z" />
                    <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                </svg>
                <span class="text-muted"><?= $data['kategori'] ?></span>
            </div>
            <div class="judul">
                <h1 class="text-info"><?= $data['judul_berita'] ?></h1>
                <div class="garis ml-1"></div>
            </div>
            <div class="waktu-komentar mt-3 ml-2 mb-2">
                <a class="text-dark">
                    <svg width="18" height="21" fill="currentColor" class="bi bi-person-fill" viewBox="0 -2 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                    <span><?= $data['nama_user'] ?> | </span>
                </a>
                <span><?= date('H:i - l, d F Y', strtotime($data['waktu_berita'])) ?> | </span>
                <a href="#komentar" class="text-dark">
                    <svg width="18" height="21" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 -2 16 16">
                        <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                    </svg>
                    <span><?= $jumlah_komentar['jumlah'] ?></span>
                </a>
            </div>
        </div>
        <div class="isi-berita">
            <img src="public/img/gambarberita/<?= $data['gambar_berita'] ?>">
            <h4 class="mt-4"><?= $data['titel_berita'] ?></h4>
            <p>
                <?php
                echo nl2br($data['isi_berita'], false);
                ?>
            </p>
        </div><br><br>
        <h4 id="komentar">Komentar (<?= $jumlah_komentar['jumlah'] ?>)</h4>
        <hr>
        <?php
        $query_komentar = mysqli_query($conn, "SELECT komentar.*,user.* FROM komentar,user WHERE komentar.id_user = user.id_user AND id_berita = '$_GET[id_berita]'");
        while ($row = mysqli_fetch_array($query_komentar)) {
            ?>
            <div class="komentar mt-5 w-75">
                <div class="row">
                    <div class="col-1 p-0">
                        <img src="<?= foto_profile("$row[foto_profil]") ?>" class="rounded-circle float-right img-user">
                    </div>
                    <div class="col-10" data-toggle="tooltip" title="<?= date(" h:i - l, d/m/Y", strtotime($row['waktu_kometar'])) ?>">
                        <div class="card-body p-0 ml-0">
                            <span class="font-weight-bold"><?= $row['nama_user'] ?></span>
                        </div>
                        <div class="card-body p-0 ml-2">
                            <?= $row['isi_komentar'] ?>
                        </div>
                    </div>
                    <div class="col-1">
                        <?php if (isset($_SESSION['admin'])) { ?>
                            <a onclick="delete_komentar('<?= $row['id_komentar'] ?>')" class="btn btn-danger text-white rounded-circle">X</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <hr class="w-75 float-left">
        <div class="mt-5 w-75">
            <?php if (!empty($_SESSION['id_user'])) { ?>
                <div class="row">
                    <?php
                    $user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'"));
                    ?>
                    <div class="col-1 p-0">
                        <img src="<?= foto_profile("$user[foto_profil]") ?>" class="rounded-circle float-right img-user">
                    </div>
                    <div class="col-11">
                        <span><?= $user['nama_user'] ?></span>
                        <form action="" method="post">
                            <textarea name="komentar" class="form-control mt-2" rows="5" placeholder="Tulis komentar"></textarea>
                            <input type="submit" name="kirim_komen" class="btn btn-sm btn-primary mt-2 float-right ml-2" value="Kirim">
                            <input type="reset" class="btn btn-sm btn-secondary mt-2 float-right" value="Batal">
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

    <a id="back-to-top" href="#top" class="btn btn-secondary p-2 btn-lg back-to-top" role="button">
        <svg width="25" height="30" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 -1 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
        </svg>
    </a>

    <?php
    if (isset($_POST['kirim_komen'])) {
        $komentar = $_POST['komentar'];
        $insert = mysqli_query($conn, "INSERT INTO komentar VALUES('','$_GET[id_berita]','$_SESSION[id_user]',now(),'$komentar')");
        if ($insert) {
            echo "<script>alert('Berhasil')
            window.location.href='readmoreinfo.php?id_berita=$_GET[id_berita]'</script>";
        }
    }
    ?>

</body>
<script src="public/alertsweet/sweetalert2.min.js"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    var mybutton = document.getElementById("back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }



    // popup sweetalert
    function delete_komentar(id_komentar) {
        var link_delete = "delete_komentar.php?id_berita=<?= $_GET['id_berita'] ?>&id_komentar=" + id_komentar;
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Kamu akan menghapus komentar ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.href = link_delete;
            }
        })
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>