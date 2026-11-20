-- ============================================================================
--  KostKita — skema + data demo untuk database `koskita3`
--
--  Repo aslinya tidak menyertakan dump database, jadi skema ini direkonstruksi
--  dari seluruh query di kode PHP (admin/*, kost/*, catalog/*, login/*, dst).
--
--  PENTING: urutan kolom tabel `kost` TIDAK BOLEH diubah — admin/insert_kost.php
--  memakai `INSERT INTO kost VALUES('', pemilik, namakost, harga, gambar, ...)`
--  (tanpa daftar kolom), jadi harus cocok posisi per posisi.
--
--  Import manual:  mysql -u root -p < db/koskita3.sql
-- ============================================================================

CREATE DATABASE IF NOT EXISTS `koskita3` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `koskita3`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `pemesan`;
DROP TABLE IF EXISTS `kost`;
DROP TABLE IF EXISTS `userkost`;
DROP TABLE IF EXISTS `jeniskost`;
DROP TABLE IF EXISTS `jeniskelamin`;

-- Lookup: jenis kelamin user (dipakai di form registrasi)
CREATE TABLE `jeniskelamin` (
  `id_jk`  INT NOT NULL AUTO_INCREMENT,
  `ket_jk` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_jk`)
) ENGINE=InnoDB;

-- Lookup: jenis kost (dipakai di form tambah kost). 1 = putra, 2 = putri
-- (dashboard admin menghitung jenis_kost='1' sebagai "Kost Pria", '2' sebagai "Kost Wanita")
CREATE TABLE `jeniskost` (
  `id_jenis`  INT NOT NULL AUTO_INCREMENT,
  `ket_jenis` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB;

-- User / pemilik kost. Password disimpan PLAINTEXT (sesuai kode asli: cek_login.php)
CREATE TABLE `userkost` (
  `id_user`       INT NOT NULL AUTO_INCREMENT,
  `nama`          VARCHAR(100) NOT NULL,
  `id_jk`         INT NOT NULL,
  `telp`          VARCHAR(20)  NOT NULL,
  `email`         VARCHAR(100) NOT NULL,
  `username`      VARCHAR(50)  NOT NULL,
  `password_user` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `uq_username` (`username`)
) ENGINE=InnoDB;

-- Data kost. `pemilik` berisi USERNAME dari userkost (bukan id).
-- `harga` sengaja VARCHAR: form tambah kost menyimpan string (lihat catatan di README).
CREATE TABLE `kost` (
  `id_kost`    INT NOT NULL AUTO_INCREMENT,
  `pemilik`    VARCHAR(50)  NOT NULL,
  `namakost`   VARCHAR(100) NOT NULL,
  `harga`      VARCHAR(30)  NOT NULL,
  `gambar`     VARCHAR(255) NOT NULL,
  `jenis_kost` VARCHAR(2)   NOT NULL,
  `alamat`     TEXT NOT NULL,
  `detail`     TEXT NOT NULL,
  `kulkas`     VARCHAR(100) NOT NULL DEFAULT '',
  `tv`         VARCHAR(100) NOT NULL DEFAULT '',
  `almari`     VARCHAR(100) NOT NULL DEFAULT '',
  `kasur`      VARCHAR(100) NOT NULL DEFAULT '',
  `kamarmandi` VARCHAR(100) NOT NULL DEFAULT '',
  `parkir`     VARCHAR(100) NOT NULL DEFAULT '',
  `cctv`       VARCHAR(100) NOT NULL DEFAULT '',
  `wifi`       VARCHAR(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_kost`),
  KEY `idx_pemilik` (`pemilik`)
) ENGINE=InnoDB;

-- Pesanan / calon penghuni yang mengisi form di halaman detail kost
CREATE TABLE `pemesan` (
  `id_pemesan`   INT NOT NULL AUTO_INCREMENT,
  `id_kost`      INT NOT NULL,
  `nama_pemesan` VARCHAR(100) NOT NULL,
  `alamat`       TEXT NOT NULL,
  `telephon`     VARCHAR(30) NOT NULL,
  `catatan`      TEXT NOT NULL,
  PRIMARY KEY (`id_pemesan`),
  KEY `idx_kost` (`id_kost`)
) ENGINE=InnoDB;

-- ----------------------------------------------------------------------------
--  DATA AWAL
-- ----------------------------------------------------------------------------
INSERT INTO `jeniskelamin` (`id_jk`, `ket_jk`) VALUES (1, 'Laki-laki'), (2, 'Perempuan');
INSERT INTO `jeniskost`    (`id_jenis`, `ket_jenis`) VALUES (1, 'Kost Putra'), (2, 'Kost Putri');

-- AKUN DEMO (ganti / hapus sebelum dipakai publik!)
--   admin / admin123   -> dashboard admin (username harus persis 'admin')
--   budi  / budi123    -> pemilik kost putra
--   sari  / sari123    -> pemilik kost putri
INSERT INTO `userkost` (`id_user`, `nama`, `id_jk`, `telp`, `email`, `username`, `password_user`) VALUES
  (1, 'Administrator',  1, '081200000001', 'admin@kostkita.local', 'admin', 'admin123'),
  (2, 'Budi Santoso',   1, '081200000002', 'budi@kostkita.local',  'budi',  'budi123'),
  (3, 'Sari Wulandari', 2, '081200000003', 'sari@kostkita.local',  'sari',  'sari123');

-- Data kost demo — memakai foto yang sudah ada di assets/img/
INSERT INTO `kost` VALUES
  (1, 'budi', 'Kost Putra Bu Yono',      '250000', 'Kost1.jpg',  '1', 'Jl. Kampus Raya No. 12',   'Kamar luas, dekat kampus dan warung makan. Listrik token terpisah.',           'Ada',   'Tidak', 'Ada',   'Spring bed', 'Dalam',  'Motor',        'Ada',   'Ada'),
  (2, 'budi', 'Kost Putra Arfa',         '300000', 'Kost2.jpg',  '1', 'Jl. Melati No. 5',         'Kost nyaman dan tenang, cocok untuk mahasiswa semester akhir.',                 'Tidak', 'Ada',   'Ada',   'Kasur biasa','Luar',   'Motor & mobil','Ada',   'Ada'),
  (3, 'budi', 'Kost Putra Pak Kacong',   '200000', 'Kost3.jpg',  '1', 'Jl. Mawar No. 21',         'Harga ekonomis, jarak 5 menit jalan kaki ke kampus.',                           'Tidak', 'Tidak', 'Ada',   'Kasur biasa','Luar',   'Motor',        'Tidak', 'Tidak'),
  (4, 'budi', 'Kost Putra Novi',         '350000', 'Kost4.jpg',  '1', 'Jl. Anggrek No. 8',        'Kamar full furnished, kamar mandi dalam, ada dapur bersama.',                   'Ada',   'Ada',   'Ada',   'Spring bed', 'Dalam',  'Motor & mobil','Ada',   'Ada'),
  (5, 'budi', 'Kost Putra Al Fatih',     '275000', 'Kost5.jpg',  '1', 'Jl. Pondok Indah No. 3',   'Lingkungan islami, ada musholla dan jam malam.',                                'Tidak', 'Tidak', 'Ada',   'Kasur biasa','Luar',   'Motor',        'Ada',   'Ada'),
  (6, 'sari', 'Kost Putri Rainbow',      '320000', 'Kost6.png',  '2', 'Jl. Kenanga No. 17',       'Kost putri aman, ada penjaga dan CCTV 24 jam.',                                 'Ada',   'Ada',   'Ada',   'Spring bed', 'Dalam',  'Motor',        'Ada',   'Ada'),
  (7, 'sari', 'Kost Putri Pondok AIN 3', '280000', 'Kost7.jpeg', '2', 'Jl. Dahlia No. 9',         'Dekat minimarket dan halte angkot, lingkungan bersih.',                         'Tidak', 'Tidak', 'Ada',   'Kasur biasa','Luar',   'Motor',        'Ada',   'Ada'),
  (8, 'sari', 'Kost Putri Melati',       '400000', 'Kost8.jpg',  '2', 'Jl. Teratai No. 2',        'Kost eksklusif, AC, kamar mandi dalam, free laundry mingguan.',                 'Ada',   'Ada',   'Ada',   'Spring bed', 'Dalam',  'Motor & mobil','Ada',   'Ada'),
  (9, 'sari', 'Kost Putri Bu Ani',       '225000', 'Kost9.jpg',  '2', 'Jl. Flamboyan No. 14',     'Kost sederhana untuk putri, suasana kekeluargaan.',                             'Tidak', 'Tidak', 'Ada',   'Kasur biasa','Luar',   'Motor',        'Tidak', 'Tidak');

INSERT INTO `pemesan` (`id_pemesan`, `id_kost`, `nama_pemesan`, `alamat`, `telephon`, `catatan`) VALUES
  (1, 1, 'Andi Pratama', 'Jl. Merdeka No. 10', '081355500001', 'Mau survei hari Sabtu pagi.'),
  (2, 6, 'Dewi Lestari', 'Jl. Sudirman No. 4',  '081355500002', 'Masuk bulan depan, apakah masih ada kamar kosong?');

-- Sinkronkan AUTO_INCREMENT agar data berikutnya mulai setelah data demo
ALTER TABLE `jeniskelamin` AUTO_INCREMENT = 3;
ALTER TABLE `jeniskost`    AUTO_INCREMENT = 3;
ALTER TABLE `userkost`     AUTO_INCREMENT = 4;
ALTER TABLE `kost`         AUTO_INCREMENT = 10;
ALTER TABLE `pemesan`      AUTO_INCREMENT = 3;
