<?php
session_start();
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="public\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="public\alertsweet\animate.min.css">
    <link rel="stylesheet" href="public\alertsweet\sweetalert2.min.css">
    <link rel="stylesheet" href="public\css\login.css">
</head>

<body>
    <div class="container mt-3">
        <div class="row radius-box">
            <div class="col-1"></div>
            <div class="col-6 img-left"></div>
            <div class="col-4 box-right">
                <h2 class="text text-muted">Form Login</h2>
                <hr>
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputUsername1" placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukan Password">
                    </div>
                    <button type="submit" name="login" class="btn btn-sm btn-primary button-login">Login</button>
                    or <br>
                    <a href="regis.php" class="btn btn-sm btn-outline-success w-100">Registrasi</a>
                </form>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    <?php
    $status_login = "belum";

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
        $row = mysqli_fetch_array($query);
        

        if ($row['level'] == 'admin') {
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['admin'] = $row['level'];
            $status_login = "berhasil";
        } else if ($row['level'] == 'user') {
            $_SESSION['id_user'] = $row['id_user'];
            $status_login = "berhasil";
        } else {
            $status_login = "gagal";
        }
    }
    ?>

    <script src="public\js\jquery.js"></script>
    <script src="public\alertsweet\sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            function login_berhasil() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    type: 'success',
                    title: 'Login Berhasil'
                });

                setTimeout(
                    function() {
                        window.location = 'index.php'
                    }, 2000);
            }

            function login_gagal() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    type: 'error',
                    title: 'Login Gagal'
                });
            }

            var status_login = "<?= $status_login ?>";
            console.log(status_login);
            if (status_login == "berhasil") {
                login_berhasil();
            } else if (status_login == "berhasil_admin") {
                login_admin_berhasil();
            } else if (status_login == "gagal") {
                login_gagal();
            }
        })
    </script>
</body>

</html>