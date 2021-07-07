<?php
session_start();
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>RS Nusa Mandiri</title>
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script type="text/javascript" src="public/js/jquery.js"></script>
</head>

<body>
    <nav id="navbar-example2" class="navbar navbar-light bg-light fixed-top">
        <div class="logo-rs">
            <img src="public/img/logoRS.png">
            <a class="navbar-brand font-weight-bold nama-rs" href="#">RS Nusa Mandiri</a>
        </div>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#about">Layanan Unggulan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#info">Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#more">Lainnya</a>
            </li>
            <?php if (isset($_SESSION['admin'])) { ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-outline-secondary mr-1" href="admin/">Admin</a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <?php if (empty($_SESSION['id_user'] or $_SESSION['admin'])) { ?>
                    <a class="nav-link btn btn-sm btn-primary" href="login.php">Login</a>
                <?php } else { ?>
                    <a class="nav-link btn btn-sm btn-primary" href="logout.php">logout</a>
                <?php } ?>
            </li>
        </ul>
    </nav>
    <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
        <br><br>
        <div id="demo" class="carousel slide carousel-img" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="slogan">
                    <h1 class="font-weight-bold display-4">Selamat Datang di Rumah Sakit Nusa Mandiri</h1>
                    <p class=" lead">Sakit Anda Adalah Harapan Kami.</p>
                    <a href="#about" class="btn btn-lg btn-info btn-aboutme">Layanan Unggulan</a>
                </div>
                <div class="carousel-item active">
                    <div class="w-100 gbr1 paralax-slider"></div>
                </div>
                <div class="carousel-item">
                    <div class="w-100 gbr2 paralax-slider"></div>
                </div>
                <div class="carousel-item">
                    <div class="w-100 gbr3 paralax-slider"></div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <div id="about">
            <br><br><br>
            <div class="container p-5">
                <h3 class="text-center mb-0">Layanan Unggulan Kami</h3>
                <h1 class="text-center text-primary mb-3" style="margin-top:-20px;">__</h1>
                <p class="text-center">Rumah Sakit Nusa Mandiri memiliki beberapa layanan unggulan. <br> Temui ahli medis kami untuk mencegah kondisi yang tidak terduga.</p>
                <br><br><br>
                <div class="row">
                    <div class="col-4 text-center">
                        <img src="public/img/jantung.jpg" class="rounded-circle img-unggulan">
                        <div class="mt-3 px-5">
                            <h4>Jantung</h6>
                                <span>Menyediakan pelayanan pencegahan, bedah, pengobatan, dan rehabilitas didukung oleh peralatan diagnostik dan medis terbaru, serta tim multidisiplin.</span>
                        </div>
                    </div>
                    <div class="col-4 text-center">
                        <img src="public/img/saraf.jpg" class="rounded-circle img-unggulan">
                        <div class="mt-3 px-5">
                            <h4>Bedah Saraf</h4>
                            <span>Berfokus pada perawatan otak, sumsum tulang belakang dan gangguan saraf perifer melalui pelayanan pencegahan dan penyembuhan.</span>
                        </div>
                    </div>
                    <div class="col-4 text-center">
                        <img src="public/img/urologi.jpg" class="rounded-circle img-unggulan">
                        <div class="mt-3 px-5">
                            <h4>Urologi</h4>
                            <span>Fokus utama pusat unggulan urologi adalah untuk mendeteksi penyakit prostat dan batu ginjal yang merupakan sekitar 75% kaasus urologi di Indonesia.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="info">
            <br><br><br>
            <div class="container">
                <h3 class="text-center mb-0">Informasi</h3>
                <h1 class="text-center text-primary mb-3" style="margin-top:-20px;">__</h1>
                <p class="text-center">Infromasi terkini seputar Rumah Sakit Nusa Mandiri.</p>
                <?php $query_berita = mysqli_query($conn, "SELECT berita.*,nama_user FROM berita JOIN user ON berita.admin = user.id_user ORDER BY id_berita DESC LIMIT 5");
                while ($row = mysqli_fetch_array($query_berita)) {
                    if ($row['id_berita'] % 2 == 1) {
                        ?>
                        <div class="row content-info">
                            <div class="col-7">
                                <span class="text-muted font-italic"><?= date('d F Y', strtotime($row['waktu_berita'])) . " - " . $row['nama_user'] ?></span>
                                <h2 class="text-info"><?= $row['judul_berita'] ?></h2>
                                <h5><?= $row['titel_berita'] ?></h5>
                                <p><?= substr(nl2br($row['isi_berita']), 0, 500) . '...' ?></p>
                                <a href="readmoreinfo.php?id_berita=<?= $row['id_berita'] ?>" class="btn btn-sm btn-primary">
                                    Read More &gt;&gt;
                                </a>
                            </div>
                            <div class="col-5">
                                <div style="background-image: url(public/img/gambarberita/<?= $row['gambar_berita'] ?>)" class="img-about mx-auto d-block"></div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row content-info">
                            <div class="col-5">
                                <div style="background-image: url(public/img/gambarberita/<?= $row['gambar_berita'] ?>)" class="img-about mx-auto d-block"></div>
                            </div>
                            <div class="col-7">
                                <span class="text-muted font-italic"><?= date('d F Y', strtotime($row['waktu_berita'])) . " - " . $row['nama_user'] ?></span>
                                <h2 class="text-info"><?= $row['judul_berita'] ?></h2>
                                <h5><?= $row['titel_berita'] ?></h5>
                                <p><?= substr(nl2br($row['isi_berita']), 0, 500) . '...' ?></p>
                                <a href="readmoreinfo.php?id_berita=<?= $row['id_berita'] ?>" class="btn btn-sm btn-primary">
                                    Read More &gt;&gt;
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    <hr class="mt-5">
                <?php } ?>
                <div class="w-100 d-flex justify-content-center mb-4" style="margin-top:-40px;">
                    <a href="chard_berita.php" class="btn btn-secondary ">Tampilkan lebih banyak</a>
                </div>
            </div>
        </div>

        <div>
            <h2 class="w-100 text-center font-italic text-light position-absolute" style="z-index:1;margin-top:270px;">Segeralah sakit, agar BPJS yang kamu bayar tiap bulan bisa bermanfaat.</h2>
            <div class="parallax">
            </div>
        </div>
        <div id="ones">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="w-100">
                            <div class="card-group">
                                <div class="card card-dokter p-5">
                                    <div class="card-body">
                                        <div class="img-dokter float-right inline m-3">
                                            <img class="rounded-circle" src="public/img/dokter_soleh.jpg" alt="Card image cap">
                                        </div>
                                        <div class="ket-dokter w-100">
                                            <h6 class="card-title">dr. Soleh, Sp.JP</h6>
                                            <p class="card-text text-muted mb-2" style="margin-top:-10px;">Spesialis Jantung</p>
                                            <span>dr. Soleh adalah salah satu dokter spesialis andalan dari Rumah Sakit Nusa Mandiri yang memang benar-benar ahli bidangnya.</span><br>
                                            Alamat : Jalan Raya Ciomas Kreteg, Komplek 3D, Kecamatan Ciomas, Kabupaten Bogor, Jawa Barat.
                                        </div>
                                        <hr>
                                        <table>
                                            <tr>
                                                <td>Kontak</td>
                                                <td class="px-3">:</td>
                                                <td>085478956257 / 0254625</td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal&nbsp;Praktek</td>
                                                <td class="px-3">:</td>
                                                <td>Selasa dan Kamis</td>
                                            </tr>
                                            <tr>
                                                <td>Jam Operasi</td>
                                                <td class="px-3">:</td>
                                                <td>16.00 - 19.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td style="font-size:13px;">* Jadwal Sewaktu - waktu bisa berubah</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card card-dokter p-5">
                                    <div class="card-body">
                                        <div class="img-dokter float-right inline m-3">
                                            <img class="rounded-circle" src="public/img/dokter_agung.jpeg" alt="Card image cap">
                                        </div>
                                        <div class="ket-dokter w-100">
                                            <h6 class="card-title">dr. Agung Andani, Sp.JP</h6>
                                            <p class="card-text text-muted mb-2" style="margin-top:-10px;">Spesialis Jantung</p>
                                            <span>dr. Agung Andani adalah dokter senior yang sudah lama bekerja untuk Rumah Sakit Nusa Mandiri yang sudah bekerja sejak tahun 1908 untuk RS Nusa Mandiri.</span><br>
                                            Alamat : Jalan Raya Bakti Gundari, Kecamatan Lebak Bulus, Jakarta Timur, Jakarta.
                                        </div>
                                        <hr>
                                        <table>
                                            <tr>
                                                <td>Kontak</td>
                                                <td class="px-3">:</td>
                                                <td>081258455439 (WA/Tlp)</td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal&nbsp;Praktek</td>
                                                <td class="px-3">:</td>
                                                <td>Senin - Rabu</td>
                                            </tr>
                                            <tr>
                                                <td>Jam Operasi</td>
                                                <td class="px-3">:</td>
                                                <td>08.00 - 12.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td style="font-size:13px;">* Jadwal Sewaktu - waktu bisa berubah</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card card-dokter p-5">
                                    <div class="card-body">
                                        <div class="img-dokter float-right inline m-3">
                                            <img class="rounded-circle" src="public/img/dokter_arifin.jpg" alt="Card image cap">
                                        </div>
                                        <div class="ket-dokter w-100">
                                            <h6 class="card-title">dr. Arifin Ilham, Sp.N</h6>
                                            <p class="card-text text-muted mb-2" style="margin-top:-10px;">Spesialis Saraf</p>
                                            <span>Dokter yang bertugas untuk mendiagnosis, menangani, dan merawat penderita penyakit yang berhubungan dengan sistem saraf, mulai dari otak, saraf tulang belakang, hingga sistem saraf tepi.</span><br>
                                            Alamat : Jalan Raya Ciomas Kreteg, Komplek Melaini, Jawa Barat.
                                        </div>
                                        <hr>
                                        <table>
                                            <tr>
                                                <td>Kontak</td>
                                                <td class="px-3">:</td>
                                                <td>081258488559 (WA/Tlp)</td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal&nbsp;Praktek</td>
                                                <td class="px-3">:</td>
                                                <td>Rabu - Jumat</td>
                                            </tr>
                                            <tr>
                                                <td>Jam Operasi</td>
                                                <td class="px-3">:</td>
                                                <td>09.00 - 13.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td style="font-size:13px;">* Jadwal Sewaktu - waktu bisa berubah</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="w-100">
                            <div class="card-group">
                                <div class="card card-dokter p-5">
                                    <div class="card-body">
                                        <div class="img-dokter float-right inline m-3">
                                            <img class="rounded-circle" src="public/img/dokter_dina.jpg" alt="Card image cap">
                                        </div>
                                        <div class="ket-dokter w-100">
                                            <h6 class="card-title">Dr. Diana Septiani, Sp.N</h6>
                                            <p class="card-text text-muted mb-2" style="margin-top:-10px;">Spesialis Saraf</p>
                                            <span>Dr. Diana Septiani, Sp.N adalah salah satu dokter spesialis Saraf perempuan yang sangat ahliuntuk membedah saraf-saraf manusia dengan profesional.</span><br>
                                            Alamat : Jl. Taman Kencana, Kecamatan Budi Poisper, Kota Bogor, Jawa Barat.
                                        </div>
                                        <hr>
                                        <table>
                                            <tr>
                                                <td>Kontak</td>
                                                <td class="px-3">:</td>
                                                <td>0254625 / 085478956257</td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal&nbsp;Praktek</td>
                                                <td class="px-3">:</td>
                                                <td>Senin dan Rabu</td>
                                            </tr>
                                            <tr>
                                                <td>Jam Operasi</td>
                                                <td class="px-3">:</td>
                                                <td>09.00 - 14.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td style="font-size:13px;">* Jadwal Sewaktu - waktu bisa berubah</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card card-dokter p-5">
                                    <div class="card-body">
                                        <div class="img-dokter float-right inline m-3">
                                            <img class="rounded-circle" src="public/img/dokter_soleh.jpg" alt="Card image cap">
                                        </div>
                                        <div class="ket-dokter w-100">
                                            <h6 class="card-title">Dr. Soleh, Sp.JP</h6>
                                            <p class="card-text text-muted mb-2" style="margin-top:-10px;">Spesialis Jantung</p>
                                            <span>Dr. Soleh adalah salah satu dokter spesialis andalan dari Rumah Sakit Nusa Mandiri yang memang benar-benar ahli bidangnya.</span><br>
                                            Alamat : Jalan Raya Ciomas Kreteg, Komplek 3D, Kecamatan Ciomas, Kabupaten Bogor, Jawa Barat.
                                        </div>
                                        <hr>
                                        <table>
                                            <tr>
                                                <td>Kontak</td>
                                                <td class="px-3">:</td>
                                                <td>085478956257 / 0254625</td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal&nbsp;Praktek</td>
                                                <td class="px-3">:</td>
                                                <td>Selasa dan Kamis</td>
                                            </tr>
                                            <tr>
                                                <td>Jam Operasi</td>
                                                <td class="px-3">:</td>
                                                <td>16.00 - 19.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td style="font-size:13px;">* Jadwal Sewaktu - waktu bisa berubah</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card card-dokter p-5">
                                    <div class="card-body">
                                        <div class="img-dokter float-right inline m-3">
                                            <img class="rounded-circle" src="public/img/dokter_arifin.jpg" alt="Card image cap">
                                        </div>
                                        <div class="ket-dokter w-100">
                                            <h6 class="card-title">Dr. Arifin Ilham, Sp.N</h6>
                                            <p class="card-text text-muted mb-2" style="margin-top:-10px;">Spesialis Saraf</p>
                                            <span>Beliau adalah dokter yang bertugas untuk mendiagnosis, menangani, dan merawat penderita penyakit yang berhubungan dengan sistem saraf, mulai dari otak, saraf tulang belakang, hingga sistem saraf tepi.</span><br>
                                            Alamat : Jalan Raya Ciomas Kreteg, Komplek Melaini, Jawa Barat.
                                        </div>
                                        <hr>
                                        <table>
                                            <tr>
                                                <td>Kontak</td>
                                                <td class="px-3">:</td>
                                                <td>081258488559 (WA/Tlpn)</td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal&nbsp;Praktek</td>
                                                <td class="px-3">:</td>
                                                <td>Rabu - Jumat</td>
                                            </tr>
                                            <tr>
                                                <td>Jam Operasi</td>
                                                <td class="px-3">:</td>
                                                <td>09.00 - 13.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td style="font-size:13px;">* Jadwal Sewaktu - waktu bisa berubah</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="w-100">
                            <div class="card-group">
                                <div class="card card-dokter p-5">
                                    <div class="card-body">
                                        <div class="img-dokter float-right inline m-3">
                                            <img class="rounded-circle" src="public/img/dokter_dina.jpg" alt="Card image cap">
                                        </div>
                                        <div class="ket-dokter w-100">
                                            <h6 class="card-title">Dr. Diana Septiani, Sp.N</h6>
                                            <p class="card-text text-muted mb-2" style="margin-top:-10px;">Spesialis Saraf</p>
                                            <span>Dr. Diana Septiani, Sp.N adalah salah satu dokter spesialis Saraf perempuan yang sangat ahliuntuk membedah saraf-saraf manusia dengan profesional.</span><br>
                                            Alamat : Jl. Taman Kencana, Kecamatan Budi Poisper, Kota Bogor, Jawa Barat.
                                        </div>
                                        <hr>
                                        <table>
                                            <tr>
                                                <td>Kontak</td>
                                                <td class="px-3">:</td>
                                                <td>0254625 / 085478956257</td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal&nbsp;Praktek</td>
                                                <td class="px-3">:</td>
                                                <td>Senin dan Rabu</td>
                                            </tr>
                                            <tr>
                                                <td>Jam Operasi</td>
                                                <td class="px-3">:</td>
                                                <td>09.00 - 14.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td style="font-size:13px;">* Jadwal Sewaktu - waktu bisa berubah</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card card-dokter p-5">
                                    <div class="card-body">
                                        <div class="img-dokter float-right inline m-3">
                                            <img class="rounded-circle" src="public/img/dokter_soleh.jpg" alt="Card image cap">
                                        </div>
                                        <div class="ket-dokter w-100">
                                            <h6 class="card-title">Dr. Soleh, Sp.JP</h6>
                                            <p class="card-text text-muted mb-2" style="margin-top:-10px;">Spesialis Jantung</p>
                                            <span>Dr. Soleh adalah salah satu dokter spesialis andalan dari Rumah Sakit Nusa Mandiri yang memang benar-benar ahli bidangnya.</span><br>
                                            Alamat : Jalan Raya Ciomas Kreteg, Komplek 3D, Kecamatan Ciomas, Kabupaten Bogor, Jawa Barat.
                                        </div>
                                        <hr>
                                        <table>
                                            <tr>
                                                <td>Kontak</td>
                                                <td class="px-3">:</td>
                                                <td>085478956257 / 0254625</td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal&nbsp;Praktek</td>
                                                <td class="px-3">:</td>
                                                <td>Selasa dan Kamis</td>
                                            </tr>
                                            <tr>
                                                <td>Jam Operasi</td>
                                                <td class="px-3">:</td>
                                                <td>16.00 - 19.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td style="font-size:13px;">* Jadwal Sewaktu - waktu bisa berubah</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card card-dokter p-5">
                                    <div class="card-body">
                                        <div class="img-dokter float-right inline m-3">
                                            <img class="rounded-circle" src="public/img/dokter_arifin.jpg" alt="Card image cap">
                                        </div>
                                        <div class="ket-dokter w-100">
                                            <h6 class="card-title">Dr. Arifin Ilham, Sp.N</h6>
                                            <p class="card-text text-muted mb-2" style="margin-top:-10px;">Spesialis Saraf</p>
                                            <span>Beliau adalah dokter yang bertugas untuk mendiagnosis, menangani, dan merawat penderita penyakit yang berhubungan dengan sistem saraf, mulai dari otak, saraf tulang belakang, hingga sistem saraf tepi.</span><br>
                                            Alamat : Jalan Raya Ciomas Kreteg, Komplek Melaini, Jawa Barat.
                                        </div>
                                        <hr>
                                        <table>
                                            <tr>
                                                <td>Kontak</td>
                                                <td class="px-3">:</td>
                                                <td>081258488559 (WA/Tlpn)</td>
                                            </tr>
                                            <tr>
                                                <td>Jadwal&nbsp;Praktek</td>
                                                <td class="px-3">:</td>
                                                <td>Rabu - Jumat</td>
                                            </tr>
                                            <tr>
                                                <td>Jam Operasi</td>
                                                <td class="px-3">:</td>
                                                <td>09.00 - 13.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td style="font-size:13px;">* Jadwal Sewaktu - waktu bisa berubah</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <hr><br>
        <div class="medsos p-5 d-flex justify-content-center mt-5">
            <a href="https://web.facebook.com/Nusa-Mandiri-456364881230116/?_rdc=1&_rdr">
                <svg width="30" height="30" fill="currentColor" class="bi bi-facebook mx-3" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg>
            </a>
            <a href="https://www.instagram.com/nusamandiri/?hl=id">
                <svg width="30" height="30" fill="currentColor" class="bi bi-instagram mx-3" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg>
            </a>
            <a href="https://twitter.com/_NusaMandiri?s=20">
                <svg width="30" height="30" fill="currentColor" class="bi bi-twitter mx-3" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                </svg>
            </a>
        </div>
        <div id="more">
            <div class="footer">
                <div class="container">
                    <div class="row text-light">
                        <div class="col-2">
                            <h5>Developer</h5>
                            <h5 class="garis">_________</h5>
                            <ul>
                                <li>Perry</li>
                                <li>Rina</li>
                                <li>Ulfa</li>
                                <li>Lilih</li>
                            </ul>
                        </div>
                        <div class="col-2">
                            <h5>Technology</h5>
                            <h5 class="garis">_________</h5>
                            <ul>
                                <li>HTML&nbsp;5</li>
                                <li>CSS</li>
                                <li>PHP</li>
                                <li>Javascript</li>
                                <li>Bootstraps&nbsp;4.0</li>
                            </ul>
                        </div>
                        <div class="col-2">
                            <h5>Contact Us</h5>
                            <h5 class="garis">_________</h5>
                            <ul>
                                <li>083873062600</li>
                                <li>(021) 20190421 </li>
                                <li>nusamandiri@rs.com</li>
                            </ul>
                        </div>
                        <div class="col-3">
                            <h5>Address</h5>
                            <h5 class="garis">_________</h5>
                            Jl. Kamal Raya No. 18, RT.1/RW.6, Ring Road Barat, Cengkareng Barat, Cengkareng, RT.6/RW.3, Cengkareng Bar., Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11730
                        </div>
                        <div class="col-3 p-1">
                            <img src="public/img/maps.jpg" class="w-100 ml-5 rounded ">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>