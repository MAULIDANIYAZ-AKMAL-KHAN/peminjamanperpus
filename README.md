# Sistem Informasi Peminjaman Perpustakaan (PeminjamanPerpus)

Aplikasi web untuk mengelola alur peminjaman, pengembalian, serta pendataan buku dan anggota di perpustakaan secara terintegrasi dan efisien.

---

## 📌 Fitur Utama

- **Manajemen Buku**: Tambah, edit, hapus, dan lihat katalog buku beserta stoknya.
- **Manajemen Anggota**: Pengelolaan data anggota/siswa/mahasiswa yang terdaftar.
- **Transaksi Peminjaman**: Pencatatan tanggal peminjaman dan jatuh tempo pengembalian.
- **Transaksi Pengembalian & Denda**: Pencatatan tanggal pengembalian otomatis serta kalkulasi denda keterlambatan.
- **Laporan/Riwayat**: Riwayat transaksi peminjaman dan statistik buku.
- **Manajemen User/Akses**: Autentikasi (Login/Logout) untuk Admin dan Petugas.

---

## 🛠️ Teknologi yang Penggunaan

- **Backend / Framework**: [Sebutkan Framework, misal: Laravel / Express.js / CodeIgniter / Native PHP]
- **Frontend**: [Sebutkan Frontend, misal: Bootstrap / Tailwind CSS / Blade / Vue.js]
- **Database**: [Sebutkan Database, misal: MySQL / PostgreSQL]

---

## 🚀 Cara Instalasi & Menjalankan Proyek

Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan lokal (*local machine*):

### 1. Prasyarat (*Prerequisites*)
Pastikan Anda sudah menginstal:
- [PHP versi X.X] / [Node.js versi X.X] *(Sesuaikan dengan teknologi proyek)*
- [Composer] / [npm]
- Web Server (XAMPP / Laragon / MySQL Server)

### 2. Kloning Repositori
```bash
git clone [https://github.com/MAULIDANIYAZ-AKMAL-KHAN/peminjamanperpus.git](https://github.com/MAULIDANIYAZ-AKMAL-KHAN/peminjamanperpus.git)
cd peminjamanperpus

```

### 3. Instalasi Dependensi

*(Jika menggunakan Laravel / PHP)*:

```bash
composer install

```

*(Jika menggunakan Node.js)*:

```bash
npm install

```

### 4. Konfigurasi Environment & Database

1. Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env

```


2. Buat database baru di MySQL dengan nama `db_peminjamanperpus` (atau sesuaikan).
3. Buka file `.env` dan sesuaikan pengaturan database:
```env
DB_DATABASE=db_peminjamanperpus
DB_USERNAME=root
DB_PASSWORD=

```



### 5. Migration & Seeder (Jika Ada)

Jalankan migrasi tabel ke database:

```bash
php artisan migrate --seed

```

### 6. Jalankan Aplikasi

```bash
php artisan serve

```

Akses aplikasi di browser Anda melalui `http://localhost:8000`.

---

## 👤 Akun Default (Pengujian)

| Role | Username / Email | Password |
| --- | --- | --- |
| Admin | `admin@gmail.com` | `password123` |
| Siswa/User | `siswa@gmail.com` | `password123` |
