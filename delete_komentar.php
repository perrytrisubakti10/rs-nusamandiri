<!DOCTYPE html>
<html lang="en">

<head>
    <title>MyECS</title>
    <link rel="stylesheet" href="public/alertsweet/sweetalert2.min.css">
    <script type="text/javascript" src="jquery.js"></script>
</head>

<body>
    <?php
    include 'config/koneksi.php';
    $status_delete = "belum";
    if ($_GET['id_berita'] != '') {
        $id_komentar = $_GET['id_komentar'];
        $query = mysqli_query($conn, "DELETE FROM komentar WHERE id_komentar='$id_komentar'");
        if ($query) {
            $status_delete = "berhasil";
        } else {
            $status_delete = "gagal";
        }
    }
    ?>
</body>
<script src="public/alertsweet/sweetalert2.min.js"></script>
<script>
    var status_delete = "<?= $status_delete ?>";
    if (status_delete == "berhasil") {
        Swal.fire({
            title: 'Success!',
            text: "Komentar berhasil dihapus",
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.value) {
                window.location.href = 'readmoreinfo.php?id_berita=<?= $_GET['id_berita'] ?>'
            }
        })
    } else if (status_delete == "gagal") {
        Swal.fire(
            'Opss..!',
            'Klien Gagal Ditambahkan',
            'error'
        )
    }
</script>

</html>