# Toko Online CodeIgniter 4

Proyek ini adalah platform toko online yang dibangun menggunakan [CodeIgniter 4](https://codeigniter.com/). Sistem ini menyediakan beberapa fungsionalitas untuk toko online, termasuk manajemen produk, keranjang belanja, dan sistem transaksi.

## Daftar Isi

- [Fitur](#fitur)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Struktur Proyek](#struktur-proyek)

## Fitur

## 1. Fitur Login

### Fitur Login
- Pengguna harus login untuk mengakses sistem.
- Setelah login berhasil, pengguna akan diarahkan ke halaman Home.
---

## 2. Halaman Home

### 2.1 Struktur Halaman
Halaman home terdiri dari:
- **Sidebar**: Menu navigasi.
- **Header**: Informasi toko dan kontrol.
- **Content**: Area konten utama.

### 2.2 Sidebar
Menu yang tersedia:
- Home
- Keranjang
- Produk
- Diskon
- Produk Kategori
- Profile
- FAQ

### 2.3 Header
Berisi:
- Nama toko
- Tombol untuk menyembunyikan dan menampilkan sidebar
- Notifikasi diskon hari ini
- Informasi profil (foto dan nama)

### 2.4 Content
Menampilkan produk yang dijual dengan informasi:
- Foto produk
- Nama produk
- Harga
- Tombol beli

---

## 3. Halaman Keranjang & Checkout

### Fungsi
Mengelola produk dalam keranjang dan menyelesaikan proses transaksi.

### 3.1 Fitur Keranjang

#### Tabel Produk:
- Kolom:
  - Nama Produk
  - Foto
  - Jumlah (dapat diatur)
  - Subtotal
  - Tombol Hapus

#### Bagian bawah tabel:
- Menampilkan Total Harga Keseluruhan
- Tombol:
  - Perbarui Keranjang
  - Kosongkan Keranjang
  - Selesai Belanja → menuju Checkout

### 3.2 Form Checkout

Menampilkan:
- Nama Pengguna
- Informasi Produk

Form Alamat:
- Alamat Lengkap
- Kelurahan
- Pilihan Layanan Pengantar Paket

Total Pembayaran:
- Sudah termasuk Ongkir

Tombol:
- Buat Pesanan: Menyimpan pesanan dan mengarahkan ke halaman Home

---

## 4. Halaman Produk

### Deskripsi Umum
Halaman untuk mengelola daftar produk.

### Komponen Halaman

#### Menu:
- Tambah Data
- Download Data (PDF)
- Search

#### Tabel Produk:
- Kolom:
  - Nama Produk
  - Harga
  - Jumlah Produk
  - Aksi: Ubah | Hapus
- Mendukung Pagination

### Fitur Ubah Produk
- Form berisi:
  - Nama Produk
  - Harga
  - Jumlah
  - Foto Produk (ganti hanya jika dicentang)
- Tombol:
  - Simpan
  - Batal

### Fitur Hapus Produk
- Muncul konfirmasi sebelum penghapusan data

---

## 5. Menu Diskon

### 5.1 Menu Utama
- Tombol Tambah Diskon
- Fitur Search
- Pagination

### 5.2 Tabel Diskon
- Kolom:
  - Nomor
  - Tanggal
  - Nominal
  - Aksi: Edit | Hapus

### 5.3 Fitur Tambah Diskon
- Modal input:
  - Tanggal
  - Nominal
- Validasi:
  - Tanggal baru → bisa disimpan
  - Tanggal duplikat → tidak bisa disimpan

### 5.4 Fitur Edit Diskon
- Modal edit:
  - Tanggal
  - Nominal
- Validasi sama seperti tambah diskon

### 5.5 Fitur Hapus Diskon
- Konfirmasi penghapusan:
  - Ya untuk menghapus
  - Tidak untuk membatalkan

---

## 6. Halaman Kategori Produk

### Deskripsi Umum
Mengelola kategori produk.

### Komponen Halaman

#### Menu:
- Tambah Data
- Search

#### Tabel Kategori:
- Kolom:
  - Nama Kategori
  - Tanggal Dibuat
  - Terakhir Diubah
  - Aksi: Ubah | Hapus
- Mendukung Pagination

### Fitur Ubah Kategori
- Edit nama, simpan, dan otomatis perbarui kolom Updated At

### Fitur Hapus Kategori
- Konfirmasi sebelum penghapusan

---

## 7. Halaman Profile

### Fungsi
Menampilkan informasi pengguna dan riwayat pembelian.

### Fitur

#### Tabel Riwayat Pembelian:
- Kolom:
  - ID Pembelian
  - Waktu Pembelian
  - Total Bayar
  - Alamat
  - Status
  - Aksi: Detail
- Dilengkapi Search dan Pagination

#### Detail Pembelian:
- Menampilkan:
  - Nama Produk
  - Harga
  - Foto Produk
  - Harga Bayar
  - Ongkos Kirim


## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Web server (XAMPP)

## Instalasi

1. **Clone repository ini**
   ```bash
   git clone [URL repository]
   cd belajar-ci-tugas
   ```
2. **Install dependensi**
   ```bash
   composer install
   ```
3. **Konfigurasi database**

   - Start module Apache dan MySQL pada XAMPP
   - Buat database **db_ci4** di phpmyadmin.
   - copy file .env dari tutorial https://www.notion.so/april-ns/Codeigniter4-Migration-dan-Seeding-045ffe5f44904e5c88633b2deae724d2

4. **Jalankan migrasi database**
   ```bash
   php spark migrate
   ```
5. **Seeder data**
   ```bash
   php spark db:seed ProductSeeder
   ```
   ```bash
   php spark db:seed UserSeeder
   ```
6. **Jalankan server**
   ```bash
   php spark serve
   ```
7. **Akses aplikasi**
   Buka browser dan akses `http://localhost:8080` untuk melihat aplikasi.

## Struktur Proyek

Proyek menggunakan struktur MVC CodeIgniter 4:

- app/Controllers - Logika aplikasi dan penanganan request
  - AuthController.php - Autentikasi pengguna
  - ProdukController.php - Manajemen produk
  - TransaksiController.php - Proses transaksi
  - DiskonController.php - Manajemen diskon
  - KategoriController.php - Manajemen kategori produk
  - ApiController.php - Manajement detail transaksi pada dashboard
- app/Models - Model untuk interaksi database
  - ProductModel.php - Model produk
  - UserModel.php - Model pengguna
  - KategoriModel.php - Model Kategori Produk
  - TransactionModel.php - Model Transaksi
  - TransactionDetailModel.php - Model Detail Transaksi
- app/Views - Template dan komponen UI
  - v_produk.php - Tampilan produk
  - v_keranjang.php - Halaman keranjang
  - v_checkout.php - Halaman Checkout
  - v_diskon.php - Halaman diskon
  - v_faq.php - halaman faq
  - v_home.php - halaman beranda
  - v_kategori.php - halaman kategori
  - v_login.php - halaman login
  - v_profile.php - berisi histori pembelian
  - v_produkPDF.php - format layout pdf data produk yang di download
- public/img - Gambar produk dan aset
- public/NiceAdmin - Template admin
