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

* **Frontend**: HTML, CSS, JavaScript (kemungkinan besar dengan library peta seperti Leaflet.js atau Mapbox GL JS untuk peta interaktif).
* **Backend**: (Berdasarkan URL `127.0.0.1:8000`, kemungkinan server lokal yang menyajikan file statis atau API sederhana. Anda perlu mengisi ini jika ada backend spesifik, misalnya Python Flask/Django, Node.js Express, atau PHP).
* **Database**: (Jika ada backend dan data yang disimpan secara dinamis, sebutkan jenis database-nya, misal PostgreSQL, MySQL, SQLite).
* **Data Geospasial**: Kemungkinan menggunakan format GeoJSON atau serupa untuk data area di peta.

---

## ⚙️ **Instalasi dan Penggunaan**

Untuk menjalankan proyek ini secara lokal, ikuti langkah-langkah berikut:

1.  **Kloning repositori:**
    ```bash
    git clone [https://github.com/NamaPenggunaGitHubAnda/WestMacEnergy.git](https://github.com/NamaPenggunaGitHubAnda/WestMacEnergy.git)
    cd WestMacEnergy
    ```
    **CATATAN**: Ganti `NamaPenggunaGitHubAnda` dengan username GitHub Anda yang sebenarnya.

2.  **Instal dependensi (jika ada):**
    * Jika ini adalah proyek frontend murni atau menggunakan server lokal sederhana (misalnya Python `http.server`), mungkin tidak ada langkah instalasi dependensi yang kompleks.
    * Jika ada backend (misal Python, Node.js):
        ```bash
        # Contoh untuk Python
        pip install -r requirements.txt
        # Contoh untuk Node.js
        npm install
        ```

3.  **Jalankan aplikasi:**
    * Karena Anda melihatnya di `127.0.0.1:8000`, kemungkinan besar Anda menjalankannya melalui server pengembangan lokal.
    * **Untuk proyek statis/sederhana (tanpa backend kompleks):**
        ```bash
        # Menggunakan Python sebagai server HTTP sederhana
        python -m http.server 8000
        # Atau jika Anda menggunakan server lain, sesuaikan perintahnya
        ```
    * **Jika ada backend spesifik (misal Flask/Node.js):**
        ```bash
        # Contoh untuk Flask
        flask run --port 8000
        # Contoh untuk Node.js
        npm start
        ```

4.  **Akses aplikasi:**
    Buka browser web Anda dan navigasikan ke `http://127.0.0.1:8000`.

---

## 📂 **Struktur Proyek**
WestMacEnergy/
├── css/                    # File CSS untuk styling
│   └── style.css
├── js/                     # File JavaScript untuk fungsionalitas
│   └── script.js
├── img/                    # Folder untuk gambar (misal thumbnail untuk tabel)
├── data/                   # File data geospasial (misal GeoJSON)
│   └── (nama_file_data.geojson)
├── index.html              # Halaman Beranda
├── map.html                # Halaman Peta Interaktif
├── table.html              # Halaman Data Explorer (Tabel)
├── README.md               # File ini
├── (file-file proyek lainnya)
└── (folder-folder aset lain jika ada)

---

## 🤝 **Kontribusi**

Kami menyambut kontribusi! Jika Anda ingin berkontribusi pada proyek ini, silakan ikuti langkah-langkah berikut:

1.  Fork repositori ini.
2.  Buat branch baru untuk fitur Anda (`git checkout -b feature/nama-fitur-baru`).
3.  Lakukan perubahan Anda.
4.  Commit perubahan Anda (`git commit -m 'Tambahkan fitur baru X'`).
5.  Push ke branch Anda (`git push origin feature/nama-fitur-baru`).
6.  Buka Pull Request.

---

## ⚖️ **Lisensi**

Proyek ini dilisensikan di bawah (Nama Lisensi, misalnya MIT License). Lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.
(Jika Anda tidak memiliki file `LICENSE`, Anda bisa menghapus bagian ini atau menambahkan lisensi yang sesuai.)

---

## 📬 **Kontak**

Untuk pertanyaan atau umpan balik, silakan hubungi:

* **Risma Kusumajadi**
* **Email**: [risma.kusumajadi@example.com](mailto:risma.kusumajadi@example.com) (Ganti dengan alamat email atau tautan profil LinkedIn/GitHub Anda)

---

Copyright © 2025 by Risma Kusumajadi.
