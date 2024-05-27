-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 26 May 2024, 15:21:06
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `stok`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fatura`
--

CREATE TABLE `fatura` (
  `faturaID` int(11) NOT NULL,
  `kesen_firma` int(11) NOT NULL,
  `kesilen_firma` int(11) NOT NULL,
  `tip` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `urunID` int(11) NOT NULL,
  `tarih` date NOT NULL,
  `fatura_no` int(11) NOT NULL,
  `fiyat` int(11) NOT NULL,
  `iskonto` int(11) NOT NULL,
  `adet` int(11) NOT NULL,
  `tutar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `fatura`
--

INSERT INTO `fatura` (`faturaID`, `kesen_firma`, `kesilen_firma`, `tip`, `urunID`, `tarih`, `fatura_no`, `fiyat`, `iskonto`, `adet`, `tutar`) VALUES
(54, 4, 2, 'alis', 33, '2024-05-05', 115250, 5, 0, 300, 1620),
(55, 4, 2, 'alis', 34, '2024-05-05', 1114892, 100, 0, 250, 27000),
(56, 4, 2, 'alis', 35, '2024-05-05', 525893, 40, 0, 300, 12960),
(57, 4, 2, 'alis', 36, '2024-05-05', 1235858, 15, 0, 450, 7290),
(58, 4, 2, 'alis', 37, '2024-05-05', 245135, 35, 0, 300, 11340),
(59, 2, 4, 'satis', 34, '2024-05-05', 1, 190, 0, 100, 20509),
(61, 2, 4, 'satis', 37, '2024-05-05', 2, 48, 0, 200, 10325),
(62, 2, 4, 'alis', 33, '2024-05-05', 0, 5, 0, 200, 1080),
(63, 2, 4, 'alis', 35, '2024-05-05', 0, 40, 0, 150, 6480),
(64, 4, 2, 'alis', 33, '2024-05-16', 120525, 5, 0, 100, 540),
(65, 2, 4, 'satis', 33, '2024-05-17', 3, 6, 0, 150, 932),
(67, 2, 4, 'satis', 35, '2024-05-17', 4, 58, 0, 100, 6264);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `firma_cari`
--

CREATE TABLE `firma_cari` (
  `id` int(11) NOT NULL,
  `adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `unvan` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `vergi_dairesi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `vergi_no` int(11) NOT NULL,
  `adres` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tel` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `tip` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `firma_cari`
--

INSERT INTO `firma_cari` (`id`, `adi`, `unvan`, `vergi_dairesi`, `vergi_no`, `adres`, `tel`, `tip`) VALUES
(2, 'Logo', ' Logo Teknoloji ve Yatırım A.Ş', 'Kocaeli Vergi Dairesi', 256, 'Gebze', '5385665453', 'firma'),
(4, 'ABC Ticaret Limited Şirketi', 'ABC Ticaret Limited Şirketi', 'İstanbul Vergi Dairesi', 1234567890, 'İstanbul, Örnek Mahallesi, Örnek Sokak No: 123', '5458521912', 'cari');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kasa`
--

CREATE TABLE `kasa` (
  `id` int(11) NOT NULL,
  `tarih` date NOT NULL,
  `aciklama` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `gelir` float NOT NULL,
  `gider` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kasa`
--

INSERT INTO `kasa` (`id`, `tarih`, `aciklama`, `gelir`, `gider`) VALUES
(4, '2024-05-05', '33', 0, 1620),
(5, '2024-05-05', '34', 0, 27000),
(6, '2024-05-05', '35', 0, 12960),
(7, '2024-05-05', '36', 0, 7290),
(8, '2024-05-05', '37', 0, 11340),
(12, '2024-05-05', 'Kira', 0, 5000),
(13, '2024-05-05', '34', 20509.2, 0),
(15, '2024-05-05', '37', 10324.8, 0),
(16, '2024-05-05', '33', 0, 1080),
(17, '2024-05-05', '35', 0, 6480),
(78, '2024-05-17', '33', 931.5, 0),
(113, '2024-05-17', '35', 6264, 0),
(115, '2024-05-17', 'Bayi', 15000, 0),
(116, '2024-05-17', 'Ödeme', 52080, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urunID` int(11) NOT NULL,
  `aciklama` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ozellik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `birim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `alisF` float NOT NULL,
  `satisF` float NOT NULL,
  `kdv` int(11) NOT NULL,
  `bildirim` int(11) NOT NULL,
  `ukod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urunID`, `aciklama`, `ozellik`, `resim`, `birim`, `alisF`, `satisF`, `kdv`, `bildirim`, `ukod`) VALUES
(33, 'SU', '0.5 LT PET şIşE', '399f352e6bfc4e1b4ff464b178fcf634', 'litre', 5, 5.75, 8, 200, 111110),
(34, 'TAVUK', '1KG PIRZOLA', '01cbbfe2e653d618ffb0f5743d536cb7.jpeg', 'kg', 100, 189.9, 8, 150, 222220),
(35, 'KURUYEMIş', '150 GR KOKTEYL', '0bea08471b35c5907efeb83d517697a8', 'gram', 40, 58, 8, 200, 333330),
(36, 'KEFIR', '250 ML ORMAN MEYVELI', 'a06575f3fd18c62b42aea8fa4ee5e2b7.jpeg', 'ml', 15, 20, 8, 200, 444440),
(37, 'HAVUç', 'PAKET', '57371036151c42bdc480a3d9f7280302.jpeg', 'kg', 35, 47.8, 8, 150, 555550);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`faturaID`);

--
-- Tablo için indeksler `firma_cari`
--
ALTER TABLE `firma_cari`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kasa`
--
ALTER TABLE `kasa`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urunID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `fatura`
--
ALTER TABLE `fatura`
  MODIFY `faturaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Tablo için AUTO_INCREMENT değeri `firma_cari`
--
ALTER TABLE `firma_cari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `kasa`
--
ALTER TABLE `kasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urunID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
