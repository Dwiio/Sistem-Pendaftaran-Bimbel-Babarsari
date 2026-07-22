# 📚 Sistem Pendaftaran Bimbel Babarsari

[![PHP](https://img.shields.io/badge/PHP-8.2.4-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-MariaDB-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.0-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)
[![Status](https://img.shields.io/badge/Status-Completed-success?style=for-the-badge)](#)

> Aplikasi web berbasis **PHP Native** dan **MySQL** untuk mengelola pendaftaran peserta bimbingan belajar secara interaktif dengan fitur kalkulasi biaya otomatis dan manajemen data pendaftar (CRUD).

---

## 📋 Table of Contents

- [Overview](#-overview)
- [Key Features](#-key-features)
- [Tech Stack](#-tech-stack)
- [Project Structure](#-project-structure)
- [Database Schema](#-database-schema)
- [Getting Started](#-getting-started)
  - [Prerequisites](#prerequisites)
  - [Database Setup](#database-setup)
  - [Installation & Running](#installation--running)
- [Screenshots / Demo](#-screenshots--demo)
- [Roadmap](#-roadmap)
- [Contributing](#-contributing)
- [Author & License](#-author--license)

---

## 📖 Overview

Proyek ini dikembangkan sebagai bagian dari **Tugas 3 Mata Kuliah Pemrograman Web**. Aplikasi ini dirancang untuk menangani alur pendaftaran siswa baru pada **Bimbel Babarsari**. 

Sistem ini tidak hanya berfungsi sebagai penyimpanan data, tetapi juga secara otomatis melakukan **kalkulasi finansial** berbasis pilihan user (harga paket bimbingan, opsi fasilitas tambahan, biaya administrasi lokasi cabang, metode pembayaran, serta akumulasi pajak PPN 10%). Seluruh data dikelola secara dinamis memanfaatkan integrasi PHP dan database MySQL.

---

## ✨ Key Features

- **Form Pendaftaran Dinamis (`tambah.php`)** — Input data siswa lengkap dengan pemilihan paket, lokasi, fasilitas, dan opsi pembayaran.
- **Kalkulasi Biaya Otomatis** — Perhitungan total bayar berdasarkan logika backend (Paket + Fasilitas + Lokasi + Biaya Admin + Pajak 10%).
- **Dashboard Pendaftar (`index.php`)** — Menampilkan tabel seluruh data pendaftar dengan desain rapi berbasis **Bootstrap 5** & **Bootstrap Icons**.
- **Detail Informasi (`detail.php`)** — Melihat rincian lengkap data siswa pendaftar beserta rincian pembayarannya.
- **Update Data (`update.php`)** — Fitur untuk mengubah data pendaftar dan total tagihan secara fleksibel.
- **Hapus Data (`delete.php`)** — Menghapus rekaman data pendaftar yang dibatalkan atau salah input.

---

## 🧰 Tech Stack

| Category | Technology / Library |
| :--- | :--- |
| **Language** | PHP 8.2.4 |
| **Database** | MySQL / MariaDB (`bimbel_db`) |
| **Frontend Framework** | Bootstrap 5.3.0 & Bootstrap Icons |
| **Styling** | Custom CSS (`style.css`) |
| **Web Server** | Apache (via XAMPP / Laragon) |

---

## 📁 Project Structure

```text
Tugas3_Pemweb/
├── database/
│   └── bimbel_db.sql     # File dump/export database MySQL
├── koneksi.php           # File konfigurasi koneksi database MySQL
├── index.php             # Halaman utama (Tabel daftar pendaftar - Bootstrap UI)
├── tambah.php            # Form pendaftaran + Logika kalkulasi biaya
├── detail.php            # Halaman detail informasi pendaftar
├── update.php            # Form dan handler edit data pendaftar
├── delete.php            # Handler aksi hapus data pendaftar
├── style.css             # Stylesheet khusus untuk tampilan form & detail
└── README.md             # Dokumentasi proyek


