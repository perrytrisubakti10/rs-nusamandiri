<?php
session_start();
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Regis</title>
    <link rel="stylesheet" href="public\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="public\alertsweet\animate.min.css">
    <link rel="stylesheet" href="public\alertsweet\sweetalert2.min.css">
    <link rel="stylesheet" href="public\css\login.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row radius-box">
            <div class="col-1"></div>
            <div class="col-6 img-left"></div>
            <div class="col-4 box-right">
                <h2 class="text text-muted">Form Registrasi</h2>
                <hr>
                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" name="username" class="form-control form-control-sm" id="exampleInputUsername1" placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="text" name="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Masukan Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Foto Profil</label>
                        <input type="file" name="foto_profil" class="form-control form-control-sm" id="exampleInputPassword1">
                    </div>
                    <button type="submit" name="registrasi" class="btn btn-sm btn-success button-login">Save</button>
                </form>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    <?php
    $status_regis = "belum";

    if (isset($_POST['registrasi'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $foto_profil = $_FILES['foto_profil']['name'];

        // ambil data file
        $sirSementara = $_FILES['foto_profil']['tmp_name'];

        // tentukan lokasi file akan dipindahkan
        $ext = end(explode('.', $foto_profil));

        $nama_gambar = $angka_acak = rand(1, 999) . '.' . $ext;
        $dirUpload = "public/img/gambaruser/" . $nama_gambar;

        // pindahkan file
        $terupload = move_uploaded_file($sirSementara, $dirUpload);

        $query = mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$nama_lengkap','$nama_gambar','user')");

        if ($query) {
            $status_regis = "berhasil";
        } else {
            $status_regis = "gagal";
        }
    }
    ?>

    <script src="public\js\jquery.js"></script>
    <script src="public\alertsweet\sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            function regis_berhasil() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    type: 'success',
                    title: 'Regis Berhasil'
                });

                setTimeout(
                    function() {
                        window.location = 'login.php'
                    }, 2000);
            }

            function regis_gagal() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    type: 'error',
                    title: 'Regis Gagal'
                });
            }

            var status_regis = "<?= $status_regis ?>";
            console.log(status_regis);
            if (status_regis == "berhasil") {
                regis_berhasil();
            } else if (status_regis == "gagal") {
                regis_gagal();
            }
        })
    </script>
</body>

</html>