-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 09:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL,
  `admin` int(2) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `judul_berita` varchar(40) NOT NULL,
  `titel_berita` text NOT NULL,
  `waktu_berita` datetime NOT NULL,
  `gambar_berita` varchar(20) NOT NULL,
  `isi_berita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `admin`, `kategori`, `judul_berita`, `titel_berita`, `waktu_berita`, `gambar_berita`, `isi_berita`) VALUES
(23, 7, 'Artikel Kesehatan', 'Kenali Kanker dan Pencegahannya', 'berita seputar kesehatan', '2021-06-17 13:55:52', '407.jpg', 'Kanker adalah penyakit yang diakibatkan oleh pertumbuhan sel-sel abnormal yang tidak terkendali. Gejala kanker dapat berupa munculnya benjolan yang tidak lazim, terjadi perubahan pada kulit, adanya masalah pada kelenjar getah bening, penurunan berat badan tanpa sebab, batuk atau sesak napas berkepanjangan, rasa sakit tanpa sebab dan perdarahan tidak normal.\r\n\r\n \r\n\r\nAda banyak faktor yang meningkatkan risiko terkena kanker, antara lain adalah:\r\n\r\n \r\n\r\nRiwayat keluarga. \r\n\r\nUsia.\r\n\r\nIndividu di atas usia 65 tahun lebih berisiko untuk mengalami kanker.\r\n\r\n \r\n\r\nKebiasaan buruk. \r\n\r\nMengkonsumsi alkohol berlebihan, merokok, paparan sinar matahari berlebihan, obesitas, dan hubungan seks yang tidak aman dapat memicu terjadinya kanker.\r\n\r\n \r\n\r\nKondisi kesehatan\r\n\r\nBeberapa kondisi kesehatan kronis, seperti peradangan pada usus juga dapat meningkatkan resiko munculnya kanker jenis tertentu.\r\n\r\n \r\n\r\nLingkungan hidup. \r\n\r\nBahan kimia berbahaya seperti asbes dan benzena di rumah atau tempat kerja bisa menjadi faktor yang meningkatkan risiko penyakit ini.\r\n\r\n \r\n\r\nAgar terhindar dari kanker, Sahabat Sehat perlu melakukan pencegahan sejak dini dan dimulai dari sekarang! Langkah yang dapat Sahabat Sehat lakukan untuk mencegah kanker adalah:\r\n\r\n \r\n\r\nMengonsumsi makanan sehat\r\n \r\n\r\nBuah-buahan, sayuran, biji-bijian, serta kacang-kacangan dapat memberikan nutrisi baik yang dibutuhkan oleh tubuh dan daya tahan tubuh pun dapat meningkat.\r\n\r\n \r\n\r\nJangan lupa untuk membatasi juga konsumsi makanan olahan yang cenderung tinggi kalori, lemak tak sehat, dan gula tambahan, serta dapat meningkatkan penumpukan lemak karena ini dapat meningkatkan risiko terjadinya kanker.\r\n\r\n \r\n\r\nRutin berolahraga\r\n \r\n\r\nMenjaga berat badan ideal melalui berolahraga adalah kunci untuk mencegah kanker. Usahakan untuk berolahraga paling tidak 30 menit sehari.\r\n\r\n \r\n\r\nMenghindari asap rokok dan minuman beralkohol\r\n \r\n\r\nRokok merupakan salah satu faktor risiko terbesar terjadinya kanker. Selain kanker paru-paru, merokok juga dapat meningkatkan risiko terkena kanker kerongkongan, tenggorokan, mulut, ginjal, kandung kemih, pankreas, perut, dan leher rahim.\r\n\r\n \r\n\r\nSelain merokok, sering mengonsumsi minuman beralkohol juga bisa meningkatkan risiko Sahabat Sehat untuk mengalami kanker. Hal ini dikarenakan alkohol memiliki sifat karsinogenik yang dapat merusak sel-sel tubuh dan memicu munculnya penyakit kanker.\r\n\r\n \r\n\r\nMelakukan deteksi dini\r\n \r\n\r\nPada stadium awal, kanker sering kali tidak menimbulkan gejala. Gejala biasanya baru dirasakan setelah kanker berada di stadium lanjut. Oleh karena itu, Sahabat Sehat perlu melakukan deteksi kanker sejak dini sebagai salah satu cara untuk mencegahnya. \r\n\r\n \r\n\r\nJika Sahabat Sehat masih memiliki pertanyaan seputar cara mencegah kanker atau risiko kanker pada diri sendiri dan anggota keluarga, jangan ragu untuk berkonsultasi dengan dokter, ya!'),
(24, 7, 'Artikel Kesehatan', 'Pencegahan Penyakit Jantung', 'Kiat Mencegah Penyakit Jantung', '2021-06-17 14:00:10', '141.jpg', 'Jantung merupakan organ vital yang berperan penting dalam pengaturan sirkulasi darah dalam tubuh. Oleh karena itu, gangguan pada jantung dapat berakibat fatal bagi siapapun yang mengalaminya. Berikut adalah beberapa upaya pencegahan penyakit jantung yang dapat kita bersama lakukan:\r\n\r\n\r\n\r\nMenghindari kebiasaan merokok\r\n\r\nBahan kimia yang terdapat dalam rokok dapat menimbulkan kerusakan pada jantung dan pembuluh darah. Asap rokok dapat mengurangi kadar oksigen dalam darah dan hal ini menyebabkan jantung harus bekerja lebih keras dari normal. Jika keadaan ini berlangsung terus menerus, tekanan darah dan detak jantung dapat meningkat pesat dikarenakan jantung yang harus memompa oksigen lebih banyak ke otak dan tubuh.\r\n\r\n\r\n\r\nBerolahraga secara teratur\r\n\r\nBerolahraga secara teratur dapat meminimalisir resiko siapapun untuk dapat terkena penyakit jantung. Aktivitas fisik dapat membantu menjaga berat badan dan meminimalisir resiko untuk seseorang terkena penyakit yang berpotensi untuk memperparah penyakit jantung seperti darah tinggi, kolesterol tinggi, dan diabetes tipe 2. Sempatkanlah waktu di dalam keseharian untuk tetap aktif bergerak, karena sesedikit apapun aktivitas yang dilakukan dapat memberikan manfaat bagi tubuh.\r\n\r\n\r\n\r\nMenjaga pola makan sehat\r\n\r\nPola makan sehat dapat membantu melindungi jantung, menstabilkan tekanan darah, menjaga tingkat kolesterol, dan meminimalisir resiko terkena diabetes tipe 2. Konsumsi sayur-sayuran, buah-buahan, daging, makanan rendah kalori dan lemak, dan gandum. Selain itu, jangan lupa untuk membatasi konsumsi gula, karbohidrat yang telah diproses, garam, minuman beralkohol, lemak yang telah tersaturasi.\r\n\r\n\r\n\r\nIstirahat yang berkualitas\r\n\r\nPastikan untuk memperoleh istirahat yang berkualitas dengan menerapkan jadwal tidur yang cukup sekitar 8 jam agar dapat terus beraktivitas secara optimal.\r\n\r\n\r\n\r\nMenghindari stress\r\n\r\nStress yang berlebihan dapat menjadi pemicu timbulnya penyakit jantung. Oleh karena itu, penting untuk selalu mengelola stress dengan baik dan menjalani hidup dengan optimisme.\r\n\r\n\r\n\r\nMelakukan pemeriksaan berkala\r\n\r\nLakukan pemeriksaan tekanan darah, kolesterol dan diabetes tipe 2 secara berkala karena ketiga penyakit ini merupakan jenis-jenis penyakit yang dapat merusak pembuluh darah yang pada akhirnya akan mengganggu peredaran darah yang diatur oleh jantung.'),
(25, 6, 'Artikel Kesehatan', 'Tetap Sehat Meski Sedang Berpuasa', 'Kiat Menjaga Tubuh Tetap Sehat & Bugar di Bulan Ramadhan', '2021-06-17 14:04:51', '84.jpg', 'Hai, Sahabat Sehat!\r\n\r\nBulan puasa merupakan momen yang baik untuk memperbanyak beribadah dan mendekatkan diri kepada keluarga. Oleh karena itu, penting bagi kita semua untuk tetap menjaga kesehatan tubuh agar tetap prima.\r\n\r\nBerikut merupakan beberapa cara untuk menjaga tubuh agar sehat dan bugar di bulan suci Ramadhan ini.\r\n\r\nMengonsumsi makanan dengan zat gizi lengkap\r\nSetiap kali makan sahur dan berbuka, makanan yang dikonsumsi harus mengandung zat gizi lengkap, yaitu karbohidrat, protein hewani, protein nabati, sayuran, buah.\r\n\r\nPilihlah jugasumber karbohidrat kompleks saat makan, seperti oat, nasi merah, roti gandum\r\n\r\nHal ini penting karena bahan makanan tersebut mampu mencerna energi secara lambat selama puasa berlangsung\r\n\r\nPerbanyak sayuran dan buah\r\nPerbanyak konsumsi sayuran dan buah yang kaya serat.\r\n\r\nKandungan serat akan dicerna tubuh dalam waktu lama sehingga salah satunya akan memberikan sensasi kenyang di perut.\r\n\r\nPerhatikan asupan cairan\r\nMinumlah air putih minimal sebanyak 8 gelas per hari dari waktu buka puasa hingga sahur.\r\n\r\nKonsumsi cukup cairan ini sangat penting dilakukan untuk mencegah konstipasi dan dehidrasi.\r\n\r\nMengurangi kafein\r\nKurangi konsumsi minuman atau makanan yang mengandung kafein, seperti teh dan kopi, karena kafein dapat menstimulasi pengeluaran air dari dalam tubuh melalui air kemih.\r\n\r\nKonsumsi suplemen jika diperlukan\r\nApabila diperlukan, konsumsi suplemen yang berisi mineral dan vitamin boleh saja dilakukan untuk membantu proses metabolisme tubuh.\r\n\r\nTetap lakukan aktivitas fisik\r\nLakukan aktivitas fisik selama berpuasa minimal berjalan kaki selama 30 menit per hari untuk menjaga proses metabolisme tubuh. Olahraga bisa dilakukan saat menjelang waktu berbuka puasa.'),
(26, 8, 'Artikel Kesehatan', 'Pentingnya Hidrasi Bagi Tubuh!', 'Kiat Menjaga Tubuh Tetap Terhidrasi', '2021-06-17 14:08:26', '497.jpg', 'Sahabat Sehat, tahukah bahwa dengan mencukupi kebutuhan cairan tubuh sehari-hari dapat membuat tubuh terhidrasi serta membantu menjaga konsentrasi?\r\nAir merupakan elemen penting bagi kehidupan seluruh makhluk hidup, tak terkecuali manusia. Faktanya, air merupakan zat gizi esensial dan sekitar 60% tubuh manusia tersusun atas air.\r\n\r\nBerikut ini beberapa kebaikan hidrasi bagi tubuh kita:\r\n\r\n1. Mendistribusikan oksigen dan berbagai zat gizi\r\n\r\nDarah bertugas untuk mendistribusikan oksigen dan berbagai zat gizi ke seluruh sel tubuh. Lebih dari 90 persen kandungan plasma darah adalah air, sehingga jika Sahabat Sehat mengalami dehidrasi dapat menyebabkan gagal sirkulasi\r\n\r\n2. Mengatur suhu tubuh\r\n\r\nKeringat akan bercucuran jika Sahabat Sehat berada di ruangan yang cukup panas atau setelah berolahraga. Keringat tersebut berfungsi untuk membawa keluar panas tubuh agar suhunya tetap berada pada kisaran normal (36,5–37,2 derajat Celcius).\r\n\r\n3. Mendukung fungsi pencernaan\r\n\r\nProses pencernaan makanan pada tubuh Sahabat Sehat sangat bergantung dengan ketersediaan air. Oleh sebab itu, kebutuhan cairan tubuh yang tidak terpenuhi dapat menyebabkan masalah pada saluran pencernaan seperti konstipasi dan asam lambung.\r\n\r\n4. Menjaga konsentrasi dan suasana hati\r\n\r\nBeberapa dampak dehidrasi ringan adalah gangguan pada fungsi kognitif yang dapat langsung dirasakan, seperti mudah lelah, mengantuk, dan penurunan daya ingat.\r\n\r\nDengan cukup minum, Sahabat Sehat bisa terhindar dari gejala-gejala tersebut dan dapat tetap fokus dalam menjalani aktivitas sehari-hari dengan kognitif, konsentrasi, dan suasana hati yang baik.'),
(27, 7, 'Promo', 'Promo Paket MCU Lebaran 2', 'Nikmati Paket MCU Yang Ramah di Kantong', '2021-06-17 14:19:03', '270.jpg', 'Hai Sahabat Sehat,\r\nHari lebaran telah tiba, saatnya merayakan hari kemenangan dengan sukacita bersama keluarga tercinta.\r\nNah, mengkonsumsi makanan khas lebaran tentu merupakan hal yang sangat ditunggu.\r\n\r\nTahukah sahabat sehat bahwa makanan khas lebaran kebanyakan bersantan dan memiliki kadar lemak yang tinggi? Hal tersebut dapat meningkatkan kadar gula, kolesterol dan garam dalam tubuh, yang berakibat terjadinya kekambuhan penyakit lama atau mungkin menimbulkan penyakit baru.\r\n\r\nUntuk mencegah kekambuhan atau penyakit baru, Yuk segera lakukan pemeriksaan medical check up di RS Nusa Mandiri! Dapatkan harga promo Paket MCU hanya senilai Rp.899.000,- aja loh!\r\n\r\nJangan lewatkan kesempatan terbatas ini ya!\r\n\r\n'),
(28, 5, 'Promo', 'Promo Paket MCU Lebaran 1', 'Nikmati Paket MCU Yang Ramah di Kantong', '2021-06-17 14:21:16', '808.jpg', 'Hai Sahabat Sehat,\r\nHari lebaran telah tiba, saatnya merayakan hari kemenangan dengan sukacita bersama keluarga tercinta.\r\nNah, mengkonsumsi makanan khas lebaran tentu merupakan hal yang sangat ditunggu.\r\n\r\nTahukah sahabat sehat bahwa makanan khas lebaran kebanyakan bersantan dan memiliki kadar lemak yang tinggi? Hal tersebut dapat meningkatkan kadar gula, kolesterol dan garam dalam tubuh, yang berakibat terjadinya kekambuhan penyakit lama atau mungkin menimbulkan penyakit baru.\r\n\r\nUntuk mencegah kekambuhan atau penyakit baru, Yuk segera lakukan pemeriksaan medical check up di RS Nusa Mandiri! Dapatkan harga promo Paket MCU hanya senilai Rp.629.000,- aja loh!\r\n\r\nJangan lewatkan kesempatan terbatas ini ya!');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_berita` int(5) NOT NULL,
  `id_user` int(2) NOT NULL,
  `waktu_kometar` datetime NOT NULL,
  `isi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `id_user`, `waktu_kometar`, `isi_komentar`) VALUES
(55, 26, 5, '2021-06-17 14:23:19', 'Nice info, thanks ya ngadmin Lilih :)'),
(56, 28, 1, '2021-06-17 14:25:50', 'Info yang menarik min, mint. Setelah lebaran kemarin menghabiskan dua panci opor ayam dan satu panci rendang, sepertinya aku harus melakuakan check up, nich.'),
(57, 25, 1, '2021-06-17 14:26:50', 'semangadss berpuasaaa'),
(58, 26, 1, '2021-06-17 14:27:44', 'sesama ngadmin dilarang saling mendahului ya.'),
(59, 28, 3, '2021-06-17 14:29:39', 'Min, pundak saya rasanya pegel banget ya setelah lebaran kemarin makan soto tangkar dan lontong sapi. Apa itu pertanda saya harus mencoba promo ini?'),
(60, 27, 3, '2021-06-17 14:30:56', 'Pengen yang ini, tapi uangnya ga cukup. Mengsad :('),
(61, 24, 3, '2021-06-17 14:31:36', 'Jantung ku berdetak, artinya aku masih hidup.'),
(62, 28, 2, '2021-06-17 14:33:33', 'Min, MCU bisa pake BPJS ga ya? sayang nih, bayar BPJS tiap bulan tapi belum pernah dipake :('),
(63, 25, 2, '2021-06-17 14:35:19', 'Nice info, mint'),
(64, 28, 11, '2021-06-17 14:38:57', 'mo tanya min, MCU itu apayah?'),
(65, 26, 11, '2021-06-17 14:40:04', 'info yang menarik, min.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `foto_profil` varchar(20) NOT NULL,
  `level` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `foto_profil`, `level`) VALUES
(1, 'peri', '123', 'Peri Gans', 'budi.jpg', 'user'),
(2, 'rina', '123', 'Rina', 'dokter_sebening.jpg', 'user'),
(3, 'ulfa', '123', 'Ulfa Naxz Sagitarius', 'budi.jpg', 'user'),
(4, 'irwan', '123', 'irwansyah', '527.jpg', 'user'),
(5, 'rinaadmin', '123', 'Ngadmin Rina', '2', 'admin'),
(6, 'periadmin', '123', 'Ngadmin Peri', 'budi.jpg', 'admin'),
(7, 'ulfaadmin', '123', 'Ngadmin Ulfa', '2', 'admin'),
(8, 'lilihadmin', '123', 'Ngadmin Lilih', '2', 'admin'),
(11, 'Diaz', '123', 'Diaz Ajach', '190.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
