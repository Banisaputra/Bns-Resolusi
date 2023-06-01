
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `auto2000`
--

-- --------------------------------------------------------
CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `kode_mesin` varchar(8) NOT NULL,
  `jenis_mobil` varchar(30) DEFAULT NULL,
  `warna_mobil` varchar(30) DEFAULT NULL,
  `tipe_mobil` varchar(30) DEFAULT NULL
);

ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

INSERT INTO `mobil`(`kode_mesin`,`jenis_mobil`,`warna_mobil`,`tipe_mobil`)
VALUES ('AZ001','SUV','Putih','Rush'),
       ('AZ002','MPV','Hitam','Avanza'),
       ('AZ003','Citycar','Silver','Agya'),
       ('AZ001','SUV','Hitam','Fortuner'),
       ('AZ002','MPV','Hitam','Calya'),
       ('AZ003','Citycar','Putih','Etios'),
       ('AZ001','SUV','Hitam','Hilux'),
       ('AZ002','MPV','Silver','Alparth'),
       ('AZ004','Sedan','Hitam','Camry'),
       ('AZ004','Sedan','Hitam','Vios'),
       ('AZ002','MPV','Hitam','Voxy'),
       ('AZ003','Citycar','Kuning','Agya');

-- --------------------------------------------------------
CREATE TABLE `jenis_layanan` (
  `id_layanan` int(11) NOT NULL,
  `kode_layanan` varchar(10) NOT NULL,
  `jenis_layanan` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
);

ALTER TABLE `jenis_layanan`
  ADD PRIMARY KEY (`id_layanan`);

ALTER TABLE `jenis_layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

INSERT INTO `jenis_layanan`(`kode_layanan`, `jenis_layanan`, `harga`)
VALUES ('SR001','Service Rutin',450000),
       ('SR002','Balancing',150000),
       ('SR003','Spooring',250000),
       ('SR004','General Check Up',300000),
       ('SR005','Repair Service',100000);

-- --------------------------------------------------------
CREATE TABLE `sparepart` (
  `id_sparepart` int(11) NOT NULL,
  `kode_sparepart` varchar(10) NOT NULL,
  `jenis_sparpart` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
);

ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id_sparepart`);

ALTER TABLE `sparepart`
  MODIFY `id_sparepart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

INSERT INTO `sparepart`(`kode_sparepart`, `jenis_sparpart`, `harga`)
VALUES ('SP001','Injector Cleaner', 45000),
       ('SP002','Van Belt', 150000),
       ('SP003','Spark Plug', 50000),
       ('SP004','Bulm Lamp', 25000),
       ('SP005','Engine Oil', 203000),
       ('SP006','Accu', 1500000),
       ('SP007','Brake Canvass', 150000),
       ('SP008','AC Filter', 95000),
       ('SP009','Air Filter', 85000),
       ('SP010','Spring Suspension', 50000);
-- --------------------------------------------------------
CREATE TABLE `service_record` (
  `nomor_urut` int(11) NOT NULL,
  `tanggal_service` date DEFAULT NULL,
  `kode_mesin` varchar(8) DEFAULT NULL,
  `kode_layanan` varchar(10) DEFAULT NULL,
  `kode_sparepart` varchar(60) DEFAULT NULL,
  `harga_service` int(11) DEFAULT NULL
);

ALTER TABLE `service_record`
  ADD PRIMARY KEY (`nomor_urut`);

ALTER TABLE `service_record`
  MODIFY `nomor_urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

INSERT INTO `service_record`(`tanggal_service`, `kode_mesin`, `kode_layanan`, `kode_sparepart`,`harga_service`)
VALUES ('2020-02-15','AZ001','SR001','SP005',450000),
       ('2020-04-17','AZ001','SR002',NULL,150000),
       ('2020-06-13','AZ001','SR003','SP007',250000),
       ('2020-06-17','AZ002','SR001','SP001',450000),
       ('2020-10-18','AZ002','SR004','SP004',300000),
       ('2020-04-17','AZ001','SR002',NULL,150000),
       ('2020-06-13','AZ001','SR003','SP010',250000),
       ('2020-06-17','AZ002','SR001','SP001',450000),
       ('2020-04-17','AZ001','SR002',NULL,150000),
       ('2020-06-13','AZ001','SR005','SP002',250000),
       ('2020-06-17','AZ002','SR005','SP008,SP002',450000);

-- --------------------------------------------------------
CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `nama_pemilik` varchar(30) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `kode_mesin` varchar(8) DEFAULT NULL
);

ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

INSERT INTO `pemilik`(`nama_pemilik`, `alamat`, `kode_mesin`)
VALUES ('Haryono','Klaten','AZ001'),
       ('Anton','Surabaya','AZ002'),
       ('Subroto','Surakarta','AZ003'),
       ('Joko','Karanganyar','AZ004'),
       ('Doni','Jepara','AZ003'),
       ('Putri','Pacitan','AZ002'),
       ('Elvira','Sukoharjo','AZ002'),
       ('Verawati','Karanganyar','AZ004'),
       ('Kartini','Sukoharjo','AZ003'),
       ('Zahra','Madiun','AZ002'),
       ('Risa','Sidoharjo','AZ004'),
       ('Riyan','Mojokerto','AZ001'),
       ('Johan','Ngawi','AZ002'),
       ('Martin','Kediri','AZ001');

-- --------------------------------------------------

-- -- menampilkan semua isi data dari table mobil
-- SELECT * FROM mobil;
-- -- menampilkan semua isi data dari table pemilik
-- SELECT * FROM pemilik;
-- -- menampilkan jumlah total dari harga service
-- SELECT SUM(harga_service) AS "Total Service" FROM service_record;
-- -- menampilkan nama pemilik yang beralamat sukoharjo
-- select nama_pemilik from pemilik where alamat="Sukoharjo";
-- -- tampilkan tanggal service dan harga service yang memiliki jumlah kurang dari 500000  
-- SELECT tanggal_service,harga_service FROM service_record WHERE harga_service < 500000 AND kode_mesin="AZ002";
-- -- menampilkan nama pemilik, kode layanan, harga service dari service record dan pemilik pada kode mesin yang sama
-- -- dimana tanggal service 2020-06-17 kemudian urutkan berdasarkan nama pemiliki
-- SELECT pemilik.nama_pemilik, service_record.kode_layanan, service_record.harga_service FROM
-- (service_record INNER JOIN pemilik ON pemilik.kode_mesin = service_record.kode_mesin) WHERE
-- tanggal_service LIKE "%2020-06-17%" ORDER BY nama_pemilik;






