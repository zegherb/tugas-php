# Tugas PHP Dasar 


---

## 📂 Struktur File dan Penjelasan

Proyek ini terdiri dari tiga skrip utama dengan fungsinya masing-masing:

### 1. `Tugas3.php`
Skrip ini berfokus pada pengenalan dan pengolahan tipe data Array di PHP. Fitur yang dipraktikkan meliputi:
* Pengecekan tipe data (`is_array`).
* Pemotongan *string* dari elemen array (`substr`).
* Menghitung panjang array (`count`).
* Mengurutkan data (`sort`) dan mengacak data (`shuffle`).
* Menambah (`array_push`) dan menghapus (`array_pop`) elemen di akhir array.
* Menggabungkan dua array berbeda (`array_merge`).
* Mencari indeks dari sebuah data spesifik di dalam array (`array_search`).

### 2. `database/Tugas4.php`
Skrip interaktif berbasis *Command Line Interface* (CLI) untuk memperbarui data pengguna di dalam *database* MySQL.
* **Fitur Utama:** Menggunakan `STDIN` untuk meminta input pengguna langsung dari terminal (Username Lama, Username Baru, Email Baru, dan Password Baru).
* **Keamanan:** Menerapkan algoritma BCRYPT (`password_hash`) untuk mengenkripsi kata sandi baru sebelum disimpan.
* **Database:** Menggunakan *Prepared Statements* PDO agar aman dari serangan *SQL Injection*. Skrip ini terhubung ke *database* `pbp2026`.

### 3. `tugas5.php` 
Skrip sederhana untuk memvalidasi bahwa server lokal dan PHP berjalan dengan baik. Skrip ini juga mengeksekusi fungsi `phpinfo()` untuk menampilkan detail konfigurasi dan modul *environment* PHP yang sedang aktif.

---
