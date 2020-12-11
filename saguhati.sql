-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2020 pada 13.23
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saguhati`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_produk`
--

CREATE TABLE `data_produk` (
  `id` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `variant` varchar(255) NOT NULL,
  `kategori` enum('makanan','batik','rotan','rajut','mainan') NOT NULL,
  `harga` int(10) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_produk`
--

INSERT INTO `data_produk` (`id`, `id_penjual`, `nama_produk`, `variant`, `kategori`, `harga`, `lokasi`, `gambar`, `deskripsi`) VALUES
(2, 5, 'Bakpia Tugu', 'Coklat|Keju|Kacang Hijau|Kacang Merah|Kulit Original|Kulit Coklat', 'makanan', 45000, 'Bakpia Tugu Jogja', 'images/u4bakpiatugu.jpeg', 'Bakpia merupakan salah satu oleh-oleh khas yang tidak boleh ketinggalan bila anda berwisata ke kota Yogyakarta, memiliki banyak varian rasa yang selalu menjadi kegemaran pengunjung wisatawan lokal mapun asing. Salah satu bakpia yang terkenal yaitu Bakpia'),
(3, 5, 'Burger Kaliurang', 'Saus Teriyaki|Saus BBQ|Saus Blackpepper|Double Cheese|Grilled Onion|Omelet Burger', 'makanan', 10000, 'Sobat Burger', 'images/u4burger.jpeg', 'Bagi kalian penggemar burger pasti udah gak asing lagi sama Sobat Burger yang lagi rame ini, dengan banyak pilihan rasa dan harga yang terjangkau pas banget buat kalian yang lagi laper tapi gak mau makan berat. Varian best seller dari Sobat Burger yaitu S'),
(4, 5, 'Yangko', 'Original|Kacang|Buah', 'makanan', 20000, 'Pusat Oleh-Oleh', 'images/u4yangko.jpeg', 'Yangko merupakan makanan khas kota Yogyakarta yang terbuat dari tepung ketan. Yangko berbentuk kotak dengan baluran tepung ketan, kenyal, dan rasanya manis. Camilan ini bisa juga dijadikan salah satu pilihan sebagai oleh-oleh dari kota Yogyakarta gais. Ka'),
(5, 5, 'Gudeg Kaliurang', 'Gudeg Putih|Gudeg Basah|Gudeg Kering', 'makanan', 35000, 'Gudeg Kaliurang', 'images/u4gudeg.jpeg', 'Gudeg merupakan makanan khas Provinsi Yogyakarta dan Jawa Tengah yang terbuat dari nangka muda yang dimasak dengan santan. Bagi kalian yang rindu makanan khas yang satu ini gak perlu lagi repot buat pergi ke Jogja, bisa banget dengan pesan langsung lewat '),
(6, 5, 'Ice-Gell', 'Coklat Caramel Cream|Mocca Cream|Brown Sugar|Green Larva|Vanilla Freeze|Hazelnut Coffee|Mango Green Tea|Apple Green Tea', 'makanan', 20000, 'Minuman Ice Kekinian', 'images/u5es.jpeg', 'Minuman kekinian Ice-Gell ini paling bisa buat menghilangkan dahaga sobat semua, dengan banyak pilihan rasa yang tersedia dan banyak pilihan topping membuat sobat tidak kehabisan pilihan. Best seller dari minuman ini yaitu Coklat Caramel Cream, Vanilla Fr'),
(7, 5, 'Bakpia Keju', 'Isi 10|Isi 15|Isi 20|Isi 30', 'makanan', 35000, 'Pusat Bakpia', 'images/u4bakpia.png', 'Bakpia merupakan salah satu oleh-oleh khas yang tidak boleh ketinggalan\r\n					bila anda berwisata ke kota Yogyakarta, harga yang terjangkau juga menjadi alasan para wisatawan berburu bakpia sebagai oleh-oleh. Salah satu bakpia yang terkenal yaitu Bakpia K'),
(8, 5, 'Batik Merah Wayang', 'S|M|XL', 'batik', 250000, 'Batik Kusuma Jaya', 'images/u4batik.jpeg', 'Selain makanan, kota Yogyakarta juga terkenal dengan batiknya yang mempunyai berbagai motif dan warna. Selain biasa digunakan sebagai pakaian untuk berbagai acara baik resmi maupun santai, baju batik juga bisa dijadikan sebagai oleh-oleh untuk teman maupu'),
(9, 5, 'Batik Pria Abu-Abu', 'S|M|L', 'batik', 250000, 'Batik Kusuma Jaya', 'images/u4batik2.jpg', 'Selain makanan, kota Yogyakarta juga terkenal dengan batiknya yang mempunyai berbagai motif dan warna. Selain biasa digunakan sebagai pakaian untuk berbagai acara baik resmi maupun santai, baju batik juga bisa dijadikan sebagai oleh-oleh untuk teman maupu'),
(10, 5, 'Batik Hitam Gold', 'S|M|L', 'batik', 250000, 'Batik Kusuma Jaya', 'images/u4batikpria1.jpg', 'Selain makanan, kota Yogyakarta juga terkenal dengan batiknya yang mempunyai berbagai motif dan warna. Selain biasa digunakan sebagai pakaian untuk berbagai acara baik resmi maupun santai, baju batik juga bisa dijadikan sebagai oleh-oleh untuk teman maupu'),
(11, 5, 'Flamingo Bag', 'Flamingo|Nanas|Kaktus|Cherry', 'rotan', 120000, 'Tas Kayu Jaya Arum', 'images/u4bag.jpg', 'Oleh-oleh gak harus selalu makanan, bisa juga tas yang terbuat dari kayu seperti ini. Dengan beberapa pilihan motif tas yang membuatnya lebih menarik, bahan yang digunakan juga sangat pas dan tidak berat sehingga sangat nyaman digunakan. Buat kalian yang '),
(12, 4, 'Blangkon', 'S|M|L', 'batik', 95000, 'Toko Khas Jogja', 'images/u4blangkon3.jpg', 'Salah satu yang khas dari kota Yogyakarta selain makanannya yaitu bakpia dan gudeg, ada juga blangkon yang biasa dijadikan sebagai barang oleh-oleh untuk teman maupun sanak saudara. Blangkon merupakan tutup kepala yang dibuat dari kain batik dan digunakan'),
(13, 4, 'Blangkon Tali ', 'S|M|L', 'batik', 95000, 'Toko Khas Jogja', 'images/u4blangkon4.jpg', 'Salah satu yang khas dari kota Yogyakarta selain makanannya yaitu bakpia dan gudeg, ada juga blangkon yang biasa dijadikan sebagai barang oleh-oleh untuk teman maupun sanak saudara. Blangkon merupakan tutup kepala yang dibuat dari kain batik dan digunakan'),
(14, 4, 'Tas Rotan Bundar', 'Coklat|Putih|Bunga', 'rotan', 100000, 'Tas Rotan Jogja', 'images/u4tasrotan.jpeg', 'Oleh-oleh gak harus selalu makanan, bisa juga tas yang terbuat dari rotan seperti ini. Dengan beberapa pilihan motif tas yang membuatnya lebih menarik, bahan yang digunakan juga sangat pas dan tidak berat sehingga sangat nyaman digunakan. Buat kalian yang'),
(15, 4, 'Mainan Kayu', 'Motor|Mobil|Truk', 'mainan', 165000, 'Home Made Jogja', 'images/u4toy.jpg', 'Salah satu yang khas dari kota Yogyakarta selain makanannya yaitu bakpia dan gudeg, ada juga mainan home made terbuat dari kayu yang biasa dijadikan sebagai barang oleh-oleh untuk teman maupun sanak saudara. Mainan ini mempunyai banyak bentuk dan ukuran y'),
(16, 4, 'Mainan Huruf', 'A-E|F-J|K-O|P-Z', 'mainan', 50000, 'Home Made Jogja', 'images/u4main7.jpeg', 'Salah satu yang khas dari kota Yogyakarta selain makanannya yaitu bakpia dan gudeg, ada juga mainan home made terbuat dari kayu yang biasa dijadikan sebagai barang oleh-oleh untuk teman maupun sanak saudara. Mainan ini mempunyai banyak bentuk dan ukuran y'),
(17, 4, 'Donat Susun', 'Biru|Putih|Orange', 'mainan', 110000, 'Toko Mainan Anak', 'images/u4main6.jpeg', 'Oleh-oleh bisa juga mainan anak dari kayu seperti ini. Dengan beberapa pilihan model mainan yang lucu-lucu, bahan yang digunakan juga sangat premium sehingga aman digunakan anak untuk bermain. Buat kalian yang ingin membeli oleh-oleh selain makanan bisa b'),
(18, 4, 'Puzzle Hewan', 'Tupai|Gajah|Jerapah', 'mainan', 135000, 'Toko Mainan Anak', 'images/u4main5.jpeg', 'Oleh-oleh bisa juga mainan berbentuk puzzle anak dari kayu seperti ini. Dengan beberapa pilihan bentuk hewan yang membuatnya lebih menarik, bahan yang digunakan juga sangat premium sehingga aman digunakan anak untuk bermain.'),
(19, 4, 'Rainbow Puzzle', 'Coklat|Pink|Putih', 'mainan', 85000, 'Toko Mainan Anak', 'images/u4main4.jpeg', 'Oleh-oleh bisa juga mainan anak dari kayu seperti ini. Dengan beberapa pilihan model mainan yang lucu-lucu, bahan yang digunakan juga sangat premium sehingga aman digunakan anak untuk bermain. Buat kalian yang ingin membeli oleh-oleh selain makanan bisa b'),
(20, 4, 'Dino Toy', 'Dinosaurus|Kelinci|Gajah', 'batik', 210000, 'Toko Mainan Anak', 'images/u4main3.jpeg', 'Oleh-oleh gak harus selalu makanan, bisa juga mainan anak dari kayu seperti ini. Dengan beberapa pilihan model mainan yang membuatnya lebih menarik, bahan yang digunakan juga sangat premium sehingga aman digunakan anak untuk bermain. Buat kalian yang ingi'),
(21, 4, 'Car Toy', 'Coklat|Hitam|Putih', 'mainan', 120000, 'Home Made Jogja', 'images/u4main2.jpeg', 'Oleh-oleh gak harus selalu makanan, bisa juga mainan anak dari kayu seperti ini yang tentunya aman untuk anak-anak serta dapat membantu pengetahuan anak. Dapat dengan mudah didai dengan pesan di Sagu Hati.'),
(22, 4, 'Meja Rotan', 'Square|Bundar|Oval', 'rotan', 500000, 'Tas Rotan Jogja', 'images/u4meja.jpeg', 'Hiasan rumah juga merupakan salah satu pilihan unik untuk dijadikan oleh-oleh bagi teman atau sanak saudara. Harga yang terbilang terjangkau dengan kualitas produk yang bagus menjadi pilihan yang terbaik untuk oleh-oleh.'),
(23, 4, 'Keranjang Bayi', 'Ayunan|Oval Tinggi|Oval Pendek', 'rotan', 365000, 'Baby Fashion Store', 'images/u4keranjangbayi4.jpg', 'Oleh-oleh gak harus selalu makanan, bisa juga keranjang bayi dari rotan. Dengan beberapa pilihan model yang membuatnya lebih menarik, bahan yang digunakan juga dari bahan yang terbaik sehingga sangat nyaman dan kuat saat digunakan. Buat kalian yang ingin '),
(24, 4, 'Kursi Rotan', 'Bunga|Oval|Sofa', 'batik', 600000, 'Home Made Jogja', 'images/u4kursi.jpeg', 'Oleh-oleh gak harus selalu makanan, bisa juga kursi santai dari rotan yang lagi ngetren banget ini. Dengan beberapa pilihan model yang membuatnya lebih menarik, bahan yang digunakan juga dari bahan yang terbaik sehingga sangat nyaman dan kuat saat digunak'),
(25, 4, 'Tas Sandang', 'Coklat|Ivory|Putih', 'rotan', 50000, 'Toko Oleh-Oleh', 'images/u4tas.jpeg', 'Tas juga merupakan salah satu pilihan untuk dijadikan oleh-oleh bagi teman atau sanak saudara, maka terciptalah tas sandang kecil yang mudah dipadu-padankan dengan outfit apapun seperti ini. Harga yang terbilang terjangkau dengan kualitas produk yang bagu'),
(26, 4, 'Hiasan Lampu', 'Kubah|Panjang|Oval', 'rotan', 300000, 'Home Made Jogja', 'images/u4kerangka.jpeg', 'Oleh-oleh gak harus selalu makanan, bisa juga hiasan lampu yang lagi ngetren banget ini. Dengan beberapa pilihan model yang membuatnya lebih menarik, bahan yang digunakan juga dari bahan yang terbaik sehingga kuat saat digunakan. Buat kalian yang ingin me'),
(27, 4, 'Tas Tangan', 'Maroon|Coklat|Putih', 'rajut', 90000, 'Toko Khas Rajut', 'images/u4rajut.jpg', 'Tas juga merupakan salah satu pilihan untuk dijadikan oleh-oleh bagi teman atau sanak saudara, maka terciptalah tas tangan rajut seperti ini. Harga yang terbilang terjangkau dengan kualitas produk yang bagus menjadi pilihan yang terbaik.'),
(28, 4, 'Kaos Kaki', 'Coklat|Ivory|Kuning|Merah', 'rajut', 40000, 'Toko Khas Rajut', 'images/u4kaoskaki3.jpeg', 'Oleh-oleh gak harus selalu makanan, bisa juga kaos kaki rajut yang lagi hits banget ini. Dengan beberapa pilihan warna yang membuatnya lebih menarik, bahan yang digunakan juga dari bahan yang terbaik sehingga sangat nyaman digunakan. Buat kalian yang ingi'),
(29, 4, 'Cardigan Rajut', 'Ungu|Hijau|Kuning', 'rajut', 150000, 'Toko Khas Rajut', 'images/u4rajut2.jpeg', 'Oleh-oleh gak harus selalu makanan, bisa juga cardigan rajut yang lagi ngetren banget ini. Dengan beberapa pilihan warna yang membuatnya lebih menarik, bahan yang digunakan juga dari bahan yang terbaik sehingga sangat nyaman digunakan. Buat kalian yang in'),
(30, 4, 'Topi Bayi', 'Kupluk|Beruang|Prajurit', 'rajut', 45000, 'Baby Fashion Store', 'images/u4topibayi2.jpg', 'Oleh-oleh gak harus selalu makanan, bisa juga topi bayi rajut yang lagi ngetren banget ini. Dengan beberapa pilihan warna dan model yang membuatnya lebih menarik, bahan yang digunakan juga dari bahan yang terbaik sehingga sangat nyaman digunakan. Buat kal'),
(31, 4, 'Outer Batik', 'Coklat|Biru|Putih', 'batik', 250000, 'Batik Kusuma Jaya', 'images/u4outerbatik4.jpg', 'Kota Yogyakarta terkenal dengan produksi kebaya dan batiknya, salah satunya seperti pada gambar yaitu outer batik modern yang pas digunakan untuk acara resmi maupun sekedar hang out bersama teman. Dengan harga yang terjangkau dan pilihan motif yang beraga'),
(32, 4, 'Gaun Batik', 'Pink|Coklat|Putih', 'batik', 140000, 'Batik Kusuma Jaya', 'images/u4dress.jpeg', 'Kota Yogyakarta terkenal dengan produksi kebaya dan batiknya baik ukuran dewasa maupun anak-anak, salah satunya seperti pada gambar yaitu gaun anak batik yang pas digunakan untuk pergi ke acara penting bersama orang tua. Dengan harga yang terjangkau dan p');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `kode_transaksi` int(8) NOT NULL,
  `id_produk` int(6) NOT NULL,
  `metode` enum('Gopay','Tunai') NOT NULL,
  `jumlah_produk` int(4) NOT NULL,
  `total_harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_transaksi`
--

INSERT INTO `data_transaksi` (`id`, `id_pembeli`, `kode_transaksi`, `id_produk`, `metode`, `jumlah_produk`, `total_harga`) VALUES
(1, 1, 51206484, 3, 'Tunai', 1, 10000),
(2, 1, 51206484, 6, 'Tunai', 1, 20000),
(3, 1, 51206484, 6, 'Tunai', 1, 20000),
(4, 1, 51206484, 4, 'Tunai', 3, 60000),
(5, 1, 47226542, 5, 'Tunai', 1, 35000),
(6, 1, 30625995, 4, 'Gopay', 3, 60000),
(7, 1, 11418423, 7, 'Gopay', 2, 70000),
(8, 1, 80700026, 3, 'Tunai', 3, 30000),
(9, 1, 2532421, 2, 'Tunai', 1, 45000),
(10, 1, 2532421, 2, 'Tunai', 1, 45000),
(11, 1, 31909431, 3, 'Tunai', 2, 20000),
(12, 1, 31909431, 3, 'Tunai', 2, 20000),
(13, 1, 27826160, 5, 'Tunai', 1, 35000),
(14, 1, 36303413, 2, 'Tunai', 2, 90000),
(15, 1, 36303413, 2, 'Tunai', 3, 135000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(10) NOT NULL,
  `nama_belakang` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status` enum('penjual','pembeli') NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id`, `nama_depan`, `nama_belakang`, `password`, `tanggal_lahir`, `status`, `jenis_kelamin`, `email`, `nomor_telepon`, `alamat`, `kode_pos`) VALUES
(1, 'thiya', 'yaya', '12345', '2001-01-03', 'pembeli', 'Wanita', 'thiyayaya@gmail.com', '081279126666', 'sisingamangaraja 147 pekanbaru', '28142'),
(3, 'zeranel', 'fariz', '1234567', '2000-02-15', 'pembeli', 'Pria', 'zeranelrisparis@gmail.com', '08999998888', 'balikpapan kalimantan', '1234'),
(4, 'bagas', 'gilang', '9999', '2020-12-26', 'penjual', 'Pria', 'gilang@gmail.com', '089979997888', 'nanas 4', '9876'),
(5, 'Zere', 'Nale', 'asdf123', '2020-12-30', 'penjual', 'Pria', 'zeranel@gmail.com', '08', 'Jl Kaliurnag', '12345');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
