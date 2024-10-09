-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 08:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salimah_last`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL,
  `tanggal_publish` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikels`
--

INSERT INTO `artikels` (`id`, `kategori_id`, `judul`, `slug`, `deskripsi`, `img`, `view`, `status`, `tanggal_publish`, `created_at`, `updated_at`) VALUES
(2, 1, 'Syiar Muharam, Salimah Bojonggede Gelar Santunan Yatim dan Tebar Jilbab', 'syiar-muharam-salimah-bojonggede-gelar-santunan-yatim-dan-tebar-jilbab', '<p>Bogor (21/7/2024) &mdash; Muharam adalah bulan istimewa dalam Islam. Selain merupakan salah satu dari empat bulan haram, pada bulan ini juga terdapat berbagai peristiwa penting yang menjadi bukti kebesaran dan rahmat Allah SWT.</p>\r\n\r\n<p>Abu &lsquo;Amr ibn Al &lsquo;Alaa berkata, &ldquo;Dinamakan bulan Muharam karena peperangan (jihad) diharamkan pada bulan tersebut&rdquo;. Jika jihad saja yang disyariatkan hukumnya menjadi terlarang pada bulan tersebut, maka hal ini bermakna perbuatan-perbuatan yang secara asal dan bahkan maksiat dilarang oleh Allah Ta&rsquo;ala.</p>\r\n\r\n<p>Bulan Muharam memiliki sebutan lain yaitu Idul Yatama yang berarti lebaran anak yatim. Pasalnya, kaum muslim di Indonesia memilih bulan Muharram, khususnya tanggal 10, untuk berbagi dengan anak yatim.</p>\r\n\r\n<p>Pimpinan Cabang Persaudaraan Muslimah (PC Salimah) Bojonggede, Kabupaten Bogor, turut serta menebar syiar Muharam pada kegiatan santunan dan tebar jilbab syar&rsquo;i yang dilaksanakan oleh Program Pembinaan Anak Yatim dan Dhuafa (P2AYD), Sabtu sore (20/7/2024).</p>\r\n\r\n<p>Dalam acara ini, 36 orang anak yatim dan dhuafa binaan P2AYD PC Salimah Bojonggede mendapat santunan berupa uang tunai dan bingkisan makanan. Sejumlah 20 jilbab syar&rsquo;i juga diberikan kepada orangtuanya.</p>\r\n\r\n<p>&ldquo;Alhamdulillah hari ini ada tambahan rezeki, kita bagi-bagikan 20 jilbab juga ke beberapa ibunya anak-anak,&rdquo; ungkap Tri.</p>\r\n\r\n<p>&ldquo;Sebetulnya sebelum acara ini, kita sudah pernah membagi-bagikan jilbab kepada tetangga dan teman terdekat. Insya Allah dalam waktu dekat juga kegiatan yang sama akan menyusul dari PRa-PRa Salimah kita yang ada di Kecamatan Bojonggede,&rdquo; kata Tri.</p>\r\n\r\n<p>Kegiatan santunan yang dilaksanakan di kediamannya itu juga diisi dengan pengajian dan pemberian tausiyah.</p>\r\n\r\n<p>Tausiyah berisi tentang tujuh rahasia istighfar, diantaranya;</p>\r\n\r\n<ol>\r\n	<li>Istighfar bisa mendatangkan ampunan dari Allah</li>\r\n	<li>Mengatasi kesulitan dan terbukanya pintu rezeki</li>\r\n	<li>Menambah kekuatan</li>\r\n	<li>Memperoleh banyak kenikmatan</li>\r\n	<li>Sebab turunnya Rahmat</li>\r\n	<li>Sebagai kafaratul majlis</li>\r\n	<li>Terhindar dari azab Allah</li>\r\n</ol>\r\n\r\n<p>&ldquo;Harapannya dengan memperbanyak istighfar, kita bisa senantiasa memperbaiki ibadah dan terus istiqomah dalam bertutur kata, berfikir dan berbuah baik dan benar, karena manusia tempatnya salah,&rdquo; tutup Tri.</p>\r\n\r\n<p>[AM/Salimah]</p>', '669e26ae2b87c.jpeg', 1, '1', '2024-07-22', '2024-07-22 02:30:22', '2024-07-28 02:17:07'),
(3, 1, 'Salimah Sabet Penghargaan Best of The Best pada Rakorda Salimah', 'salimah-sabet-penghargaan-best-of-the-best-pada-rakorda-salimah', '<p>Bogor (24/7/2024) &mdash; Pimpinan Cabang Persaudaraan Muslimah (PC Salimah) Bojonggede menyabet penghargaan sebagai Best of the Best PC Salimah di Kabupaten Bogor. Penghargaan diberikan pada Rapat Koordinasi Daerah (Rakorda) PD Salimah Kabupaten Bogor, Ahad, (14/7/2024).</p>\r\n\r\n<p>Ada tiga kategori yang diberikan dalam perhelatan tersebut, yakni Best of Networking, Best of Act of Service dan Best of the Best.</p>\r\n\r\n<p>Penghargaan tersebut diberikan bukan tanpa alasan. PD menilai capaian dalam beberapa hal di PC Salimah Bojonggede dinilai lebih baik dibandingkan 18 PC Salimah lainnya.</p>\r\n\r\n<p>Sebut saja, omzet penjualan Salimah Food di Kabupaten Bogor. PC Salimah Bojonggede menyumbang omzet tertinggi setiap bulannya. Dengan jumlah Pimpinan Ranting (PRa) Salimah terbanyak, yakni 8 PRa, PC Salimah Bojonggede mampu menggerakkan pengurus maupun binaan untuk menjadi reseller maupun pembeli.</p>\r\n\r\n<p>Selain itu, capaian kinerja pengurus dan program kerja unggulan yang digulirkan pun dinilai paling baik. Hal ini dibuktikan salah satunya dengan Baitul Qur&rsquo;an Salimah (BQS) yang semakin marak dibentuk di setiap kelurahan/desa.</p>\r\n\r\n<p>Hingga saat ini saja, ada setidaknya 17 BQS aktif tersebar di Bojonggede. Dengan total santri mencapai 580 orang, 49 kelas dan 45 orang musyrifah (guru ngaji), kajian BQS semakin diminati oleh masyarakat dengan program tahsin maupun tahfiznya.</p>\r\n\r\n<p>Selain BQS, program unggulan lainnya yang dinilai paling baik adalah Program Pembinaan Anak Yatim dan Dhuafa (P2AYD) dan Berbagi Nasi Jumat Berkah Salimah (Bernas).</p>\r\n\r\n<p>PC Salimah Bojonggede tak segan-segan menggelontorkan dana yang juga dihimpun dari para donatur untuk memberikan santunan dana pendidikan, bingkisan makanan maupun sembako kepada kurang lebih 36 anak yatim binaan Salimah setiap bulannya.</p>\r\n\r\n<p>Begitupun dengan program Bernas. Bekerjasama dengan beberapa PRa, setiap Jumat nya PC Salimah Bojonggede mendistribusikan 200-500 paket nasi ke pondok pesantren, yayasan yatim piatu, pesantren tahfiz untuk yatim dan dhuafa, binaan Salimah dan warga sekitar yang membutuhkan.</p>\r\n\r\n<p>Sekretaris PD Salimah Kabupaten Bogor, Nurul Fadhilah menyatakan kebanggaannya terhadap PC Salimah Bojonggede. Salah satunya karena program kurban tahun ini yang dinilainya sukses mengajak warga sekitar untuk berkurban bersama Salimah.</p>\r\n\r\n<p>&ldquo;Kami bangga PC Salimah Bojonggede bisa mengadakan kurban sebanyak 8 ekor sapi dan 3 kambing tahun ini. Dan itu dari warga sekitar lho! Bukan pengurus Salimah yang menitipkan hewan kurbannya ke masjid-masjid atau DKM begitu, bukan!,&rdquo; ungkap Lillah.</p>\r\n\r\n<p>Ketua PC Salimah Bojonggede, Yati Kusumawati pun menyampaikan rasa syukur dan terima kasihnya.</p>\r\n\r\n<p>Menurutnya, penghargaan yang didapatkan karena Allah yang memudahkan dan para pengurus yang telah bekerja keras dalam ide, gagasan, tenaga dan infak terbaiknya.</p>\r\n\r\n<p>&ldquo;Barakallahu fiikum. Syukur alhamdulillah senantiasa Allah mudahkan!. Slempang dan penghargaan ini milik ibu-ibu semua. Terima kasih telah bekerja keras baik dalam ide, gagasan, tenaga dan infak terbaiknya,&rdquo; ujar Yati.</p>\r\n\r\n<p>Yati juga berharap penghargaan tersebut dapat memotivasi PC Salimah yang lain agak lebih baik lagi.</p>\r\n\r\n<p>&ldquo;Semoga dapat memacu PC Salimah yang lain agar lebih baik lagi, dalam hal kinerja maupun program-program unggulannya,&rdquo; imbuhnya.</p>\r\n\r\n<p>[AM/Salimah]</p>', '66a1a5e64d911.jpeg', 2, '1', '2024-07-25', '2024-07-24 18:09:58', '2024-08-18 18:54:40'),
(4, 6, 'Salimah Terima Anugerah Kategori Ekonomi di Puncak Peringatan Hari Kebaya 2024', 'salimah-terima-anugerah-kategori-ekonomi-di-puncak-peringatan-hari-kebaya-2024', '<p>Jakarta (24/7/2024) &ndash; Sekali lagi, Persaudaraan Muslimah (Salimah) menerima penghargaan tingkat Nasional. Kali ini penghargaan diberikan oleh Kongres Wanita Indonesia (Kowani) berupa Anugerah Kategori Ekonomi. Penghargaan diberikan pada puncak peringatan Hari Kebaya Nasional 2024 di Istora Senayan pada Rabu (24/7).</p>\r\n\r\n<p>Presiden Joko Widodo (Jokowi) dan Ibu Negara Iriana Jokowi menghadiri acara tersebut bersama 8.000 peserta lainnya yang mengenakan kebaya dari berbagai daerah. Jokowi mengenakan batik bernuansa cokelat, sementara Iriana memakai kebaya biru lengkap dengan rias sanggul.</p>\r\n\r\n<p>Ketua Kowani, Giwo Rubianto Wiyogo, mengatakan bahwa acara ini mengangkat tema &ldquo;Lestarikan Budaya dengan Bangga Berkebaya&rdquo;. Ia berharap, peringatan Hari Kebaya Nasional dapat menggaungkan kembali semangat perjuangan perempuan Indonesia.</p>\r\n\r\n<p>Giwo menyebut, ada empat maksud dan tujuan Peringatan Hari Kebaya Nasional ke-1 tahun 2024, yaitu:</p>\r\n\r\n<ol>\r\n	<li>Memperkenalkan dan menggaungkan kembali kebaya sebagai bagian dari sejarah perjuangan para perempuan Indonesia.</li>\r\n	<li>Meningkatkan wujud cinta, bangga pada identitas bangsa dan Tanah Air.</li>\r\n	<li>Melestarikan warisan budaya dengan menjadikan kebaya sebagai salah satu wadah kreativitas tanpa menghilangkan nilai pakem dari kebaya, yang memiliki nilai ekonomi untuk memajukan ekonomi bangsa.</li>\r\n	<li>Menjadikan kebaya sebagai busana wanita yang bisa dipakai dalam berbagai acara.</li>\r\n</ol>\r\n\r\n<p>Ketua Umum Salimah, Etty Praktiknyowati, menyatakan kebahagiaan atas penghargaan yang diberikan oleh Kowani. Ia menyebut bahwa prestasi ini merupakan hasil kerja dari para pengurus dan anggota Salimah.</p>\r\n\r\n<p>&ldquo;Kami sangat bahagia menerima anugerah Kategori Ekonomi dari Kowani. Ini tidak terlepas dari kerja keras yang dilakukan oleh para pengurus Salimah yang menjalankan program organisasi, yang didukung oleh anggota Salimah di seluruh Indonesia. Kami sangat mengapresiasi semua ini,&rdquo; ucap Etty.</p>\r\n\r\n<p>&ldquo;Kami berharap, Salimah semakin nyata manfaatnya bagi masyarakat, bangsa dan negara, sebagaimana yang telah di amanahkan dalam Visi Organisasi,&rdquo; imbuhnya.</p>', '66a1a62f8c2d3.jpeg', 0, '1', '2024-07-25', '2024-07-24 18:11:11', '2024-08-18 17:36:21'),
(5, 5, 'Bersama Salimah, Peduli dan Lindungi Anak, untuk Indonesia Bermartabat', 'bersama-salimah-peduli-dan-lindungi-anak-untuk-indonesia-bermartabat', '<p>Ditulis oleh: Rusmiyati, M.Pd<br />\r\nKetua Dept Pendidikan dan Pelatihan<br />\r\nPimpinan Pusat Salimah<br />\r\n​<br />\r\nAnak merupakan individu muda yang belum mencapai usia dewasa. Ia merupakan bagian penting dalam keluarga dan masyarakat. Merekalah generasi penerus yang akan membawa perubahan di masa depan. Menurut Undang-Undang Perlindungan Anak di Indonesia, anak memiliki hak untuk mendapatkan perlindungan, pendidikan, kesehatan, dan kehidupan yang layak. Selain itu, anak juga memiliki peranan dalam perkembangan sosial dan ekonomi negara. Sebagai individu muda, anak membutuhkan dukungan dan pembimbingan yang tepat agar dapat tumbuh dan berkembang menjadi generasi yang berkualitas. Oleh karena itu, kita harus memperhatikan aspek-aspek yang memberi arti dan makna secara luas dalam perkembangan anak. Anak bukan hanya sebagai individu yang secara biologis belum mencapai usia dewasa, tetapi juga sebagai individu yang memiliki hak-hak dan potensi yang perlu dilindungi dan dikembangkan<br />\r\n​<br />\r\nMenurut data BPS tahun 2023, masih banyak masalah anak di Indonesia, mulai dari pemenuhan gizi sejak 1.000 hari kelahiran anak, stunting, hak pendidikan dasar sembilan tahun, maraknya penjualan organ tubuh yang diambil dari anak-anak, kecanduan gadget, kesehatan anak, kemiskinan, dan masalah kekerasan pada anak. Dengan demikian, pemerintah harus hadir dalam berbagai upaya untuk memastikan perlindungan anak dapat terwujud di berbagai aspek, termasuk di lingkungan yang erat kaitannya dengan keseharian anak. Upaya yang bisa dilakukan pemerintah antara lain penyediaan kebijakan, pelaksanaan regulasi dan penegakan hukum, penguatan norma dan nilai anti kekerasan, penciptaan lingkungan yang aman dari kekerasan, ketersediaan akses layanan terintegrasi; dan pendidikan kecakapan hidup untuk ketahanan anak.<br />\r\n​<br />\r\nIslam memandang anak sebagai karunia berharga yang suci. Karunia yang mahal ini adalah amanah yang harus dijaga dan dilindungi khususnya oleh orangtua. Karena anak sebagai aset orangtua dan aset bangsa. Islam telah memberikan perhatian yang besar terhadap perlindungan anak-anak. Perlindungan dalam Islam meliputi fisik, psikis, intelektual, moral, ekonomi, dan lainnya. Hal ini dijabarkan dalam bentuk memenuhi semua hak-haknya, menjamin kebutuhan sandang dan pangannya, menjaga nama baik dan martabatnya, menjaga kesehatannya, memilihkan teman bergaul yang baik, menghindarkan dari kekerasan, dan lain-lain. (Qs. Al-Furqaan: 74)<br />\r\n​<br />\r\nSalimah sebagai ormas perempuan yang sudah 24 tahun memiliki visi dan misi peduli pada perempuan, anak dan keluarga Indonesia, memberikan perhatian khusus terhadap permasalahan kualitas anak Indonesia. Tersebar di 36 provinsi dengan jaringan sebanyak 414 kota di seluruh Indonesia, Salimah menjadikan anak sebagai salah satu bagian dari program perhatiannya demi cita-cita untuk ikut berperan dalam membentuk generasi Indonesia yang kuat di masa depan. Di antara program yang dijalankan Salimah secara nasional antara lain pencegahan stunting pada anak, program literasi dengan memberikan bantuan buku&ndash;buku bacaan untuk taman bacaan anak yang ada di sekolah usia dini (PAUD), program penyuluhan intensif yang dilakukan dalam bentuk pembinaan rutin kepada peserta didik anak&ndash;anak, dan juga program edukasi kepada para orangtua tentang bagaimana menjadi orangtua yang mampu mendidik anak sesuai dengan kondisi hari ini dalam bentuk kegiatan Komunitas Orangtua Bijaksana (KOB).</p>\r\n\r\n<p>Melalui programnya, Salimah berharap dapat mengembalikan peran kualitas anak Indonesia sebagai generasi penerus bangsa. Mereka merupakan investasi vital bagi masa depan sebuah bangsa, karena mereka yang akan menerima estafet kepemimpinan bangsa serta meneruskan dan memajukan negara ini ke arah yang lebih baik. Anak&ndash;anak adalah bintang&ndash;bintang yang bersinar terang. Mereka adalah harapan masa depan dan penerus cita&ndash;cita bangsa.</p>\r\n\r\n<p>Anakku, cintaku untukmu tanpa syarat. Kasih sayangku tanpa jeda. Doa dan harapanku untukmu sepajang masa. Jadilah generasi yang cerdas, kreatif, dan penuh kasih sayang untuk negeri ini. Selamat Hari Anak Nasional. Bersama Salimah, Peduli dan Lindungi Anak, Untuk Indonesia Bermartabat.</p>', '66a1a6891493b.jpeg', 17, '1', '2024-07-25', '2024-07-24 18:12:41', '2024-08-19 02:59:31'),
(6, 5, 'Salimah Peringati Hari Anak Nasional', 'salimah-peringati-hari-anak-nasional', '<p>Makassar (21/7/2024) &ndash; Pimpinan Wilayah Persaudaraan Muslimab (PW Salimah) Sulawesi Selatan menyelenggarakan serangkaian kegiatan dalam rangka Hari Anak Nasional 2024. Bekerjasama dengan DP3A DALDUK KB Provinsi Sulawesi Selatan, kegiatan berlangsung pada hari Sabtu &ndash; Ahad (20-21/7) di Sekolah Dhuafa SIT Al Fathanah Kompleks PEPABRI Pertama Sudiang, Makassar.</p>\r\n\r\n<p>Hari Anak Nasional 2024 Provinsi Sulawesi Selatan mengusung tema &ldquo;Sulsel Rumah Kita, Semua Anak Terlindungi dan Bahagia&rdquo;.</p>\r\n\r\n<p>Kegiatan dihadiri oleh Ketua PW Salimah Sulsel bersama pengurus, anggota Sekolah Ibu Salimah Terpadu (Sister), Santri Baitul Quran Salimah (BQS), peserta lomba, tokoh masyarakat, dan dinas terkait (Dinas Sosial, BPOM, Puspaga DP3A DALDUK KB Prov Sulsel), serta sejumlah sponsor.</p>\r\n\r\n<p>Kegiatan yang dilaksanakan diantaranya lomba mewarnai dan hafalan al quran serta doa harian tingkat RA/TK dan SD/Mi, pembagian nutrisi untuk anak dhuafa, edukasi pangan halal, keamanan pangan dan kosmetik, peluncuran konseling keluarga, dan peringatan puncak Hari Anak Nasional ke-40 tahun 2024.</p>\r\n\r\n<p>Ketua PJ TP PKK Provinsi Sulawesi Selatan, Ninuk Trianti Zudan, membuka acara puncak peringatan Hari Anak Nasional ke 40 tahun 2024. Ia menyampaikan apresiasi kepada para pengurus Salimah dan panitia serta semua pihak yang telah terlibat dan berkontribusi dalam mempersiapkan kegiatan ini untuk memberikan yang terbaik bagi anak-anak.</p>\r\n\r\n<p>&ldquo;Tema hari anak nasional Tahun 2024 adalah &lsquo;Anak Terlindungi, Indonesia Maju dengan Nilai- ilai Dasar: Berakhlak Mulia, Bahagia, Peduli, Berani dan Cerdas. Tema ini mengingatkan kita akan pentingnya memberikan perlindungan, pendidikan dan kasih saying kepada anak-anak kita. Sebagai orangtua, pendidik, dan anggota masyarakat, kita memiliki tanggung jawab besar untuk memastikan anak-anak kita tumbuh dalam lingkungan yang aman, sehat, dan penuh kasih sayang,&rdquo; tuturnya.</p>\r\n\r\n<p>Kegiatan ditutup dengan pembinaan keluarga oleh Puspaga DP3A Dalduk KB dan<br />\r\npeluncuran Layanan Konseling Salimah Sulsel, oleh PJ Ketua TP PKK Provinsi Sulsel, didamping oleh Ketua PW Salimah Sulsel, Aisyah Ilyas.</p>\r\n\r\n<p>Diharapkan ke depannya senantiasa terjalin silaturahmi dan kolaborasi yang semakin baik, khususnya pada bidang yang merupakan fokus kerja Salimah sebagai ormas perempuan dengan tagline Salimah peduli perempuan, anak, dan keluarga Indonesia.</p>\r\n\r\n<p>Kontributor : Humas Salimah Sulsel</p>', '66a9c168e41b8.jpg', 16, '1', '2024-07-25', '2024-07-24 18:13:50', '2024-08-19 01:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `berandas`
--

CREATE TABLE `berandas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `backgroundIMG` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `fotoketua` varchar(255) DEFAULT NULL,
  `sambutan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berandas`
--

INSERT INTO `berandas` (`id`, `backgroundIMG`, `deskripsi`, `fotoketua`, `sambutan`, `created_at`, `updated_at`) VALUES
(1, '66a1115fcd51e.png', 'Berangkat dari keprihatinan yang mendalam terhadap berbagai permasalahan yang menimpa bangsa ini pada berbagai sektor kehidupan.', '66a10db2228ee.jpg', 'Terlihat pula dari buramnya potret perempuan, maraknya kasus-kasus yang mengguncang institusi keluarga serta lemahnya perlindungan terhadap anak-anak di Indonesia. Kemiskinan dan kebodohan menjadi muara bagi problematika-problematika turunannya yang menjebak masyarakat seperti kasus perdagangan perempuan dan anak, kekerasan dalam rumah tangga, tingginya angka kematian ibu dan balita, tingginya angka penyalahgunaan narkoba serta meningkatnya jumlah penderita HIV/AIDS, maraknya pornografi dan meningkatnya kasus pelecehan serta jumlah anak yang menjadi korban kekerasan seksual dsb.', '2024-07-24 04:57:06', '2024-08-24 03:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `cabangs`
--

CREATE TABLE `cabangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cabangs`
--

INSERT INTO `cabangs` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'PC Salimah Kecamatan Sungai Kakap', 'pc-salimah-kecamatan-sungai-kakap', '2024-07-15 00:38:58', '2024-07-15 00:38:58'),
(2, 'PC Salimah Kecamatan Ambawang', 'pc-salimah-kecamatan-ambawang', '2024-07-30 22:25:53', '2024-07-30 22:25:53'),
(3, 'PC Salimah Kecamatan Sungai Raya', 'pc-salimah-kecamatan-sungai-raya', '2024-07-30 22:26:04', '2024-07-30 22:26:04'),
(4, 'PC Salimah Kecamatan Rasau Jaya', 'pc-salimah-kecamatan-rasau-jaya', '2024-07-30 22:26:19', '2024-07-30 22:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `judul`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'https://www.facebook.com/profile.php?id=100001263074403', '2024-07-28 01:20:21', '2024-07-28 01:20:21'),
(2, 'Youtube', 'https://www.youtube.com/watch?v=Y4j34_DDbyY', '2024-07-28 01:27:32', '2024-07-28 01:27:32'),
(4, 'Youtube', 'https://www.youtube.com/watch?v=Y4j34_DDbyY', '2024-07-28 01:28:22', '2024-07-28 01:28:22'),
(5, 'Youtube', 'https://www.youtube.com/watch?v=Y4j34_DDbyY', '2024-07-28 01:28:29', '2024-07-28 01:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `youtube_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeris`
--

INSERT INTO `galeris` (`id`, `judul`, `youtube_code`, `created_at`, `updated_at`) VALUES
(1, 'Salimah Berbagi Kurban Untuk Umat | 1441 H |', 'tp06Hjc45AY', '2024-07-18 06:12:03', '2024-08-18 17:38:44'),
(5, 'Kegiatan BARBARA (tebar kebahagiaan dengan berbagi bersama)', 'k2OSnSA46QM', '2024-08-08 01:50:30', '2024-08-22 20:04:40'),
(6, 'Peduli dan Lindungi Anak, untuk Indonesia Bermartabat', 'k2OSnSA46QM', '2024-08-22 19:10:03', '2024-08-22 19:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `isiabouts`
--

CREATE TABLE `isiabouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `map` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `isiabouts`
--

INSERT INTO `isiabouts` (`id`, `img`, `judul`, `deskripsi`, `visi`, `misi`, `map`, `created_at`, `updated_at`) VALUES
(1, '66a155d600293.jfif', 'Sejarah Singkat Salimah (Persaudaraan Muslimah)', 'Persaudaraan Muslimah atau biasa disebut Salimah adalah organisasi wanita muslimah yang didirikan di Jakarta pada tanggal 8 Maret 2000 oleh sekelompok muslimah Indonesia. Dewan pendiri Salimah diantaranya, Dra. Yoyoh Yusroh , Dr. Aan Rohanah, Dr. Nursanita Nasution, dan Dra. Zainab M.Si.\r\n\r\nBerangkat dari keprihatinan yang mendalam terhadap berbagai permasalahan yang menimpa bangsa ini pada berbagai sektor kehidupan. Terlihat pula dari buramnya potret perempuan, maraknya kasus-kasus yang mengguncang institusi keluarga serta lemahnya perlindungan terhadap anak-anak di Indonesia. Kemiskinan dan kebodohan menjadi muara bagi problematika-problematika turunannya yang menjebak masyarakat seperti kasus perdagangan perempuan dan anak, kekerasan dalam rumah tangga, tingginya angka kematian ibu dan balita, tingginya angka penyalahgunaan narkoba serta meningkatnya jumlah penderita HIV/AIDS, maraknya pornografi dan meningkatnya kasus pelecehan serta jumlah anak yang menjadi korban kekerasan seksual dsb. Salimah hadir berupaya membawa harapan untuk dapat menjadi salah satu komponen bangsa yang berkontribusi dalam mencari jalan keluar bagi berbagai problematika tersebut dengan program-program yang mendorong pemberdayaan perempuan, pengokohkan institusi keluarga serta perlindungan memadai bagi anak.', 'Penjelasan tentang visi Pertama ini', 'Berangkat dari keprihatinan yang mendalam terhadap berbagai permasalahan yang menimpa bangsa ini pada berbagai sektor kehidupan. Terlihat pula dari buramnya potret perempuan, maraknya kasus-kasus yang mengguncang institusi keluarga serta lemahnya perlindungan terhadap anak-anak di Indonesia. Kemiskinan dan kebodohan menjadi muara bagi problematika-problematika turunannya yang menjebak masyarakat seperti kasus perdagangan perempuan dan anak, kekerasan dalam rumah tangga, tingginya angka kematian ibu dan balita, tingginya angka penyalahgunaan narkoba serta meningkatnya jumlah penderita HIV/AIDS, maraknya pornografi dan meningkatnya kasus pelecehan serta jumlah anak yang menjadi korban kekerasan seksual dsb.', 'dadada', '2024-07-24 11:37:45', '2024-07-27 21:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Pendidikan', 'pendidikan', '2024-07-15 02:18:23', '2024-07-15 02:18:23'),
(5, 'Sosial', 'sosial', '2024-08-18 17:34:56', '2024-08-18 17:34:56'),
(6, 'Ekonomi', 'ekonomi', '2024-08-18 17:35:26', '2024-08-18 17:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `deskripsi` text NOT NULL,
  `donasi` decimal(15,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` enum('menunggu','ditolak','menunggu_verifikasi','diproses','selesai') NOT NULL DEFAULT 'menunggu',
  `visibility` enum('publish','private') NOT NULL,
  `cabang_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporans`
--

INSERT INTO `laporans` (`id`, `judul`, `slug`, `tanggal_kegiatan`, `deskripsi`, `donasi`, `img`, `status`, `visibility`, `cabang_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Peduli dan Lindungi Anak, untuk Indonesia Bermartabat', 'keluarga-berencana', '2024-07-31', '<p><img alt=\"\" src=\"http://127.0.0.1:8000/storage/photos/1/Capture.PNG\" style=\"height:25%; width:25%\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Menurut data BPS tahun 2023, masih banyak masalah anak di Indonesia, mulai dari pemenuhan gizi sejak 1.000 hari kelahiran anak, stunting, hak pendidikan dasar sembilan tahun, maraknya penjualan organ tubuh yang diambil dari anak-anak, kecanduan gadget, kesehatan anak, kemiskinan, dan masalah kekerasan pada anak. Dengan demikian, pemerintah harus hadir dalam berbagai upaya untuk memastikan perlindungan anak dapat terwujud di berbagai aspek, termasuk di lingkungan yang erat kaitannya dengan keseharian anak. Upaya yang bisa dilakukan pemerintah antara lain penyediaan kebijakan, pelaksanaan regulasi dan penegakan hukum, penguatan norma dan nilai anti kekerasan, penciptaan lingkungan yang aman dari kekerasan, ketersediaan akses layanan terintegrasi; dan pendidikan kecakapan hidup untuk ketahanan anak.<br />\r\n​<br />\r\nIslam memandang anak sebagai karunia berharga yang suci. Karunia yang mahal ini adalah amanah yang harus dijaga dan dilindungi khususnya oleh orangtua. Karena anak sebagai aset orangtua dan aset bangsa. Islam telah memberikan perhatian yang besar terhadap perlindungan anak-anak. Perlindungan dalam Islam meliputi fisik, psikis, intelektual, moral, ekonomi, dan lainnya. Hal ini dijabarkan dalam bentuk memenuhi semua hak-haknya, menjamin kebutuhan sandang dan pangannya, menjaga nama baik dan martabatnya, menjaga kesehatannya, memilihkan teman bergaul yang baik, menghindarkan dari kekerasan, dan lain-lain. (Qs. Al-Furqaan: 74)<br />\r\n​</p>\r\n\r\n<p>&nbsp;</p>', 1000000.00, '66c289c812aa3.jpg', 'diproses', 'publish', 1, 1, '2024-07-15 00:40:08', '2024-08-18 16:54:48'),
(2, 'Peringati Hari Anak Nasional', 'dakfjafuhesjik', '2024-07-31', '<p>Kegiatan dihadiri oleh Ketua PW Salimah Sulsel bersama pengurus, anggota Sekolah Ibu Salimah Terpadu (Sister), Santri Baitul Quran Salimah (BQS), peserta lomba, tokoh masyarakat, dan dinas terkait (Dinas Sosial, BPOM, Puspaga DP3A DALDUK KB Prov Sulsel), serta sejumlah sponsor.</p>\r\n\r\n<p>Kegiatan yang dilaksanakan diantaranya lomba mewarnai dan hafalan al quran serta doa harian tingkat RA/TK dan SD/Mi, pembagian nutrisi untuk anak dhuafa, edukasi pangan halal, keamanan pangan dan kosmetik, peluncuran konseling keluarga, dan peringatan puncak Hari Anak Nasional ke-40 tahun 2024.</p>\r\n\r\n<p>Ketua PJ TP PKK Provinsi Sulawesi Selatan, Ninuk Trianti Zudan, membuka acara puncak peringatan Hari Anak Nasional ke 40 tahun 2024. Ia menyampaikan apresiasi kepada para pengurus Salimah dan panitia serta semua pihak yang telah terlibat dan berkontribusi dalam mempersiapkan kegiatan ini untuk memberikan yang terbaik bagi anak-anak.</p>', 2000000.00, '66a9ca70bfafc.jpg', 'diproses', 'publish', 1, 1, '2024-07-15 00:47:16', '2024-07-30 22:24:00'),
(3, 'Keluarga Berencana', 'waduh', '2024-07-31', '<p>Salimah sebagai ormas perempuan yang sudah 24 tahun memiliki visi dan misi peduli pada perempuan, anak dan keluarga Indonesia, memberikan perhatian khusus terhadap permasalahan kualitas anak Indonesia. Tersebar di 36 provinsi dengan jaringan sebanyak 414 kota di seluruh Indonesia, Salimah menjadikan anak sebagai salah satu bagian dari program perhatiannya demi cita-cita untuk ikut berperan dalam membentuk generasi Indonesia yang kuat di masa depan. Di antara program yang dijalankan Salimah secara nasional antara lain pencegahan stunting pada anak, program literasi dengan memberikan bantuan buku&ndash;buku bacaan untuk taman bacaan anak yang ada di sekolah usia dini (PAUD), program penyuluhan intensif yang dilakukan dalam bentuk pembinaan rutin kepada peserta didik anak&ndash;anak, dan juga program edukasi kepada para orangtua tentang bagaimana menjadi orangtua yang mampu mendidik anak sesuai dengan kondisi hari ini dalam bentuk kegiatan Komunitas Orangtua Bijaksana (KOB). &nbsp;Melalui programnya, Salimah berharap dapat mengembalikan peran kualitas anak Indonesia sebagai generasi penerus bangsa. Mereka merupakan investasi vital bagi masa depan sebuah bangsa, karena mereka yang akan menerima estafet kepemimpinan bangsa serta meneruskan dan memajukan negara ini ke arah yang lebih baik. Anak&ndash;anak adalah bintang&ndash;bintang yang bersinar terang. Mereka adalah harapan masa depan dan penerus cita&ndash;cita bangsa.</p>', 200000.00, '66a0b5534066d.png', 'diproses', 'publish', 1, 1, '2024-07-15 02:17:01', '2024-07-24 18:20:06'),
(4, 'Temukan Kekuatan untuk Masuk ke Dunia Usaha', 'temukan-kekuatan-untuk-masuk-ke-dunia-usaha', '2024-07-26', '<p>Salimah sebagai ormas perempuan yang sudah 24 tahun memiliki visi dan misi peduli pada perempuan, anak dan keluarga Indonesia, memberikan perhatian khusus terhadap permasalahan kualitas anak Indonesia. Tersebar di 36 provinsi dengan jaringan sebanyak 414 kota di seluruh Indonesia, Salimah menjadikan anak sebagai salah satu bagian dari program perhatiannya demi cita-cita untuk ikut berperan dalam membentuk generasi Indonesia yang kuat di masa depan. Di antara program yang dijalankan Salimah secara nasional antara lain pencegahan stunting pada anak, program literasi dengan memberikan bantuan buku&ndash;buku bacaan untuk taman bacaan anak yang ada di sekolah usia dini (PAUD), program penyuluhan intensif yang dilakukan dalam bentuk pembinaan rutin kepada peserta didik anak&ndash;anak, dan juga program edukasi kepada para orangtua tentang bagaimana menjadi orangtua yang mampu mendidik anak sesuai dengan kondisi hari ini dalam bentuk kegiatan Komunitas Orangtua Bijaksana (KOB). &nbsp;Melalui programnya, Salimah berharap dapat mengembalikan peran kualitas anak Indonesia sebagai generasi penerus bangsa. Mereka merupakan investasi vital bagi masa depan sebuah bangsa, karena mereka yang akan menerima estafet kepemimpinan bangsa serta meneruskan dan memajukan negara ini ke arah yang lebih baik. Anak&ndash;anak adalah bintang&ndash;bintang yang bersinar terang. Mereka adalah harapan masa depan dan penerus cita&ndash;cita bangsa.</p>', 2000000.00, '66a1a89f47fbe.jpeg', 'diproses', 'publish', 1, 1, '2024-07-24 18:21:35', '2024-07-24 18:23:40'),
(7, 'Gelar Rakorda, Salimah Beri Penghargaan', 'gelar-rakorda-salimah-bogor-beri-penghargaan', '2024-07-26', '<p>Bogor (15/7/2024) &ndash; Pengurus Daerah Persaudaraan Muslimah (PD Salimah) Kabupaten Bogor menggelar Rapat Koordinasi Daerah (Rakorda) di Ruang Paripurna DPRD Kabupaten Bogor pada Ahad (14/07).</p>\r\n\r\n<p>Mengusung tema &ldquo;Satukan persepsi Kuatkan sinergi dan kokohkan Solidaritas untuk Organisasi yang Berintegritas&rdquo;, kegiatan ini menjadi ajang silaturahim dan evaluasi dari program-program yang akan dijalankan oleh Pimpinan Cabang (PC) yang ada di Kabupaten Bogor.</p>\r\n\r\n<p>Ketua PD Salimah Kabupaten Bogor, Nur Laela Turohmah, menyampaikan terimakasih kepada semua pihak yang turut menyukseskan Rakorda. Ia juga menyampaikan apresiasi yang sebesar-besarnya kepada seluruh pengurus Salimah yang luar biasa kiprahnya sehingga semua program dapat diterima manfaatnya oleh masyarakat luas.</p>', 5000000.00, '66a1a9b6ac3ce.jpeg', 'selesai', 'publish', 3, 1, '2024-07-24 18:26:14', '2024-08-18 16:57:53'),
(8, 'pemberian awards', 'pemberian-awards', '2024-07-26', '<p>&ldquo;Salimah bukan organisasi bisnis, tapi organisasi massa yang disatukan dalam idealisme. Ini yang harus terus kita pertahankan dengan menjaga soliditas antar pengurus dengan memiliki 3-W, yaitu Winning Value, Winning Concept, dan Winning Goal. Yakinlah keberadaan kita di Salimah merupakan rahmat dari Allah,sehingga bersama Salimah kita mendapatkan banyak sekali kesempatan untuk beramal soleh dan memberikan manfaat pada keluarga, masyarakat, dan bangsa kita,&rdquo; tutur Nur Laela.</p>\r\n\r\n<p>Sementara itu, Dewan Pertimbangan Salimah Daerah (DPSD), Dewi Sartika, berpesan agar pengurus Salimah mampu menunjukkan personality sebagai pengurus organisasi yang memiliki nilai kebaikan dan kebermanfaatan untuk masyarakat luas. Pengurus juga harus senantiasa mengedepankan etika dalam berorganisasi dan menjaga amanah. Ia berharap, semua pengurus Salimah bisa membranding organisasi dengan baik.</p>\r\n\r\n<p>Acara dilanjutkan dengan pemaparan program kerja yang dimulai dari Sekretaris oleh Nurul Fadhillah, Bendahara oleh Iis Dahliani, Departemen Bangca oleh Elly Dahlia, Departemen Humas oleh Chomsatun, Departemen Dakwah oleh Nur Syifa, Department Diklat oleh Yati Kusumawati dan Departemen Ekonom oleh Anis Fitriani.</p>\r\n\r\n<p>Masih dalam rangkaian kegiatan yang sama, dilaksanakan juga peluncuran Lembaga Wakaf Salimah (LWS) oleh Ketua Salimah Kabupaten Bogor.</p>', 1000000.00, '66a1a9f5369f5.jpeg', 'selesai', 'publish', 1, 1, '2024-07-24 18:27:17', '2024-07-24 18:30:47'),
(9, 'Baca Pikiran dan Bahasa Tubuh Agar Mudah Berinteraksi', 'baca-pikiran-dan-bahasa-tubuh-agar-mudah-berinteraksi', '2024-07-27', '<p>Jakarta (8/7/24) &ndash; Sudah&nbsp;<em>sunnatullah</em>&nbsp;bahwa manusia tercipta sebagai makhluk sosial, perlu saling berinteraksi antara satu dengan lainnya. Agar interaksi bisa lancar dan mudah dipahami, maka perlu kiat-kiat bagaimana menyamakan visi, membaca pikiran dan bahasa tubuh.</p>\r\n\r\n<p>Dalam berinteraksi perlu pula dibekali dengan ilmu tentang cara merespons setiap kejadian, bagaimana supaya ia merasa diperhatikan ketika berada di titik terendahnya.<br />\r\nSelain itu juga perlu ilmu bagaimana menjadi pendengar yang baik, bukan hanya mendominasi pembicaraan.</p>\r\n\r\n<p>Karena itu, Salimah merasa perlu meningkatkan pemahaman pengurus dalam hal manajemen diri. Pelatihan yang disebut&nbsp;<em>Neuro Linguistik Programming</em>&nbsp;(NLP) diselenggarakan oleh Pimpinan Ranting (Pra) Salimah Tegal Parang pada 29 Juni dan 6 Juli 2024, diikuti oleh pengurus tingkat wilayah hingga ranting di rumah salah seorang pengurus di Jakarta Selatan.</p>\r\n\r\n<p>Adalah Dini Aksarni, seorang pakar NLP, mengupas bagaimana sisi kehidupan manusia sebagai mahluk sosial, hubungan antar sesama manusia atau hablumminannaas tanpa melupakan ajaran-ajaran dari Rasulullah sebagai teladan.</p>\r\n\r\n<p>&ldquo;NLP bisa didefinisikan sebagai studi praktis antara pikiran, perasaan (intuisi) yang dinamikanya tampak di sistem neurologi kita, yang bisa mempengaruhi dan dipengaruhi oleh sistem bahasa kita (linguistik),&rdquo; jelas Dini. &ldquo;Dan hubungan antara keduanya adalah untuk mengubah kebiasaan-kebiasaan yang tidak bermanfaat menjadi bermanfaat.&rdquo;</p>', 2000000.00, '66a1aa3a4bd40.jpeg', 'selesai', 'publish', 1, 1, '2024-07-24 18:28:26', '2024-07-24 18:31:08'),
(10, 'tidak bermanfaat menjadi bermanfaat', 'tidak-bermanfaat-menjadi-bermanfaat', '2024-07-26', '<p>NLP merupakan pendekatan komunikasi, pengembangan diri, dan psikoterapi yang diciptakan oleh Richard Bandler dan Jhon Grinder. Mereka mengklaim bahwa ada hubungan antara Neuro dan Linguistik dan pola perilaku yang di pelajari melalui&nbsp;<em>programming</em>&nbsp;(pengalaman) yang bisa diubah untuk mencapai&nbsp;<em>goals</em>&nbsp;atau tujuan tertentu dalam hidup.</p>\r\n\r\n<p>Dalam kehidupan, manusia pasti memiliki tujuan-tujuan yang ingin dicapai. Training NLP ini menjawab semua yang dibutuhkan dalam berkehidupan sehari-hari. Selain pengurus, rencananya pelatihan NLP ini akan diberikan kepada masyarakat luas.</p>\r\n\r\n<p>(MAY, Humas PD Jakarta Selatan)</p>', 4000000.00, 'C:\\xampp\\tmp\\php9D5C.tmp', 'selesai', 'private', 1, 1, '2024-07-24 18:29:40', '2024-07-30 22:11:32'),
(11, 'Bulan Kita Berbagi', 'bulan-kita-berbagi', '2024-08-01', '<p>Perang di Palestina masih berlanjut hingga kini. Laporan pada 27 Mei 2024, telah jatuh korban syahid 36 ribu jiwa dan luka parah mencapai 81 ribu orang. Dalam sehari, pembantaian bukan hanya terjadi sekali, tapi bisa sampai belasan kali. Sehingga dalam satu keluarga besar bisa kehilangan puluhan anggota keluarga. Bahkan di Gaza sudah terhapus 132 silsilah (marga) keluarga.</p>\r\n\r\n<p>Gaza luasnya separuh dari Jakarta. Dibombardir sedemikian rupa selama sembilan bulan lebih. Hingga hari ini kita saksikan genosida (penghancuran tubuh) berlangsung terus di sana dan menjadi update berita sehari-hari. Ada yang kepalanya sudah putus, ada anak yang memunguti tubuh ibunya yang sudah hancur, dikumpulkan walau hanya dikafani dgn kain putih kecil. Demikian juga sebaliknya, seorang ibu yang memunguti sisa potongan tubuh anaknya.</p>\r\n\r\n<p>Sisa pertahanan umat hanya tinggal di Gaza. Target zionis Israel adalah untuk menghacurkan Masjidil Aqsa. Tanah sudah mereka ambil, mesjid sudah 70 tahun lebih mereka nodai. Bila warga Gaza mengibarkan bendera putih dan tidak kuat lagi dengan penyiksaan sedemikian rupa, maka zionis akan mudah menghancurkan Masjidil Aqsa. Bila ini terjadi, maka fardhu kifayah penjagaan Masjidil Aqsa akan batal. Kita semua umat muslim seluruh dunia akan dibebani kewajiban menjaga Masjidil Aqsa. Bayangkan mahalnya biaya karena jaraknya yang jauh dengan resiko menghadapi baku tembak pula.</p>', 10000000.00, '66c28a02e3e76.jpg', 'diproses', 'publish', 1, 1, '2024-07-30 20:10:44', '2024-08-18 16:55:46'),
(13, 'Program Baperan', 'program-baperan', '2024-07-31', '<p><strong>Mari Berperan dengan Baperan (Berbagi Paket Pemadam Kelaparan)</strong></p>\r\n\r\n<p><br />\r\nAssalamu&rsquo;alaikum Warahamatullahi Wabarakatuh&nbsp;<strong>#SahabatLaju</strong></p>\r\n\r\n<p>Pandemi belum sepenuhnya selesai, bahkan saat ini dampak terhadap perekonomian masyarakat masih sangat terasa, begitu banyak yang masih kehilangan pekerjaan dan kesulitan dalam memenuhi kebutuhan sandang dan pangannya.<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p>Untuk itu Laju Peduli mengajak para Sahabat baik Laju untuk ikut Berperan dalam Program Baperan (Berbagi Paket Pemadam Kelaparan) berupa sembako kebutuhan pangan sehari-hari guna memadamkan kelaparan saudara-saudara kita yang membutuhkan.</p>\r\n\r\n<p>Demi terealisasikannya program Baperan ini, Kami mengajak&nbsp;<strong>#SahabatLaju&nbsp;</strong>sekalian untuk ikut berperan dan berkontribusi dengan menginfakkan sebagian harta yang Allah amanahkan kepada&nbsp;<strong>#SahabatLaju</strong></p>', 1000000.00, '66a9cbd832409.png', 'diproses', 'publish', 2, 2, '2024-07-30 22:30:00', '2024-07-30 22:32:38'),
(14, 'Kegiatan BARBARA (tebar kebahagiaan dengan berbagi bersama)', 'kegiatan-barbara-tebar-kebahagiaan-dengan-berbagi-bersama', '2024-08-19', '<p>Himpunan Mahasiswa Kebidanan menggelar acara berbagi dan melakukan kretivitas bersama anak yatim dan dhuafa. Kegiatan ini dilakukan di Yayasan Amal Sholeh Sejahtera, pada 14 April 2023.</p>\r\n\r\n<p><a href=\"https://fikes.unas.ac.id/wp-content/uploads/2023/05/WhatsApp-Image-2023-05-10-at-12.26.33.jpeg\"><img alt=\"\" src=\"https://fikes.unas.ac.id/wp-content/uploads/2023/05/WhatsApp-Image-2023-05-10-at-12.26.33-300x225.jpeg\" style=\"height:225px; width:300px\" /></a>Ketua Himpunan Mahasiswa Kebidanan, Taqiyya Hasya Tsabitha mengatakan ingin kegiatan ini dapat bermanfaat dan menumbuhkan rasa peduli terhadap sesame serta diharapkan mampu mengembangan kretivitas anak yatim dan dhuafa. Kegiatan BARBARA ini merupakan program kerja Himpunan Mahasiswa Kebidanan dari Divisi Pengabdian Masyarakat. Dengan tema &ldquo;Menciptakan kreativitas serta kepedulian terhadap sesama&rdquo;, kegiatan ini merupakan wujud nyata dari kepedulian mahasiswa kebidanan dengan melakukan kreativitas mewarnai di totebag, melakukan kuis dan berbagi kepada anak yatim dan dhafa.</p>\r\n\r\n<p>&ldquo;Semoga dengan adanya acara ini kita bisa terus mengembangkan tali silatuhami dan menebar kebaikan dan semoga dengan acara perdana ini bisa terus terlaksana acara ini di tahun tahun berikutnya&rdquo; ujar Daviena Azzahra, Ketua Pelaksana Tebar Kebahagiaan Dengan Berbagi Bersama HIMAKEB BARBARA<br />\r\nKegiatan ini dihadiri oleh Panitia BARBARA, Anak yatim dan dhuafa serta Koordinator Yayasan Amal Sholeh dan Dhuafa. Kegiatan diakhir dengan pembagian nasi box dan santunan kepada anak yatim dan dhuafa.</p>', 1000000.00, '66c283ba4f949.jpg', 'diproses', 'publish', 3, 3, '2024-08-18 16:28:58', '2024-08-18 16:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangans`
--

CREATE TABLE `laporan_keuangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `laporan_id` bigint(20) UNSIGNED NOT NULL,
  `jenis` enum('masuk','keluar') NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `keterangan` text NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_keuangans`
--

INSERT INTO `laporan_keuangans` (`id`, `laporan_id`, `jenis`, `nominal`, `keterangan`, `img`, `created_at`, `updated_at`) VALUES
(1, 2, 'masuk', 2000.00, 'hehehew2', '66987c54a7936.png', '2024-07-15 00:56:50', '2024-07-17 19:22:12'),
(3, 2, 'masuk', 30000.00, 'waduhwaw', '66987b6b213b4.png', '2024-07-15 01:09:41', '2024-07-17 19:18:19'),
(4, 2, 'keluar', 2020.00, 'heheheds', '66987b8d7c737.png', '2024-07-15 01:17:00', '2024-07-17 19:18:53'),
(5, 2, 'masuk', 10000.00, 'hewan', '6694e786a5264.jpeg', '2024-07-15 01:35:38', '2024-07-15 02:10:30'),
(6, 10, 'masuk', 2000.00, 'uang jajan', '66a1ab0677d36.jpg', '2024-07-24 18:31:50', '2024-07-24 18:31:50'),
(7, 10, 'keluar', 3000.00, 'uang jajan', '66a1ab1e3ed23.jpg', '2024-07-24 18:32:14', '2024-07-24 20:34:49'),
(8, 10, 'keluar', 2000.00, 'uang jajan', '66a1ab4a7b9d6.jpg', '2024-07-24 18:32:58', '2024-07-24 18:32:58'),
(9, 14, 'masuk', 1000000.00, 'donasi ridwan', NULL, '2024-08-18 16:31:19', '2024-08-18 16:31:19'),
(10, 14, 'masuk', 25000.00, 'donasi ibu fatma', '66c284d7a1892.jpg', '2024-08-18 16:33:43', '2024-08-18 16:33:43'),
(11, 14, 'masuk', 100000.00, 'donasi pak wahyu', '66c2854d42552.jpg', '2024-08-18 16:35:41', '2024-08-18 16:35:41'),
(12, 14, 'keluar', 200000.00, 'belanja peralatan makanan', '66c2860db6cc5.jfif', '2024-08-18 16:38:53', '2024-08-18 16:38:53'),
(13, 14, 'keluar', 100000.00, 'air 4 kardus', '66c2866354b6b.jpg', '2024-08-18 16:40:19', '2024-08-18 16:40:19'),
(14, 13, 'masuk', 300000.00, 'Pak wahyu sepakat', '66c28760adb92.jpg', '2024-08-18 16:44:32', '2024-08-18 16:44:32'),
(15, 13, 'masuk', 200000.00, 'buk suliha tanray', '66c2878810a92.jpg', '2024-08-18 16:45:12', '2024-08-18 16:45:12'),
(16, 9, 'masuk', 500000.00, 'Ibu Nurfida', '66c287d7280e6.jpg', '2024-08-18 16:46:31', '2024-08-18 16:46:31'),
(17, 9, 'masuk', 300000.00, 'Ibu yani', '66c28802549ed.jpg', '2024-08-18 16:47:14', '2024-08-18 16:47:14'),
(18, 9, 'masuk', 1000000.00, 'Pak wahyu sepakat', '66c2884fba787.jpg', '2024-08-18 16:48:31', '2024-08-18 16:48:31'),
(19, 9, 'masuk', 300000.00, 'Ibu hafidah', '66c28879eccad.jpg', '2024-08-18 16:49:13', '2024-08-18 16:49:13'),
(20, 9, 'keluar', 1000000.00, 'Catering', '66c288b8be85e.jpg', '2024-08-18 16:50:16', '2024-08-18 16:50:16'),
(21, 9, 'keluar', 500000.00, 'catering snack', '66c288d690b44.jfif', '2024-08-18 16:50:46', '2024-08-18 16:50:46'),
(22, 7, 'masuk', 2000000.00, 'Pak wahyu sepakat', '66c28ac2ae48c.jpg', '2024-08-18 16:58:58', '2024-08-18 16:58:58'),
(23, 7, 'masuk', 250000.00, 'Donasi dari Aulia', '66c28aedc28d6.jpg', '2024-08-18 16:59:41', '2024-08-18 16:59:41'),
(24, 7, 'masuk', 1000000.00, 'Donasi Dian', '66c28b0ca35a5.jpg', '2024-08-18 17:00:12', '2024-08-18 17:00:12'),
(25, 7, 'keluar', 1850000.00, 'Catering', '66c28b43909d4.jpg', '2024-08-18 17:01:07', '2024-08-18 17:01:07'),
(26, 13, 'masuk', 500000.00, 'Donasi dari belly', NULL, '2024-08-19 03:05:29', '2024-08-19 03:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '0001_05_30_080045_create_cabangs_table', 1),
(4, '0002_01_01_000000_create_users_table', 1),
(5, '2024_05_04_102029_create_kategoris_table', 1),
(6, '2024_05_04_102149_create_artikels_table', 1),
(7, '2024_05_15_071417_create_galeris_table', 1),
(8, '2024_05_30_091241_create_laporans_table', 1),
(9, '2024_06_02_095830_create_laporan_keuangans_table', 1),
(10, '2024_07_24_105400_create_dashboards_table', 2),
(11, '2024_07_24_114921_create_berandas_table', 3),
(12, '2024_07_24_154625_create_programs_table', 4),
(13, '2024_07_24_175413_create_isiabouts_table', 5),
(14, '2024_07_28_042906_create_tampilabouts_table', 6),
(15, '2024_07_28_074952_create_footers_table', 7),
(16, '2024_08_24_102443_remove_program_fields_from_berandas_table', 8),
(17, '2024_08_24_104816_add_status_to_programs_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('unggulan','dijalankan') NOT NULL DEFAULT 'dijalankan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `img`, `judul`, `deskripsi`, `created_at`, `updated_at`, `status`) VALUES
(1, '66a1289c03d11.png', 'Keluarga Berencana', 'Keluarga berencana untuk indonesia', '2024-07-24 09:15:24', '2024-08-24 03:58:50', 'unggulan'),
(3, '66a12b9533003.png', 'Ini Judul Laporanss', 'perbarui dd', '2024-07-24 09:28:05', '2024-08-24 04:34:40', 'unggulan'),
(4, '66c318941c9a4.png', 'Sidang Tugas Akhir', 'Sidang tugas akhir khom dan belly', '2024-08-19 03:04:04', '2024-08-24 04:34:00', 'unggulan'),
(6, '66c9bfab566ee.png', 'coba coba dulu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis tortor fringilla, elementum felis ut, vulputate metus. Nulla ut volutpat ante, id viverra metus. Fusce ut vulputate arcu.', '2024-08-24 04:10:35', '2024-08-24 04:33:19', 'unggulan'),
(7, '66c9ccf58eb0a.jpeg', 'Ini Judul Laporanss', 'cobaduluuu', '2024-08-24 05:07:17', '2024-08-24 05:07:17', 'dijalankan');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bny2KfS8pPuBhXwbtTvR7gx7T7qTRHKa1EFPXiTV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOVNTeExWc3JPUk41ajBDbUVpcmo4T01MSEtmTjBwQTBVZjI5c1pvYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9ncmFtYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1724501574);

-- --------------------------------------------------------

--
-- Table structure for table `tampilabouts`
--

CREATE TABLE `tampilabouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `judulmap` varchar(255) NOT NULL,
  `map` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tampilabouts`
--

INSERT INTO `tampilabouts` (`id`, `img`, `judul`, `deskripsi`, `visi`, `misi`, `judulmap`, `map`, `created_at`, `updated_at`) VALUES
(1, '66a5ce298cc7b.png', 'Sejarah Singkat Salimah (Persaudaraan Muslimah)', 'Persaudaraan Muslimah atau biasa disebut Salimah adalah organisasi wanita muslimah yang didirikan di Jakarta pada tanggal 8 Maret 2000 oleh sekelompok muslimah Indonesia. Dewan pendiri Salimah diantaranya, Dra. Yoyoh Yusroh , Dr. Aan Rohanah, Dr. Nursanita Nasution, dan Dra. Zainab M.Si.\r\n\r\nBerangkat dari keprihatinan yang mendalam terhadap berbagai permasalahan yang menimpa bangsa ini pada berbagai sektor kehidupan. Terlihat pula dari buramnya potret perempuan, maraknya kasus-kasus yang mengguncang institusi keluarga serta lemahnya perlindungan terhadap anak-anak di Indonesia. Kemiskinan dan kebodohan menjadi muara bagi problematika-problematika turunannya yang menjebak masyarakat seperti kasus perdagangan perempuan dan anak, kekerasan dalam rumah tangga, tingginya angka kematian ibu dan balita, tingginya angka penyalahgunaan narkoba serta meningkatnya jumlah penderita HIV/AIDS, maraknya pornografi dan meningkatnya kasus pelecehan serta jumlah anak yang menjadi korban kekerasan seksual dsb. Salimah hadir berupaya membawa harapan untuk dapat menjadi salah satu komponen bangsa yang berkontribusi dalam mencari jalan keluar bagi berbagai problematika tersebut dengan program-program yang mendorong pemberdayaan perempuan, pengokohkan institusi keluarga serta perlindungan memadai bagi anak.', 'Menjadi Ormas Muslimah yang dinamis dalam meningkatkan kualitas hidup perempuan, keluarga dan anak Indonesia', '1. Memperkokoh soliditas struktur dan memperluas wilayah\r\n2. Meningkatkan kualitas pengurus dan anggota agar mampu merealisasikan visi dan\r\nmisi Salimah\r\n3. Meningkatkan kuantitas anggota sebagai basis massa Salimah\r\n4. Mengokohkan peran dan posisi Salimah dalam peta pergerakan perempuan Indonesia\r\n5. Meningkatkan peran serta Salimah dalam upaya pemberdayaan perempuan, pengokohan\r\nkeluarga dan perlindungan anak\r\n6. Meluaskan dan mengokohkan kemitraan dengan pemerintah dan lembaga lain dalam\r\nmerealisasikan visi dan misi Salimah', 'Lokasi Salimah', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15959.271610983342!2d109.34084109999999!3d-0.0262144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d585206d712c9%3A0x4482ff0caf4d858!2sAming%20Coffee!5e0!3m2!1sen!2sid!4v1722143555943!5m2!1sen!2sid', '2024-07-27 21:49:17', '2024-08-18 18:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `nohp` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin_Pusat','admin_cabang') NOT NULL DEFAULT 'admin_Pusat',
  `cabang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `nohp`, `password`, `role`, `cabang_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khomarul Arifin', 'adminpusat@gmail.com', NULL, '0882019472530', '$2y$12$gBqESd8IVSbSXQcGLUt.qu5KFQO2EdbqXptnjupbhFNhLPgejT0tG', 'admin_Pusat', NULL, NULL, '2024-07-15 00:27:32', '2024-08-08 02:51:00'),
(2, 'Tri Aulia', 'triaulia@gmail.com', NULL, '0885750232883', '$2y$12$3SknUz02T4qJqyfsO.H45O8Ts.VKXQLXc/FaSzT7yCrHlgBTHjhCO', 'admin_cabang', 2, NULL, '2024-07-30 22:27:13', '2024-07-30 22:27:13'),
(3, 'Belly Mulyadi', 'belly@gmail.com', NULL, '088231213242', '$2y$12$l/tbn/5c9x0RX4ytsB2OS.9IjF5uQDrho5UGq2DhMbH4RZuCox0Bu', 'admin_cabang', 3, NULL, '2024-08-08 02:02:22', '2024-08-08 02:02:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikels_kategori_id_index` (`kategori_id`);

--
-- Indexes for table `berandas`
--
ALTER TABLE `berandas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabangs`
--
ALTER TABLE `cabangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isiabouts`
--
ALTER TABLE `isiabouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporans_cabang_id_foreign` (`cabang_id`),
  ADD KEY `laporans_user_id_foreign` (`user_id`);

--
-- Indexes for table `laporan_keuangans`
--
ALTER TABLE `laporan_keuangans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_keuangans_laporan_id_foreign` (`laporan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tampilabouts`
--
ALTER TABLE `tampilabouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_cabang_id_foreign` (`cabang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `berandas`
--
ALTER TABLE `berandas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cabangs`
--
ALTER TABLE `cabangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `isiabouts`
--
ALTER TABLE `isiabouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `laporan_keuangans`
--
ALTER TABLE `laporan_keuangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tampilabouts`
--
ALTER TABLE `tampilabouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikels`
--
ALTER TABLE `artikels`
  ADD CONSTRAINT `artikels_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`);

--
-- Constraints for table `laporans`
--
ALTER TABLE `laporans`
  ADD CONSTRAINT `laporans_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `laporan_keuangans`
--
ALTER TABLE `laporan_keuangans`
  ADD CONSTRAINT `laporan_keuangans_laporan_id_foreign` FOREIGN KEY (`laporan_id`) REFERENCES `laporans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabangs` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
