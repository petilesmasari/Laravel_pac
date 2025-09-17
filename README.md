# 🎯 Website Profile & Membership Pontianak Archery Club

![GitHub Repo stars](https://img.shields.io/github/stars/username/repo-name?style=social)
![GitHub forks](https://img.shields.io/github/forks/username/repo-name?style=social)
![GitHub issues](https://img.shields.io/github/issues/username/repo-name)
![GitHub license](https://img.shields.io/github/license/username/repo-name)
![GitHub last commit](https://img.shields.io/github/last-commit/username/repo-name)

---

## 📖 Tentang Project

Website ini adalah sistem informasi berbasis web yang dirancang oleh **Peti Lesmasari (3202216010)** sebagai **Tugas Akhir** pada Program Studi D-III Teknik Informatika, Jurusan Teknik Elektro, Politeknik Negeri Pontianak.

Pontianak Archery Club adalah klub panahan di bawah **PERPANI Kota Pontianak**. Website ini dikembangkan untuk menyajikan profil klub, mempermudah pendaftaran anggota, serta mendukung administrasi dan interaksi antara pengurus dan anggota.

---

## ✨ Fitur Utama

* 📌 **Profil Klub** – sejarah, visi misi, dan struktur organisasi.
* 🏹 **Program Pelatihan** – daftar kelas memanah anak-anak hingga dewasa.
* 📝 **Pendaftaran Online** – registrasi anggota baru secara digital.
* 🎯 **Input Skor Latihan** – pencatatan skor latihan anggota.
* 📢 **Pengumuman Event** – informasi kegiatan dan lomba panahan.
* 🖼️ **Galeri Kegiatan** – dokumentasi foto & video aktivitas klub.

---

## 🛠️ Teknologi yang Digunakan

* ⚡ **Framework**: Laravel 10
* 🖥️ **Backend**: PHP 8.2
* 🗄️ **Database**: MySQL
* 🎨 **Frontend**: Blade + Bootstrap/Tailwind CSS
* ☁️ **Hosting**: Render (Web Deployment)

---

## 🚀 Install & Setup

### 1. Clone Repository

```bash
git clone https://github.com/petilesmasari/Laravel_pac.git
cd Laravel_pac
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
```

Ubah konfigurasi database sesuai setup lokal kamu:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_pac
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Key & Migrasi Database

```bash
php artisan key:generate
php artisan migrate --seed
```

### 5. Jalankan Website

```bash
php artisan serve
```

👉 Akses: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 📌 Hasil Implementasi

Semua fitur berhasil diimplementasikan dan diuji. Website ini:
✅ Mempermudah pendaftaran calon anggota.
✅ Membantu pengurus mengelola administrasi.
✅ Menyebarkan informasi kegiatan klub lebih efisien.

---

## 📜 Kesimpulan

Website profil & membership berbasis Laravel 10 ini mampu:

* Meningkatkan efisiensi administrasi.
* Memperluas jangkauan informasi.

---

## 👩‍💻 Author

**Peti Lesmasari (3202216010)**
Program Studi D-III Teknik Informatika, Jurusan Teknik Elektro
Politeknik Negeri Pontianak
Tahun Ajaran 2022–2025

---

## 🤝 Contributing

Kontribusi, saran, dan perbaikan sangat diterima. Silakan fork repository ini, buat branch baru, dan ajukan pull request.

---


