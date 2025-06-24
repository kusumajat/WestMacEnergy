# 🌍 WestMacEnergy: *West Macedonia Lignite Centre*

![Built with Laravel](https://img.shields.io/badge/Built%20with-Laravel-red?style=flat-square&logo=laravel)
![PostgreSQL](https://img.shields.io/badge/Database-PostgreSQL-blue?style=flat-square&logo=postgresql)
![PostGIS](https://img.shields.io/badge/Spatial%20Data-PostGIS-green?style=flat-square)
![Status](https://img.shields.io/badge/Status-In%20Development-yellow?style=flat-square)
![License](https://img.shields.io/badge/License-MIT-lightgrey?style=flat-square)

Selamat datang di repositori **WestMacEnergy**!  
Aplikasi web ini merupakan platform eksploratif dan visual interaktif yang didedikasikan untuk dokumentasi operasi tambang lignite di West Macedonia serta transisinya menuju energi terbarukan dan pemanfaatan lahan pasca-tambang.

---

## 📚 Daftar Isi
1. [📝 Deskripsi Proyek](#📝-deskripsi-proyek)
2. [🚀 Fitur Utama](#🚀-fitur-utama)
3. [🛠️ Teknologi yang Digunakan](#🛠️-teknologi-yang-digunakan)
4. [⚙️ Instalasi dan Penggunaan](#⚙️-instalasi-dan-penggunaan)
5. [📬 Kontak](#📬-kontak)

---

## 📝 Deskripsi Proyek

**WestMacEnergy** bertujuan mendokumentasikan dan memvisualisasikan data spasial serta non-spasial seputar tambang lignite West Macedonia—salah satu penghasil lignite terbesar di Eropa yang dikembangkan oleh PPC S.A. Proyek ini juga menyoroti upaya transisi energi dan restorasi lingkungan sebagai bagian dari *Just Transition*.

Platform ini menampilkan:
- Informasi dan operasional tambang.
- Visualisasi 3D transformasi wilayah Ptolemais.
- Peta interaktif area penambangan dan rencana pasca-tambang.
- Tabel data eksploratif dengan fungsi pencarian.

---

## 🚀 Fitur Utama

### 🌐 Beranda Interaktif
- **Who We Are** – Penjelasan sejarah dan kontribusi pusat lignite terhadap energi nasional.
- **A Legacy of National Significance** – Galeri foto operasi tambang dan pembangkit.
- **A 3D Journey Through the Ptolemais** – Visualisasi 3D interaktif menunjukkan perubahan penggunaan lahan, restorasi, dan integrasi energi terbarukan.
- Statistik penting: jumlah sumber energi, karyawan, kontribusi sosial, dan omzet.

### 🗺️ Peta Interaktif (*MAP*)
- Layer kontrol: aktif/nonaktifkan *Points*, *Polylines*, dan *Polygons*.
- Legenda: mempermudah identifikasi fitur pada peta.
- Tombol **"See Post Mining Model"**: menampilkan pemanfaatan lahan pasca-tambang.

### 📊 Data Explorer (*TABLE*)
- Tabel data spasial: *Points, Polylines*, dan *Polygons*.
- Kolom: `NO`, `NAME`, `DESCRIPTION`, `IMAGE`, `CREATED AT`, `UPDATED AT`.
- Fitur pencarian berdasarkan nama atau deskripsi.

---

## 🛠️ Teknologi yang Digunakan

### Backend
- **PHP** – Bahasa utama pengembangan server.
- **Laravel** – Framework backend modern untuk manajemen rute, ORM, validasi, dll.

### Database
- **PostgreSQL** – Sistem basis data relasional yang andal.
- **PostGIS** – Ekstensi PostgreSQL untuk pemrosesan data geospasial.

### Frontend
- **HTML5 & CSS3** – Struktur dan desain antarmuka.
- **Bootstrap 5.3.3** – Framework CSS responsif dan modern.
- **Font Awesome 6.7.2** – Library ikon visual yang kaya.
- **Google Fonts (Inter)** – Tipografi profesional.
- **JavaScript** – Interaktivitas dan manipulasi elemen:
  - **jQuery**
  - **Bootstrap Bundle JS**
  - **Babylon.js Viewer** – Untuk rendering model 3D (dari file `babylon-viewer.esm.min.js`).

### Geospasial
- Data disimpan dalam PostgreSQL + PostGIS.
- Diambil via backend dan divisualisasikan melalui frontend.

---

## ⚙️ Instalasi dan Penggunaan

Ikuti langkah-langkah berikut untuk menjalankan proyek ini secara lokal:

1. **Persiapan**
Pastikan sudah terpasang:
- PHP (disarankan versi 8.x)
- Composer
- PostgreSQL + PostGIS
- Git

2.  **Kloning repositori:**
    ```bash
    git clone [https://github.com/kusumajat/WestMacEnergy.git](https://github.com/kusumajat/WestMacEnergy.git)
    cd WestMacEnergy
    ```

3.  **Instal dependensi Composer:**
    ```bash
    composer install
    ```

4.  **Konfigurasi Environment:**
    * Buat file `.env` dengan menyalin `.env.example`:
        ```bash
        cp .env.example .env
        ```
    * Edit file `.env` dan konfigurasikan detail database.
      ```bash
        DB_CONNECTION=pgsql
        DB_HOST=127.0.0.1
        DB_PORT=5432
        DB_DATABASE=nama_database
        DB_USERNAME=username_db
        DB_PASSWORD=password_db
        ```

5.  **Migrasi Database dan Seed Data:**
    ```bash
    php artisan migrate
    ```

6.  **Jalankan aplikasi:**
    * Buka terminal atau PowerShell di direktori proyek (`WestMacEnergy`).
    * Mulai server pengembangan Laravel:
        ```bash
        php artisan serve
        ```

7.  **Akses aplikasi:**
    Buka browser web Anda dan navigasikan ke `http://127.0.0.1:8000`

---

## 📬 **Kontak**

Untuk pertanyaan atau umpan balik, silakan hubungi:

* **Risma Kusumajadi**
* **Email**: [risma.kusumajadi@example.com](mailto:risma.kusumajadi@example.com) (Ganti dengan alamat email atau tautan profil LinkedIn/GitHub Anda)

---

Copyright © 2025 by Risma Kusumajadi.
