# WestMacEnergy: West Macedonia Lignite Centre

Selamat datang di repositori WestMacEnergy! Aplikasi web ini adalah platform yang didedikasikan untuk eksplorasi dan visualisasi data terkait operasi lignite di West Macedonia, serta transisi menuju energi terbarukan dan pemanfaatan lahan pasca-penambangan.

---

## 📚 **Daftar Isi**

1.  [📝 Deskripsi Proyek](#-deskripsi-proyek)
2.  [🚀 Fitur Utama](#-fitur-utama)
3.  [🛠️ Teknologi yang Digunakan](#-teknologi-yang-digunakan)
4.  [⚙️ Instalasi dan Penggunaan](#-instalasi-dan-penggunaan)
5.  [📬 Kontak](#-kontak)

---

## 📝 **Deskripsi Proyek**

WestMacEnergy bertujuan untuk mendokumentasikan dan memvisualisasikan data terkait penambangan lignite di West Macedonia, yang telah menjadi tulang punggung energi Yunani selama beberapa dekade. Dikembangkan oleh PPC S.A., tambang-tambang ini merupakan salah satu produsen lignite terbesar di Eropa.

Seiring dengan upaya dunia untuk merangkul energi yang lebih bersih, WestMacEnergy juga menyoroti Transisi yang Adil di wilayah ini. Platform ini menampilkan perkembangan baru, upaya restorasi lingkungan, dan integrasi infrastruktur energi terbarukan di bekas area penambangan lignite Ptolemais.

---

## 🚀 **Fitur Utama**

* **Beranda Interaktif**: Halaman utama yang memperkenalkan visi dan misi WestMacEnergy, serta menyajikan gambaran umum tentang perusahaan dan area operasi.
    * **"WHO WE ARE"**: Menjelaskan sejarah dan peran Centre dalam produksi lignite di Yunani.
    * **"A LEGACY OF NATIONAL SIGNIFICANCE"**: Menampilkan berbagai foto fasilitas dan operasi penambangan dan energi.
    * **"A 3D JOURNEY THROUGH THE PTOLEMAIS"**: Mengundang pengguna untuk menjelajahi transformasi West Macedonia melalui visualisasi 3D interaktif yang menunjukkan pengembangan, upaya restorasi, dan integrasi infrastruktur energi terbarukan. Terdapat statistik penting seperti jumlah sumber energi, karyawan, produk sosial, dan omset.

* **Peta Interaktif (MAP)**: Tampilan peta geografis yang memvisualisasikan data spasial terkait area penambangan, infrastruktur, dan elemen geografis lainnya.
    * **Layer Control**: Untuk mengaktifkan/menonaktifkan lapisan "Points", "Polylines", dan "Polygons".
    * **Legenda Peta**: Legenda yang jelas untuk mengidentifikasi fitur seperti.
    * **Model Pasca-Penambangan**: Tombol "See Post Mining Model" untuk beralih ke tampilan peta yang menunjukkan potensi penggunaan lahan di masa depan setelah kegiatan penambangan.

* **Data Explorer (TABLE)**: Halaman yang menyajikan data geografis dalam format tabel yang mudah dicari dan diurutkan.
    * Menampilkan "Points, Polylines, dan Polygons Data" dengan kolom "NO", "NAME", "DESCRIPTION", "IMAGE", "CREATED AT", dan "UPDATED AT".
    * Fungsionalitas pencarian ("Search by name or description") untuk memfilter data.

---

## 🛠️ **Teknologi yang Digunakan**

* **Backend**:
    * **PHP**: Bahasa pemrograman utama.
    * **Laravel Framework**: Digunakan untuk membangun logika sisi server, manajemen rute, database ORM, dan lainnya.

* **Database**:
    * **PostgreSQL**: Sistem manajemen basis data relasional.
    * **PostGIS**: Ekstensi geospasial untuk PostgreSQL, penyimpanan, kueri, dan analisis data geografis.

* **Frontend**:
    * **HTML**: Struktur dasar halaman web.
    * **CSS**: Styling, termasuk:
        * **Bootstrap 5.3.3**: Framework CSS populer untuk desain responsif dan komponen UI.
        * **Font Awesome 6.7.2**: Library ikon populer.
        * **Google Fonts (Inter)**: Untuk tipografi kustom.
    * **JavaScript**: Menambahkan interaktivitas dan fungsionalitas dinamis, termasuk:
        * **jQuery**: Library JavaScript yang banyak digunakan untuk manipulasi DOM, penanganan event, dan animasi.
        * **Bootstrap Bundle JS**: Fungsionalitas JavaScript untuk komponen Bootstrap.
    * **Babylon.js Viewer**: Digunakan untuk rendering dan visualisasi model 3D (dari `babylon-viewer.esm.min.js`), mengindikasikan adanya fitur visualisasi 3D yang kaya.

* **Data Geospasial**:
    * Data geografis disimpan dan dikelola menggunakan kapabilitas PostGIS di PostgreSQL.
    * Visualisasi di frontend menggunakan data yang diambil dari backend yang didukung PostGIS.

---

## ⚙️ **Instalasi dan Penggunaan**

Untuk menjalankan proyek ini secara lokal, ikuti langkah-langkah berikut:

1.  **Pastikan hal-hal berikut terinstal:**
    * PHP (versi 8.x direkomendasikan)
    * Composer
    * Web Server (PHP Development Server yang disertakan dengan Laravel akan digunakan secara default, jadi Apache/Nginx opsional jika Anda tidak berencana untuk menggunakannya.)
    * Database (PostgreSQL direkomendasikan)

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
    * Edit file `.env` dan konfigurasikan detail database Anda (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).

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
