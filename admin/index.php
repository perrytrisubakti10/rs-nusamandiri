<?php
session_start();
if (empty($_SESSION['admin'])) {
    header("Location: ../login.php");
}
include "../config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">
                        <a href="../" class="btn btn-sm btn-danger font-weight-bold">&lt;</a>
                    </th>
                    <th style="padding-bottom:20px;">Gambar</th>
                    <th style="padding-bottom:20px;">Berita</th>
                    <th style="padding-bottom:20px;">Terakhir Update</th>
                    <th> Aksi
                        <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#form-tambah">
                            +
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM berita ORDER BY id_berita DESC");
                $no = 1;
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <th scope="row"><?= $no ?></th>
                        <td style="background-image:url('../public/img/gambarberita/<?= $row['gambar_berita'] ?>'); background-size:cover;"></td>
                        <td>
                            <span class="text-muted"><?= $row['kategori'] ?></span>
                            <br>
                            <h6><?= $row['judul_berita'] ?></h6>
                        </td>
                        <td><?= date('h:i - d F Y', strtotime($row['waktu_berita'])) ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#form-edit" data-idberita="<?= $row['id_berita'] ?>" data-kategori="<?= $row['kategori'] ?>" data-judulberita="<?= $row['judul_berita'] ?>" data-titel="<?= $row['titel_berita'] ?>" data-isiberita="<?= $row['isi_berita'] ?>">
                                Edit
                            </button>
                            <a href="index.php?hapus=<?= $row['id_berita'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php $no += 1;
                } ?>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="form-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Tambah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="id_berita" id="id-berita">
                            <div class="form-group">
                                <label>Kategori:</label>
                                <input type="text" name="kategori" maxlength="30" class="form-control" placeholder="Kategori">
                            </div>
                            <div class="form-group">
                                <label>Judul Berita:</label>
                                <input type="text" name="judul_berita" maxlength="40" class="form-control" placeholder="Judul Berita">
                            </div>
                            <div class="form-group">
                                <label>Titel Berita:</label>
                                <textarea name="titel_berita" class="form-control" rows="1" placeholder="Titel Berita"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Gambar Berita:</label>
                                <input type="file" name="gambar_berita" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Isi Berita:</label>
                                <textarea name="isi_berita" class="form-control" placeholder="Isi Berita" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="form-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="id_berita" id="id-berita">
                            <div class="form-group">
                                <label>Kategori:</label>
                                <input type="text" name="kategori" maxlength="30" class="form-control" id="kategori">
                            </div>
                            <div class="form-group">
                                <label>Judul:</label>
                                <input type="text" name="judul_berita" maxlength="40" class="form-control" id="judul-berita">
                            </div>
                            <div class="form-group">
                                <label>Titel Berita:</label>
                                <textarea name="titel_berita" class="form-control" rows="1" id="titel-berita"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Isi Berita:</label>
                                <textarea name="isi_berita" class="form-control" id="isi-berita" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <input type="submit" name="update" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $('document').ready(function() {
            $('#form-edit').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var idberita = button.data('idberita')
                var kategori = button.data('kategori')
                var judulberita = button.data('judulberita')
                var titel = button.data('titel')
                var isiberita = button.data('isiberita')
                var modal = $(this)

                modal.find('.modal-body #id-berita').val(idberita)
                modal.find('.modal-body #kategori').val(kategori)
                modal.find('.modal-body #judul-berita').val(judulberita)
                modal.find('.modal-body #titel-berita').val(titel)
                modal.find('.modal-body #isi-berita').val(isiberita)
            })
        })
    </script>
</body>
<?php
if (isset($_POST['update'])) {
    $id_berita = $_POST['id_berita'];
    $judul_berita = $_POST['judul_berita'];
    $kategori = $_POST['kategori'];
    $titel_berita = $_POST['titel_berita'];
    $isi_berita = $_POST['isi_berita'];
    $update = mysqli_query($conn, "UPDATE berita SET kategori = '$kategori', judul_berita = '$judul_berita', titel_berita = '$titel_berita', waktu_berita = NOW(), isi_berita = '$isi_berita' WHERE id_berita = '$id_berita'");
    if ($update) {
        echo "<script>alert('Update Berhasil')
        window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Update Gagal')
        window.location.href='index.php'</script>";
    }
}

if (isset($_POST['simpan'])) {
    $id_berita = $_POST['id_berita'];
    $kategori = $_POST['kategori'];
    $judul_berita = $_POST['judul_berita'];
    $titel_berita = $_POST['titel_berita'];
    $gambar_berita = $_FILES['gambar_berita']['name'];
    $isi_berita = $_POST['isi_berita'];

    // ambil data file
    $dirSementara = $_FILES['gambar_berita']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $ext = end(explode('.', $gambar_berita));

    echo $nama_gambar = $angka_acak = rand(1, 999) . '.' . $ext;
    $dirUpload = "../public/img/gambarberita/" . $nama_gambar;

    // pindahkan file
    $terupload = move_uploaded_file($dirSementara, $dirUpload);

    $simpan = mysqli_query($conn, "INSERT INTO berita VALUES('','$_SESSION[id_user]','$kategori','$judul_berita','$titel_berita',NOW(),'$nama_gambar','$isi_berita')");
    if ($simpan) {
        echo "<script>alert('Simpan Berhasil')
        window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Simpan Gagal')
        window.location.href='index.php'</script>";
    }
}

if (isset($_GET['hapus'])) {
    // Hapus Gambar
    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT gambar_berita FROM berita WHERE id_berita = '$_GET[hapus]'"));
    $dirGamabr = "../public/img/gambarberita/$row[gambar_berita]";
    if (file_exists($dirGamabr)) {
        unlink($dirGamabr); // delete gambar
    }

    $hapus_berita = mysqli_query($conn, "DELETE FROM berita WHERE id_berita = '$_GET[hapus]'");
    $hapus_komentar = mysqli_query($conn, "DELETE FROM komentar WHERE id_berita = '$_GET[hapus]'");
    if ($hapus_berita && $hapus_komentar) {
        echo "<script>alert('Hapus Berhasil')
        window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Hapus Gagal')
        window.location.href='index.php'</script>";
    }
}
?>

</html>