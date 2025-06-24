# WestMacEnergy: West Macedonia Lignite Centre

Selamat datang di repositori WestMacEnergy! Aplikasi web ini adalah platform komprehensif yang didedikasikan untuk eksplorasi dan visualisasi data terkait operasi lignite di West Macedonia, serta transisi menuju energi terbarukan dan pemanfaatan lahan pasca-penambangan.

---

## 📚 **Daftar Isi**

1.  [📝 Deskripsi Proyek](#-deskripsi-proyek)
2.  [🚀 Fitur Utama](#-fitur-utama)
3.  [🛠️ Teknologi yang Digunakan](#-teknologi-yang-digunakan)
4.  [⚙️ Instalasi dan Penggunaan](#-instalasi-dan-penggunaan)
5.  [📂 Struktur Proyek](#-struktur-proyek)
6.  [🤝 Kontribusi](#-kontribusi)
7.  [⚖️ Lisensi](#-lisensi)
8.  [📬 Kontak](#-kontak)

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

* **Peta Interaktif (MAP)**: Tampilan peta geografis yang memungkinkan pengguna untuk memvisualisasikan data spasial terkait area penambangan, infrastruktur, dan elemen geografis lainnya.
    * **Layer Control**: Kemampuan untuk mengaktifkan/menonaktifkan lapisan "Points", "Polylines", dan "Polygons".
    * **Legenda Peta**: Legenda yang jelas untuk mengidentifikasi fitur seperti "Building", "River", "Railway", "Buildings", "Mining Area", "Non Mining", "Cracked Area", dan "Power Plant".
    * **Model Pasca-Penambangan**: Tombol "See Post Mining Model" untuk beralih ke tampilan peta yang menunjukkan potensi penggunaan lahan di masa depan setelah kegiatan penambangan, dengan legenda seperti "River", "Lake", "Agricultural Land", "Forest Land", "Recreation Area", dan "Infrastructure".

* **Data Explorer (TABLE)**: Halaman yang menyajikan data geografis dalam format tabel yang mudah dicari dan diurutkan.
    * Menampilkan "Points Data" dengan kolom "NO", "NAME", "DESCRIPTION", "IMAGE", "CREATED AT", dan "UPDATED AT".
    * Contoh data termasuk "Ptolemaida Thermal Power Plant", "Ptolemais Power Plant", "LKDM South Field", dan "Kardia Power Plant".
    * Fungsionalitas pencarian ("Search by name or description") untuk memfilter data.

---

## 🛠️ **Teknologi yang Digunakan**

* **Backend**: PHP (menggunakan **Laravel Framework**).
* **Database**: MySQL (umumnya digunakan dengan Laravel, atau bisa juga PostgreSQL/SQLite jika Anda menggunakannya).
* **Frontend**: HTML, CSS, JavaScript (dengan library peta seperti **Leaflet.js** atau **Mapbox GL JS** untuk peta interaktif, dan mungkin framework JS seperti **Vue.js** atau **React.js** jika digunakan dalam Blade atau terpisah).
* **Data Geospasial**: Penggunaan format GeoJSON atau serupa untuk data area di peta.

---

## ⚙️ **Instalasi dan Penggunaan**

Untuk menjalankan proyek ini secara lokal, ikuti langkah-langkah berikut:

1.  **Pastikan Anda memiliki hal-hal berikut terinstal:**
    * PHP (versi 8.x direkomendasikan)
    * Composer
    * Node.js & npm (jika Anda menggunakan aset frontend yang dikompilasi seperti Vue/React)
    * Web Server (Apache atau Nginx)
    * Database (MySQL direkomendasikan)

2.  **Kloning repositori:**
    ```bash
    git clone [https://github.com/kusumajat/WestMacEnergy.git](https://github.com/kusumajat/WestMacEnergy.git)
    cd WestMacEnergy
    ```
    **CATATAN**: Jika Anda mengunggah ke repositori baru, pastikan URL kloning ini benar.

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
    * Generate kunci aplikasi Laravel:
        ```bash
        php artisan key:generate
        ```

5.  **Migrasi Database dan Seed Data (jika ada):**
    ```bash
    php artisan migrate
    # Jika Anda memiliki seeder untuk data awal
    # php artisan db:seed
    ```

6.  **Instal dependensi Node.js dan Kompilasi Aset Frontend (jika menggunakan Vite/Webpack):**
    ```bash
    npm install
    npm run dev  # Untuk pengembangan
    # npm run build # Untuk produksi
    ```

7.  **Jalankan aplikasi:**
    * Mulai server pengembangan Laravel:
        ```bash
        php artisan serve --port=8000
        ```
    * *(Opsional)* Jika Anda menggunakan server web seperti Apache/Nginx, konfigurasikan Virtual Host untuk menunjuk ke direktori `public` proyek.

8.  **Akses aplikasi:**
    Buka browser web Anda dan navigasikan ke `http://127.0.0.1:8000` (jika menggunakan `php artisan serve`) atau domain yang Anda konfigurasi di server web Anda.

---

## 📬 **Kontak**

Untuk pertanyaan atau umpan balik, silakan hubungi:

* **Risma Kusumajadi**
* **Email**: [risma.kusumajadi@example.com](mailto:risma.kusumajadi@example.com) (Ganti dengan alamat email atau tautan profil LinkedIn/GitHub Anda)

---

Copyright © 2025 by Risma Kusumajadi.
